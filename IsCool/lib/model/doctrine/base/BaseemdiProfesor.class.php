<?php

/**
 * BaseemdiProfesor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $pro_id
 * @property string $pro_nombres
 * @property string $pro_apellidos
 * @property string $pro_cedula
 * @property string $pro_email
 * @property string $pro_telf_casa
 * @property string $pro_telf_celular
 * @property string $pro_login
 * @property string $pro_pass
 * @property date $pro_fecha_nacimiento
 * @property string $pro_house
 * @property integer $sf_guard_user_id
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $emdi_gradoes
 * @property Doctrine_Collection $emdi_materia_x_gradoes
 * @property Doctrine_Collection $emdi_com_individuals
 * 
 * @method integer             getProId()                  Returns the current record's "pro_id" value
 * @method string              getProNombres()             Returns the current record's "pro_nombres" value
 * @method string              getProApellidos()           Returns the current record's "pro_apellidos" value
 * @method string              getProCedula()              Returns the current record's "pro_cedula" value
 * @method string              getProEmail()               Returns the current record's "pro_email" value
 * @method string              getProTelfCasa()            Returns the current record's "pro_telf_casa" value
 * @method string              getProTelfCelular()         Returns the current record's "pro_telf_celular" value
 * @method string              getProLogin()               Returns the current record's "pro_login" value
 * @method string              getProPass()                Returns the current record's "pro_pass" value
 * @method date                getProFechaNacimiento()     Returns the current record's "pro_fecha_nacimiento" value
 * @method string              getProHouse()               Returns the current record's "pro_house" value
 * @method integer             getSfGuardUserId()          Returns the current record's "sf_guard_user_id" value
 * @method sfGuardUser         getSfGuardUser()            Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getEmdiGradoes()            Returns the current record's "emdi_gradoes" collection
 * @method Doctrine_Collection getEmdiMateriaXGradoes()    Returns the current record's "emdi_materia_x_gradoes" collection
 * @method Doctrine_Collection getEmdiComIndividuals()     Returns the current record's "emdi_com_individuals" collection
 * @method emdiProfesor        setProId()                  Sets the current record's "pro_id" value
 * @method emdiProfesor        setProNombres()             Sets the current record's "pro_nombres" value
 * @method emdiProfesor        setProApellidos()           Sets the current record's "pro_apellidos" value
 * @method emdiProfesor        setProCedula()              Sets the current record's "pro_cedula" value
 * @method emdiProfesor        setProEmail()               Sets the current record's "pro_email" value
 * @method emdiProfesor        setProTelfCasa()            Sets the current record's "pro_telf_casa" value
 * @method emdiProfesor        setProTelfCelular()         Sets the current record's "pro_telf_celular" value
 * @method emdiProfesor        setProLogin()               Sets the current record's "pro_login" value
 * @method emdiProfesor        setProPass()                Sets the current record's "pro_pass" value
 * @method emdiProfesor        setProFechaNacimiento()     Sets the current record's "pro_fecha_nacimiento" value
 * @method emdiProfesor        setProHouse()               Sets the current record's "pro_house" value
 * @method emdiProfesor        setSfGuardUserId()          Sets the current record's "sf_guard_user_id" value
 * @method emdiProfesor        setSfGuardUser()            Sets the current record's "sfGuardUser" value
 * @method emdiProfesor        setEmdiGradoes()            Sets the current record's "emdi_gradoes" collection
 * @method emdiProfesor        setEmdiMateriaXGradoes()    Sets the current record's "emdi_materia_x_gradoes" collection
 * @method emdiProfesor        setEmdiComIndividuals()     Sets the current record's "emdi_com_individuals" collection
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseemdiProfesor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('emdi_profesor');
        $this->hasColumn('pro_id', 'integer', 4, array(
             'type' => 'integer',
             'unique' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('pro_nombres', 'string', 60, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 60,
             ));
        $this->hasColumn('pro_apellidos', 'string', 60, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 60,
             ));
        $this->hasColumn('pro_cedula', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('pro_email', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('pro_telf_casa', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('pro_telf_celular', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('pro_login', 'string', 60, array(
             'type' => 'string',
             'length' => 60,
             ));
        $this->hasColumn('pro_pass', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 10,
             ));
        $this->hasColumn('pro_fecha_nacimiento', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('pro_house', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('sf_guard_user_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));


        $this->index('fk_emdi_profesor_sf_guard_user1', array(
             'fields' => 
             array(
              0 => 'sf_guard_user_id',
             ),
             ));
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id'));

        $this->hasMany('emdiGrado as emdi_gradoes', array(
             'local' => 'pro_id',
             'foreign' => 'pro_id'));

        $this->hasMany('emdiMateriaXGrado as emdi_materia_x_gradoes', array(
             'local' => 'pro_id',
             'foreign' => 'pro_id'));

        $this->hasMany('emdiComIndividual as emdi_com_individuals', array(
             'local' => 'pro_id',
             'foreign' => 'pro_id'));
    }
}