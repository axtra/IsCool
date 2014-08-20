<?php

/**
 * BaseemdiGrado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $gra_id
 * @property string $gra_nombre
 * @property string $gra_nombre_corto
 * @property integer $pro_id
 * @property emdiProfesor $pro
 * @property Doctrine_Collection $emdi_estudiantes
 * @property Doctrine_Collection $emdi_materia_x_gradoes
 * 
 * @method integer             getGraId()                  Returns the current record's "gra_id" value
 * @method string              getGraNombre()              Returns the current record's "gra_nombre" value
 * @method string              getGraNombreCorto()         Returns the current record's "gra_nombre_corto" value
 * @method integer             getProId()                  Returns the current record's "pro_id" value
 * @method emdiProfesor        getPro()                    Returns the current record's "pro" value
 * @method Doctrine_Collection getEmdiEstudiantes()        Returns the current record's "emdi_estudiantes" collection
 * @method Doctrine_Collection getEmdiMateriaXGradoes()    Returns the current record's "emdi_materia_x_gradoes" collection
 * @method emdiGrado           setGraId()                  Sets the current record's "gra_id" value
 * @method emdiGrado           setGraNombre()              Sets the current record's "gra_nombre" value
 * @method emdiGrado           setGraNombreCorto()         Sets the current record's "gra_nombre_corto" value
 * @method emdiGrado           setProId()                  Sets the current record's "pro_id" value
 * @method emdiGrado           setPro()                    Sets the current record's "pro" value
 * @method emdiGrado           setEmdiEstudiantes()        Sets the current record's "emdi_estudiantes" collection
 * @method emdiGrado           setEmdiMateriaXGradoes()    Sets the current record's "emdi_materia_x_gradoes" collection
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseemdiGrado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('emdi_grado');
        $this->hasColumn('gra_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unique' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('gra_nombre', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 40,
             ));
        $this->hasColumn('gra_nombre_corto', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
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
        $this->hasOne('emdiProfesor as pro', array(
             'local' => 'pro_id',
             'foreign' => 'pro_id'));

        $this->hasMany('emdiEstudiante as emdi_estudiantes', array(
             'local' => 'gra_id',
             'foreign' => 'gra_id'));

        $this->hasMany('emdiMateriaXGrado as emdi_materia_x_gradoes', array(
             'local' => 'gra_id',
             'foreign' => 'gra_id'));
    }
}