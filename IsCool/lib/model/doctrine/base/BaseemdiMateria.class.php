<?php

/**
 * BaseemdiMateria
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $mat_id
 * @property string $mat_nombre
 * @property Doctrine_Collection $emdi_notas
 * @property Doctrine_Collection $emdi_materia_x_gradoes
 * 
 * @method integer             getMatId()                  Returns the current record's "mat_id" value
 * @method string              getMatNombre()              Returns the current record's "mat_nombre" value
 * @method Doctrine_Collection getEmdiNotas()              Returns the current record's "emdi_notas" collection
 * @method Doctrine_Collection getEmdiMateriaXGradoes()    Returns the current record's "emdi_materia_x_gradoes" collection
 * @method emdiMateria         setMatId()                  Sets the current record's "mat_id" value
 * @method emdiMateria         setMatNombre()              Sets the current record's "mat_nombre" value
 * @method emdiMateria         setEmdiNotas()              Sets the current record's "emdi_notas" collection
 * @method emdiMateria         setEmdiMateriaXGradoes()    Sets the current record's "emdi_materia_x_gradoes" collection
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseemdiMateria extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('emdi_materia');
        $this->hasColumn('mat_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unique' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('mat_nombre', 'string', 60, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 60,
             ));

        $this->option('charset', 'utf8');
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('emdiNota as emdi_notas', array(
             'local' => 'mat_id',
             'foreign' => 'mat_id'));

        $this->hasMany('emdiMateriaXGrado as emdi_materia_x_gradoes', array(
             'local' => 'mat_id',
             'foreign' => 'mat_id'));
    }
}