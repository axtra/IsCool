<?php

/**
 * BaseemdiComIndividual
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cin_id
 * @property string $cin_codigo
 * @property date $cin_fecha_envio
 * @property clob $cin_contenido
 * @property string $cin_referencias
 * @property string $cin_estado_moderacion
 * @property integer $est_id
 * @property integer $pro_id
 * @property emdiEstudiante $est
 * @property emdiProfesor $pro
 * 
 * @method integer           getCinId()                 Returns the current record's "cin_id" value
 * @method string            getCinCodigo()             Returns the current record's "cin_codigo" value
 * @method date              getCinFechaEnvio()         Returns the current record's "cin_fecha_envio" value
 * @method clob              getCinContenido()          Returns the current record's "cin_contenido" value
 * @method string            getCinReferencias()        Returns the current record's "cin_referencias" value
 * @method string            getCinEstadoModeracion()   Returns the current record's "cin_estado_moderacion" value
 * @method integer           getEstId()                 Returns the current record's "est_id" value
 * @method integer           getProId()                 Returns the current record's "pro_id" value
 * @method emdiEstudiante    getEst()                   Returns the current record's "est" value
 * @method emdiProfesor      getPro()                   Returns the current record's "pro" value
 * @method emdiComIndividual setCinId()                 Sets the current record's "cin_id" value
 * @method emdiComIndividual setCinCodigo()             Sets the current record's "cin_codigo" value
 * @method emdiComIndividual setCinFechaEnvio()         Sets the current record's "cin_fecha_envio" value
 * @method emdiComIndividual setCinContenido()          Sets the current record's "cin_contenido" value
 * @method emdiComIndividual setCinReferencias()        Sets the current record's "cin_referencias" value
 * @method emdiComIndividual setCinEstadoModeracion()   Sets the current record's "cin_estado_moderacion" value
 * @method emdiComIndividual setEstId()                 Sets the current record's "est_id" value
 * @method emdiComIndividual setProId()                 Sets the current record's "pro_id" value
 * @method emdiComIndividual setEst()                   Sets the current record's "est" value
 * @method emdiComIndividual setPro()                   Sets the current record's "pro" value
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseemdiComIndividual extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('emdi_com_individual');
        $this->hasColumn('cin_id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'unsigned' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('cin_codigo', 'string', 15, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 15,
             ));
        $this->hasColumn('cin_fecha_envio', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('cin_contenido', 'clob', 65535, array(
             'type' => 'clob',
             'notnull' => true,
             'length' => 65535,
             ));
        $this->hasColumn('cin_referencias', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('cin_estado_moderacion', 'string', 1, array(
             'type' => 'string',
             'fixed' => 1,
             'length' => 1,
             ));
        $this->hasColumn('est_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('pro_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));


        $this->index('fk_emdi_comunicado_ind_emdi_estudiante1_idx', array(
             'fields' => 
             array(
              0 => 'est_id',
             ),
             ));
        $this->index('fk_emdi_comunicado_ind_emdi_profesor1_idx', array(
             'fields' => 
             array(
              0 => 'pro_id',
             ),
             ));
        $this->option('collate', 'utf8_spanish_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('emdiEstudiante as est', array(
             'local' => 'est_id',
             'foreign' => 'est_id'));

        $this->hasOne('emdiProfesor as pro', array(
             'local' => 'pro_id',
             'foreign' => 'pro_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}