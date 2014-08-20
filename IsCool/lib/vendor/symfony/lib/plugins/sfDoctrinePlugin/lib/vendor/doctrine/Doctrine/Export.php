<?php
/*
 *  $Id: Export.php 7653 2010-06-08 15:54:31Z jwage $
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
 * Doctrine_Export
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
class Doctrine_Export extends Doctrine_Connection_Module
{
    protected $valid_default_values = array(
        'text'      => '',
        'boolean'   => true,
        'integer'   => 0,
        'decimal'   => 0.0,
        'float'     => 0.0,
        'timestamp' => '1970-01-01 00:00:00',
        'time'      => '00:00:00',
        'date'      => '1970-01-01',
        'clob'      => '',
        'blob'      => '',
        'string'    => ''
    );

    /**
     * drop an existing database
     * (this method is implemented by the drivers)
     *
     * @param string $name name of the database that should be dropped
     * @return void
     */
    public function dropDatabase($database)
    {
        foreach ((array) $this->dropDatabaseSql($database) as $query) {
            $this->conn->execute($query);
        }
    }

    /**
     * drop an existing database
     * (this method is implemented by the drivers)
     *
     * @param string $name name of the database that should be dropped
     * @return void
     */
    public function dropDatabaseSql($database)
    {
        throw new Doctrine_Export_Exception('Drop database not supported by this driver.');
    }

    /**
     * dropTableSql
     * drop an existing table
     *
     * @param string $table           name of table that should be dropped from the database
     * @return string
     */
    public function dropTableSql($table)
    {
        return 'DROP TABLE ' . $this->conn->quoteIdentifier($table);
    }

    /**
     * dropTable
     * drop an existing table
     *
     * @param string $table           name of table that should be dropped from the database
     * @return void
     */
    public function dropTable($table)
    {
        $this->conn->execute($this->dropTableSql($table));
    }

    /**
     * drop existing index
     *
     * @param string    $table        name of table that should be used in method
     * @param string    $name         name of the index to be dropped
     * @return void
     */
    public function dropIndex($table, $name)
    {
        return $this->conn->exec($this->dropIndexSql($table, $name));
    }

    /**
     * dropIndexSql
     *
     * @param string    $table        name of table that should be used in method
     * @param string    $name         name of the index to be dropped
     * @return string                 SQL that is used for dropping an index
     */
    public function dropIndexSql($table, $name)
    {
        $name = $this->conn->quoteIdentifier($this->conn->formatter->getIndexName($name));
        
        return 'DROP INDEX ' . $name;
    }

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
        $name  = $this->conn->quoteIdentifier($name);
        
        return $this->conn->exec('ALTER TABLE ' . $table . ' DROP CONSTRAINT ' . $name);
    }

    /**
     * drop existing foreign key
     *
     * @param string    $table        name of table that should be used in method
     * @param string    $name         name of the foreign key to be dropped
     * @return void
     */
    public function dropForeignKey($table, $name)
    {
        return $this->dropConstraint($table, $this->conn->formatter->getForeignKeyName($name));
    }

    /**
     * dropSequenceSql
     * drop existing sequence
     * (this method is implemented by the drivers)
     *
     * @throws Doctrine_Connection_Exception     if something fails at database level
     * @param string $sequenceName      name of the sequence to be dropped
     * @return void
     */
    public function dropSequence($sequenceName)
    {
        $this->conn->exec($this->dropSequenceSql($sequenceName));
    }

    /**
     * dropSequenceSql
     * drop existing sequence
     *
     * @throws Doctrine_Connection_Exception     if something fails at database level
     * @param string $sequenceName name of the sequence to be dropped
     * @return void
     */
    public function dropSequenceSql($sequenceName)
    {
        throw new Doctrine_Export_Exception('Drop sequence not supported by this driver.');
    }

    /**
     * create a new database
     * (this method is implemented by the drivers)
     *
     * @param string $name name of the database that should be created
     * @return void
     */
    public function createDatabase($database)
    {
        $this->conn->execute($this->createDatabaseSql($database));
    }

    /**
     * create a new database
     * (this method is implemented by the drivers)
     *
     * @param string $name name of the database that should be created
     * @return string
     */
    public function createDatabaseSql($database)
    {
        throw new Doctrine_Export_Exception('Create database not supported by this driver.');
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
     *
     * @return string
     */
    public function createTableSql($name, array $fields, array $options = array())
    {
        if ( ! $name) {
            throw new Doctrine_Export_Exception('no valid table name specified');
        }

        if (empty($fields)) {
            throw new Doctrine_Export_Exception('no fields specified for table ' . $name);
        }

        $queryFields = $this->getFieldDeclarationList($fields);


        if (isset($options['primary']) && ! empty($options['primary'])) {
            $primaryKeys = array_map(array($this->conn, 'quoteIdentifier'), array_values($options['primary']));
            $queryFields .= ', PRIMARY KEY(' . implode(', ', $primaryKeys) . ')';
        }

        if (isset($options['indexes']) && ! empty($options['indexes'])) {
            foreach($options['indexes'] as $index => $definition) {
                $indexDeclaration = $this->getIndexDeclaration($index, $definition);
                // append only created index declarations
                if ( ! is_null($indexDeclaration)) {
                    $queryFields .= ', '.$indexDeclaration;
                } 
            }
        }

        $query = 'CREATE TABLE ' . $this->conn->quoteIdentifier($name, true) . ' (' . $queryFields;
        
        $check = $this->getCheckDeclaration($fields);

        if ( ! empty($check)) {
            $query .= ', ' . $check;
        }

        $query .= ')';

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
     * create a new table
     *
     * @param string $name   Name of the database that should be created
     * @param array $fields  Associative array that contains the definition of each field of the new table
     * @param array $options  An associative array of table options:
     * @see Doctrine_Export::createTableSql()
     *
     * @return void
     */
    public function createTable($name, array $fields, array $options = array())
    {
        // Build array of the primary keys if any of the individual field definitions
        // specify primary => true
        $count = 0;
        foreach ($fields as $fieldName => $field) {
            if (isset($field['primary']) && $field['primary']) {
                if ($count == 0) {
                    $options['primary'] = array();
                }
                $count++;
                $options['primary'][] = $fieldName;
            }
        }

        $sql = (array) $this->createTableSql($name, $fields, $options);

        foreach ($sql as $query) {
            $this->conn->execute($query);
        }
    }

    /**
     * create sequence
     *
     * @throws Doctrine_Connection_Exception     if something fails at database level
     * @param string    $seqName        name of the sequence to be created
     * @param string    $start          start value of the sequence; default is 1
     * @param array     $options  An associative array of table options:
     *                          array(
     *                              'comment' => 'Foo',
     *                              'charset' => 'utf8',
     *                              'collate' => 'utf8_unicode_ci',
     *                          );
     * @return void
     */
    public function createSequence($seqName, $start = 1, array $options = array())
    {
        return $this->conn->execute($this->createSequenceSql($seqName, $start = 1, $options));
    }

    /**
     * return RDBMS specific create sequence statement
     * (this method is implemented by the drivers)
     *
     * @throws Doctrine_Connection_Exception     if something fails at database level
     * @param string    $seqName        name of the sequence to be created
     * @param string    $start          start value of the sequence; default is 1
     * @param array     $options  An associative array of table options:
     *                          array(
     *                              'comment' => 'Foo',
     *                              'charset' => 'utf8',
     *                              'collate' => 'utf8_unicode_ci',
     *                          );
     * @return string
     */
    public function createSequenceSql($seqName, $start = 1, array $options = array())
    {
        throw new Doctrine_Export_Exception('Create sequence not supported by this driver.');
    }

    /**
     * create a constraint on a table
     *
     * @param string    $table         name of the table on which the constraint is to be created
     * @param string    $name          name of the constraint to be created
     * @param array     $definition    associative array that defines properties of the constraint to be created.
     *                                 Currently, only one property named FIELDS is supported. This property
     *                                 is also an associative with the names of the constraint fields as array
     *                                 constraints. Each entry of this array is set to another type of associative
     *                                 array that specifies properties of the constraint that are specific to
     *                                 each field.
     *
     *                                 Example
     *                                    array(
     *                                        'fields' => array(
     *                                            'user_name' => array(),
     *                                            'last_login' => array()
     *                                        )
     *                                    )
     * @return void
     */
    public function createConstraint($table, $name, $definition)
    {
        $sql = $this->createConstraintSql($table, $name, $definition);
        
        return $this->conn->exec($sql);
    }

    /**
     * create a constraint on a table
     *
     * @param string    $table         name of the table on which the constraint is to be created
     * @param string    $name          name of the constraint to be created
     * @param array     $definition    associative array that defines properties of the constraint to be created.
     *                                 Currently, only one property named FIELDS is supported. This property
     *                                 is also an associative with the names of the constraint fields as array
     *                                 constraints. Each entry of this array is set to another type of associative
     *                                 array that specifies properties of the constraint that are specific to
     *                                 each field.
     *
     *                                 Example
     *                                    array(
     *                                        'fields' => array(
     *                                            'user_name' => array(),
     *                                            'last_login' => array()
     *                                        )
     *                                    )
     * @return void
     */
    public function createConstraintSql($table, $name, $definition)
    {
        $table = $this->conn->quoteIdentifier($table);
        $name  = $this->conn->quoteIdentifier($this->conn->formatter->getIndexName($name));
        $query = 'ALTER TABLE ' . $table . ' ADD CONSTRAINT ' . $name;

        if (isset($definition['primary']) && $definition['primary']) {
            $query .= ' PRIMARY KEY';
        } elseif (isset($definition['unique']) && $definition['unique']) {
            $query .= ' UNIQUE';
        }

        $fields = array();
        foreach (array_keys($definition['fields']) as $field) {
            $fields[] = $this->conn->quoteIdentifier($field, true);
        }
        $query .= ' ('. implode(', ', $fields) . ')';

        return $query;
    }

    /**
     * Get the stucture of a field into an array
     *
     * @param string    $table         name of the table on which the index is to be created
     * @param string    $name          name of the index to be created
     * @param array     $definition    associative array that defines properties of the index to be created.
     *                                 Currently, only one property named FIELDS is supported. This property
     *                                 is also an associative with the names of the index fields as array
     *                                 indexes. Each entry of this array is set to another type of associative
     *                                 array that specifies properties of the index that are specific to
     *                                 each field.
     *
     *                                 Currently, only the sorting property is supported. It should be used
     *                                 to define the sorting direction of the index. It may be set to either
     *                                 ascending or descending.
     *
     *                                 Not all DBMS support index sorting direction configuration. The DBMS
     *                                 drivers of those that do not support it ignore this property. Use the
     *                                 function supports() to determine whether the DBMS driver can manage indexes.
     *
     *                                 Example
     *                                    array(
     *                                        'fields' => array(
     *                                            'user_name' => array(
     *                                                'sorting' => 'ascending'
     *                                            ),
     *                                            'last_login' => array()
     *                                        )
     *                                    )
     * @return void
     */
    public function createIndex($table, $name, array $definition)
    {
        return $this->conn->execute($this->createIndexSql($table, $name, $definition));
    }

    /**
     * Get the stucture of a field into an array
     *
     * @param string    $table         name of the table on which the index is to be created
     * @param string    $name          name of the index to be created
     * @param array     $definition    associative array that defines properties of the index to be created.
     * @see Doctrine_Export::createIndex()
     * @return string
     */
    public function createIndexSql($table, $name, array $definition)
    {
        $table  = $this->conn->quoteIdentifier($table);
        $name   = $this->conn->quoteIdentifier($name);
        $type   = '';
        
        if (isset($definition['type'])) {
            switch (strtolower($definition['type'])) {
                case 'unique':
                    $type = strtoupper($definition['type']) . ' ';
                break;
                default:
                    throw new Doctrine_Export_Exception(
                        'Unknown type ' . $definition['type'] . ' for index ' . $name . ' in table ' . $table
                    );
            }
        }

        $query = 'CREATE ' . $type . 'INDEX ' . $name . ' ON ' . $table;

        $fields = array();
        foreach ($definition['fields'] as $field) {
            $fields[] = $this->conn->quoteIdentifier($field);
        }
        $query .= ' (' . implode(', ', $fields) . ')';

        return $query;
    }    
    /**
     * createForeignKeySql
     *
     * @param string    $table         name of the table on which the foreign key is to be created
     * @param array     $definition    associative array that defines properties of the foreign key to be created.
     * @return string
     */
    public function createForeignKeySql($table, array $definition)
    {
        $table = $this->conn->quoteIdentifier($table);
        $query = 'ALTER TABLE ' . $table . ' ADD ' . $this->getForeignKeyDeclaration($definition);

        return $query;
    }

    /**
     * createForeignKey
     *
     * @param string    $table         name of the table on which the foreign key is to be created
     * @param array     $definition    associative array that defines properties of the foreign key to be created.
     * @return string
     */
    public function createForeignKey($table, array $definition)
    {
        $sql = $this->createForeignKeySql($table, $definition);
        
        return $this->conn->execute($sql);
    }

    /**
     * alter an existing table
     * (this method is implemented by the drivers)
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
     *                                 be the same as defined by the MDB2 parser.
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
     *                                 as defined by the MDB2 parser.
     *
     *                            Example
     *                                array(
     *                                    'name' => 'userlist',
     *                                    'add' => array(
     *                                        'quota' => array(
     *                                            'type' => 'integer',
     *                                            'unsigned' => 1
     *            