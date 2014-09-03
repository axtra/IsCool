<?php

/**
 * BaseemdiAdjunto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $adj_id
 * @property blob $adj_archivo
 * @property integer $tar_id
 * @property emdiTarea $tar
 * 
 * @method integer     getAdjId()       Returns the current record's "adj_id" value
 * @method blob        getAdjArchivo()  Returns the current record's "adj_archivo" value
 * @method integer     getTarId()       Returns the current record's "tar_id" value
 * @method emdiTarea   getTar()         Returns the current record's "tar" value
 * @method emdiAdjunto setAdjId()       Sets the current record's "adj_id" value
 * @method emdiAdjunto setAdjArchivo()  Sets the current record's "adj_archivo" value
 * @method emdiAdjunto setTarId()       Sets the current record's "tar_id" value
 * @method emdiAdjunto setTar()         Sets the current record's "tar" value
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseemdiAdjunto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('emdi_adjuntos');
        $this->hasColumn('adj_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('adj_archivo', 'blob', 65535, array(
             'type' => 'blob',
             'notnull' => true,
             'length' => 65535,
             ));
        $this->hasColumn('tar_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));


        $this->index('fk_emdi_adjuntos_emdi_tareas1_idx', array(
             'fields' => 
             array(
              0 => 'tar_id',
             ),
             ));
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('emdiTarea as tar', array(
             'local' => 'tar_id',
             'foreign' => 'tar_id'));
    }
}