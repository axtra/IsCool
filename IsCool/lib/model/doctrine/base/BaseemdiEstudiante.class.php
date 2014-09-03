<?php

/**
 * BaseemdiEstudiante
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $est_id
 * @property string $est_nombres
 * @property string $est_apellidos
 * @property string $est_cedula
 * @property date $est_fecha_nacimiento
 * @property string $est_email_estudiante
 * @property string $est_house
 * @property string $est_nombre_representante
 * @property string $est_telf_repr_casa
 * @property string $est_telf_repr_trabajo
 * @property string $est_telf_repr_celular
 * @property string $est_email_representante
 * @property string $est_login_representante
 * @property string $est_pass_representante
 * @property integer $gra_id
 * @property integer $sf_guard_user_id
 * @property emdiGrado $gra
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $emdi_notas
 * @property Doctrine_Collection $emdi_com_individuals
 * 
 * @method integer             getEstId()                    Returns the current record's "est_id" value
 * @method string              getEstNombres()               Returns the current record's "est_nombres" value
 * @method string              getEstApellidos()             Returns the current record's "est_apellidos" value
 * @method string              getEstCedula()                Returns the current record's "est_cedula" value
 * @method date                getEstFechaNacimiento()       Returns the current record's "est_fecha_nacimiento" value
 * @method string              getEstEmailEstudiante()       Returns the current record's "est_email_estudiante" value
 * @method string              getEstHouse()                 Returns the current record's "est_house" value
 * @method string              getEstNombreRepresentante()   Returns the current record's "est_nombre_representante" value
 * @method string              getEstTelfReprCasa()          Returns the current record's "est_telf_repr_casa" value
 * @method string              getEstTelfReprTrabajo()       Returns the current record's "est_telf_repr_trabajo" value
 * @method string              getEstTelfReprCelular()       Returns the current record's "est_telf_repr_celular" value
 * @method string              getEstEmailRepresentante()    Returns the current record's "est_email_representante" value
 * @method string              getEstLoginRepresentante()    Returns the current record's "est_login_representante" value
 * @method string              getEstPassRepresentante()     Returns the current record's "est_pass_representante" value
 * @method integer             getGraId()                    Returns the current record's "gra_id" value
 * @method integer             getSfGuardUserId()            Returns the current record's "sf_guard_user_id" value
 * @method emdiGrado           getGra()                      Returns the current record's "gra" value
 * @method sfGuardUser         getSfGuardUser()              Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getEmdiNotas()                Returns the current record's "emdi_notas" collection
 * @method Doctrine_Collection getEmdiComIndividuals()       Returns the current record's "emdi_com_individuals" collection
 * @method emdiEstudiante      setEstId()                    Sets the current record's "est_id" value
 * @method emdiEstudiante      setEstNombres()               Sets the current record's "est_nombres" value
 * @method emdiEstudiante      setEstApellidos()             Sets the current record's "est_apellidos" value
 * @method emdiEstudiante      setEstCedula()                Sets the current record's "est_cedula" value
 * @method emdiEstudiante      setEstFechaNacimiento()       Sets the current record's "est_fecha_nacimiento" value
 * @method emdiEstudiante      setEstEmailEstudiante()       Sets the current record's "est_email_estudiante" value
 * @method emdiEstudiante      setEstHouse()                 Sets the current record's "est_house" value
 * @method emdiEstudiante      setEstNombreRepresentante()   Sets the current record's "est_nombre_representante" value
 * @method emdiEstudiante      setEstTelfReprCasa()          Sets the current record's "est_telf_repr_casa" value
 * @method emdiEstudiante      setEstTelfReprTrabajo()       Sets the current record's "est_telf_repr_trabajo" value
 * @method emdiEstudiante      setEstTelfReprCelular()       Sets the current record's "est_telf_repr_celular" value
 * @method emdiEstudiante      setEstEmailRepresentante()    Sets the current record's "est_email_representante" value
 * @method emdiEstudiante      setEstLoginRepresentante()    Sets the current record's "est_login_representante" value
 * @method emdiEstudiante      setEstPassRepresentante()     Sets the current record's "est_pass_representante" value
 * @method emdiEstudiante      setGraId()                    Sets the current record's "gra_id" value
 * @method emdiEstudiante      setSfGuardUserId()            Sets the current record's "sf_guard_user_id" value
 * @method emdiEstudiante      setGra()                      Sets the current record's "gra" value
 * @method emdiEstudiante      setSfGuardUser()              Sets the current record's "sfGuardUser" value
 * @method emdiEstudiante      setEmdiNotas()                Sets the current record's "emdi_notas" collection
 * @method emdiEstudiante      setEmdiComIndividuals()       Sets the current record's "emdi_com_individuals" collection
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseemdiEstudiante extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('emdi_estudiante');
        $this->hasColumn('est_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unique' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('est_nombres', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('est_apellidos', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('est_cedula', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('est_fecha_nacimiento', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('est_email_estudiante', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('est_house', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('est_nombre_representante', 'string', 120, array(
             'type' => 'string',
             'length' => 120,
             ));
        $this->hasColumn('est_telf_repr_casa', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('est_telf_repr_trabajo', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('est_telf_repr_celular', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('est_email_representante', 'string', 60, array(
             'type' => 'string',
             'length' => 60,
             ));
        $this->hasColumn('est_login_representante', 'string', 60, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 60,
             ));
        $this->hasColumn('est_pass_representante', 'string', 10, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 10,
             ));
        $this->hasColumn('gra_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('sf_guard_user_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));


        $this->index('fk_emdi_estudiante_emdi_grado1', array(
             'fields' => 
             array(
              0 => 'gra_id',
             ),
             ));
        $this->index('fk_emdi_estudiante_sf_guard_user1', array(
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
        $this->hasOne('emdiGrado as gra', array(
             'local' => 'gra_id',
             'foreign' => 'gra_id'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id'));

        $this->hasMany('emdiNota as emdi_notas', array(
             'local' => 'est_id',
             'foreign' => 'est_id'));

        $this->hasMany('emdiComIndividual as emdi_com_individuals', array(
             'local' => 'est_id',
             'foreign' => 'est_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}