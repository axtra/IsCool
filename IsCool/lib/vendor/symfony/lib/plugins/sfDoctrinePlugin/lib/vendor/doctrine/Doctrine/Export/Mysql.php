<?php
/*
 *  $Id: Mysql.php 7653 2010-06-08 15:54:31Z jwage $
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

/**
 * Doctrine_Export_Mysql
 *
 * @package     Doctrine
 * @subpackage  Export
 * @author      Konsta Vesterinen <kvesteri@cc.hut.fi>
 * @author      Lukas Smith <smith@pooteeweet.org> (PEAR MDB2 library)
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link        www.doctrine-project.org
 * @since       1.0
 * @version     $Revision: 7653 $
 */
class Doctrine_Export_Mysql extends Doctrine_Export
{
    /**
     * drop existing constraint
     *
     * @param string    $table        name of table that should be used in method
     * @param string    $name         name of the constraint to be dropped
     * @param string    $primary      hint if the constraint is primary
     * @return void
     */
    public function dropConstraint($table, $name, $primary = false)
    {
        $table = $this->conn->quoteIdentifier($table);

        if ( ! $primary) {
            $name = 'CONSTRAINT ' . $this->conn->quoteIdentifier($name);
        } else {
            $name = 'PRIMARY KEY';
        }

        return $this->conn->exec('ALTER TABLE ' . $table . ' DROP ' . $name);
    }

    /**
     * createDatabaseSql
     *
     * @param string $name 
     * @return void
     */
    public function createDatabaseSql($name)
    {
        return 'CREATE DATABASE ' . $this->conn->quoteIdentifier($name, true);
    }

    /**
     * drop an existing database
     *
     * @param string $name name of the database that should be dropped
     * @return string
     */
    public function dropDatabaseSql($name)
    {
        return array(
            'SET FOREIGN_KEY_CHECKS = 0',
            'DROP DATABASE ' . $this->conn->quoteIdentifier($name),
            'SET FOREIGN_KEY_CHECKS = 1'
        );
    }

    /**
     * create a new table
     *
     * @param string $name   Name of the database that should be created
     * @param array $fields  Associative array that contains the definition of each field of the new table
     *                       The indexes of the array entries are the names of the fields of the table an
     *                       the array entry values are associative arrays like those that are meant to be
     *                       passed with the field definitions to get[Type]Declaration() functions.
     *                          array(
     *                              'id' => array(
     *                                  'type' => 'integer',
     *                                  'unsigned' => 1
     *                                  'notnull' => 1
     *                                  'default' => 0
     *                              ),
     *                              'name' => array(
     *                                  'type' => 'text',
     *                                  'length' => 12
     *                              ),
     *                              'password' => array(
     *                                  'type' => 'text',
     *                                  'length' => 12
     *                              )
     *                          );
     * @param array $options  An associative array of table options:
     *                          array(
     *                              'comment' => 'Foo',
     *                              'charset' => 'utf8',
     *                              'collate' => 'utf8_unicode_ci',
     *                              'type'    => 'innodb',
     *                          );
     *
     * @return void
     */
    public function createTableSql($name, array $fields, array $options = array()) 
    {
        if ( ! $name)
            throw new Doctrine_Export_Exception('no valid table name specified');

        if (empty($fields)) {
            throw new Doctrine_Export_Exception('no fields specified for table "'.$name.'"');
        }
        $queryFields = $this->getFieldDeclarationList($fields);

        // build indexes for all foreign key fields (needed in MySQL!!)
        if (isset($options['foreignKeys'])) {
            foreach ($options['foreignKeys'] as $fk) {
                $local = $fk['local'];
                $found = false;
                if (isset($options['indexes'])) {
                    foreach ($options['indexes'] as $definition) {
                        if (is_string($definition['fields'])) {
                            // Check if index already exists on the column                            
                            $found = $found || ($local == $definition['fields']);                    
                        } else if (in_array($local, $definition['fields']) && count($definition['fields']) === 1) {
                            // Index already exists on the column
                            $found = true;
                        }
                    }
                }
                if (isset($options['primary']) && !empty($options['primary']) &&
                        in_array($local, $options['primary'])) {
                    // field is part of the PK and therefore already indexed
                    $found = true;
                }
                
                if ( ! $found) {
                    if (is_array($local)) {
                      foreach($local as $localidx) {
                        $options['indexes'][$localidx] = array('fields' => array($localidx => array()));
                      }
                    } else {
                      $options['indexes'][$local] = array('fields' => array($local => array()));                      
                    }
                }
            }
        }

        // add all indexes
        if (isset($options['indexes']) && ! empty($options['indexes'])) {
            // Case Insensitive checking for duplicate indexes...
            $dupes = array();
            foreach ($options['indexes'] as $key => $index) {
                if (in_array(strtolower($key), $dupes)) {
                    unset($options['indexes'][$key]);
                } else {
                    $dupes[] = strtolower($key);
                }
            }
            unset($dupes);

            foreach($options['indexes'] as $index => $definition) {
                $queryFields .= ', ' . $this->getIndexDeclaration($index, $definition);
            }
        }

        // attach all primary keys
        if (isset($options['primary']) && ! empty($options['primary'])) {
            $keyColumns = array_values($options['primary']);
            $keyColumns = array_map(array($this->conn, 'quoteIdentifier'), $keyColumns);
            $queryFields .= ', PRIMARY KEY(' . implode(', ', $keyColumns) . ')';
        }

        $query = 'CREATE TABLE ' . $this->conn->quoteIdentifier($name, true) . ' (' . $queryFields . ')';

        $optionStrings = array();

        if (isset($options['comment'])) {
            $optionStrings['comment'] = 'COMMENT = ' . $this->conn->quote($options['comment'], 'text');
        }
        if (isset($options['charset'])) {
            $optionStrings['charset'] = 'DEFAULT CHARACTER SET ' . $options['charset'];
        }
        if (isset($options['collate'])) {
            $optionStrings['collate'] = 'COLLATE ' . $options['collate'];
        }

        $type = false;

        // get the type of the table
        if (isset($options['type'])) {
            $type = $options['type'];
        } else {
            $type = $this->conn->getAttribute(Doctrine_Core::ATTR_DEFAULT_TABLE_TYPE);
        }

        if ($type) {
            $optionStrings[] = 'ENGINE = ' . $type;
        }

        if ( ! empty($optionStrings)) {
            $query.= ' '.implode(' ', $optionStrings);
        }
        $sql[] = $query;

        if (isset($options['foreignKeys'])) {

            foreach ((array) $options['foreignKeys'] as $k => $definition) {
                if (is_array($definition)) {
                    $sql[] = $this->createForeignKeySql($name, $definition);
                }
            }
        }
        return $sql;
    }

