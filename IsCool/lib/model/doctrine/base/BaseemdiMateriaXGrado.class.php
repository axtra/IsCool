<?php

/**
 * BaseemdiMateriaXGrado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $mxg_id
 * @property integer $gra_id
 * @property integer $mat_id
 * @property integer $pro_id
 * @property emdiGrado $gra
 * @property emdiMateria $mat
 * @property emdiProfesor $pro
 * 
 * @method integer           getMxgId()  Returns the current record's "mxg_id" value
 * @method integer           getGraId()  Returns the current record's "gra_id" value
 * @method integer           getMatId()  Returns the current record's "mat_id" value
 * @method integer           getProId()  Returns the current record's "pro_id" value
 * @method emdiGrado         getGra()    Returns the current record's "gra" value
 * @method emdiMateria       getMat()    Returns the current record's "mat" value
 * @method emdiProfesor      getPro()    Returns the current record's "pro" value
 * @method emdiMateriaXGrado setMxgId()  Sets the current record's "mxg_id" value
 * @method emdiMateriaXGrado setGraId()  Sets the current record's "gra_id" value
 * @method emdiMateriaXGrado setMatId()  Sets the current record's "mat_id" value
 * @method emdiMateriaXGrado setProId()  Sets the current record's "pro_id" value
 * @method emdiMateriaXGrado setGra()    Sets the current record's "gra" value
 * @method emdiMateriaXGrado setMat()    Sets the current record's "mat" value
 * @method emdiMateriaXGrado setPro()    Sets the current record's "pro" value
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseemdiMateriaXGrado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('emdi_materia_x_grado');
        $this->hasColumn('mxg_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('gra_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('mat_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('pro_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));

        $this->option('charset', 'utf8');
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('emdiGrado as gra', array(
             'local' => 'gra_id',
             'foreign' => 'gra_id'));

        $this->hasOne('emdiMateria as mat', array(
             'local' => 'mat_id',
             'foreign' => 'mat_id'));

        $this->hasOne('emdiProfesor as pro', array(
             'local' => 'pro_id',
             'foreign' => 'pro_id'));
    }
}