    /**
     * Obtain DBMS specific SQL code portion needed to declare a generic type
     * field to be used in statements like CREATE TABLE.
     *
     * @param string $name   name the field to be declared.
     * @param array  $field  associative array with the name of the properties
     *      of the field being declared as array indexes. Currently, the types
     *      of supported field properties are as follows:
     *
     *      length
     *          Integer value that determines the maximum length of the text
     *          field. If this argument is missing the field should be
     *          declared to have the longest length allowed by the DBMS.
     *
     *      default
     *          Text value to be used as default for this field.
     *
     *      notnull
     *          Boolean flag that indicates whether this field is constrained
     *          to not be set to null.
     *      charset
     *          Text value with the default CHARACTER SET for this field.
     *      collation
     *          Text value with the default COLLATION for this field.
     *      unique
     *          unique constraint
     *      check
     *          column check constraint
     *
     * @return string  DBMS specific SQL code portion that should be used to
     *      declare the specified field.
     */
    public function getDeclaration($name, array $field)
    {

        $default   = $this->getDefaultFieldDeclaration($field);

        $charset   = (isset($field['charset']) && $field['charset']) ?
                    ' ' . $this->getCharsetFieldDeclaration($field['charset']) : '';

        $collation = (isset($field['collation']) && $field['collation']) ?
                    ' ' . $this->getCollationFieldDeclaration($field['collation']) : '';

        $notnull   = (isset($field['notnull']) && $field['notnull']) ? ' NOT NULL' : '';

        $unique    = (isset($field['unique']) && $field['unique']) ?
                    ' ' . $this->getUniqueFieldDeclaration() : '';

        $check     = (isset($field['check']) && $field['check']) ?
                    ' ' . $field['check'] : '';

        $comment   = (isset($field['comment']) && $field['comment']) ?
                    " COMMENT " . $this->conn->quote($field['comment'], 'text') : '';

        $method = 'get' . $field['type'] . 'Declaration';

        try {
            if (method_exists($this->conn->dataDict, $method)) {
                return $this->conn->dataDict->$method($name, $field);
            } else {
                $dec = $this->conn->dataDict->getNativeDeclaration($field);
            }
    
            return $this->conn->quoteIdentifier($name, true) 
                 . ' ' . $dec . $charset . $default . $notnull . $comment . $unique . $check . $collation;
        } catch (Exception $e) {
            throw new Doctrine_Exception('Around field ' . $name . ': ' . $e->getMessage() . "\n\n" . $e->getTraceAsString() . "\n\n");
        }
    }

    /**
     * alter an existing table
     *
     * @param string $name         name of the table that is intended to be changed.
     * @param array $changes     associative array that contains the details of each type
     *                             of change that is intended to be performed. The types of
     *                             changes that are currently supported are defined as follows:
     *
     *                             name
     *
     *                                New name for the table.
     *
     *                            add
     *
     *                                Associative array with the names of fields to be added as
     *                                 indexes of the array. The value of each entry of the array
     *                                 should be set to another associative array with the properties
     *                                 of the fields to be added. The properties of the fields should
     *                                 be the same as defined by the Metabase parser.
     *
     *
     *                            remove
     *
     *                                Associative array with the names of fields to be removed as indexes
     *                                 of the array. Currently the values assigned to each entry are ignored.
     *                                 An empty array should be used for future compatibility.
     *
     *                            rename
     *
     *                                Associative array with the names of fields to be renamed as indexes
     *                                 of the array. The value of each entry of the array should be set to
     *                                 another associative array with the entry named name with the new
     *                                 field name and the entry named Declaration that is expected to contain
     *                                 the portion of the field declaration already in DBMS specific SQL code
     *                                 as it is used in the CREATE TABLE statement.
     *
     *                            change
     *
     *                                Associative array with the names of the fields to be changed as indexes
     *                                 of the array. Keep in mind that if it is intended to change either the
     *                                 name of a field and any other properties, the change array entries
     *                                 should have the new names of the fields as array indexes.
     *
     *                                The value of each entry of the array should be set to another associative
     *                                 array with the properties of the fields to that are meant to be changed as
     *                                 array entries. These entries should be assigned to the new values of the
     *                                 respective properties. The properties of the fields should be the same
     *                                 as defined by the Metabase parser.
     *
     *                            Example
     *                                array(
     *                                    'name' => 'userlist',
     *                                    'add' => array(
     *                                        'quota' => array(
     *                                            'type' => 'integer',
     *                                            'unsigned' => 1
     *                                        )
     *                                    ),
     *                                    'remove' => array(
     *                                        'fil