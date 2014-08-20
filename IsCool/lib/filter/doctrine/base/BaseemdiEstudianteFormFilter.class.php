<?php

/**
 * emdiEstudiante filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiEstudianteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'est_nombres'              => new sfWidgetFormFilterInput(),
      'est_apellidos'            => new sfWidgetFormFilterInput(),
      'est_cedula'               => new sfWidgetFormFilterInput(),
      'est_fecha_nacimiento'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'est_email_estudiante'     => new sfWidgetFormFilterInput(),
      'est_house'                => new sfWidgetFormFilterInput(),
      'est_nombre_representante' => new sfWidgetFormFilterInput(),
      'est_telf_repr_casa'       => new sfWidgetFormFilterInput(),
      'est_telf_repr_trabajo'    => new sfWidgetFormFilterInput(),
      'est_telf_repr_celular'    => new sfWidgetFormFilterInput(),
      'est_email_representante'  => new sfWidgetFormFilterInput(),
      'est_login_representante'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'est_pass_representante'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gra_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('gra'), 'add_empty' => true)),
      'sf_guard_user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'est_nombres'              => new sfValidatorPass(array('required' => false)),
      'est_apellidos'            => new sfValidatorPass(array('required' => false)),
      'est_cedula'               => new sfValidatorPass(array('required' => false)),
      'est_fecha_nacimiento'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'est_email_estudiante'     => new sfValidatorPass(array('required' => false)),
      'est_house'                => new sfValidatorPass(array('required' => false)),
      'est_nombre_representante' => new sfValidatorPass(array('required' => false)),
      'est_telf_repr_casa'       => new sfValidatorPass(array('required' => false)),
      'est_telf_repr_trabajo'    => new sfValidatorPass(array('required' => false)),
      'est_telf_repr_celular'    => new sfValidatorPass(array('required' => false)),
      'est_email_representante'  => new sfValidatorPass(array('required' => false)),
      'est_login_representante'  => new sfValidatorPass(array('required' => false)),
      'est_pass_representante'   => new sfValidatorPass(array('required' => false)),
      'gra_id'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('gra'), 'column' => 'gra_id')),
      'sf_guard_user_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('emdi_estudiante_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiEstudiante';
  }

  public function getFields()
  {
    return array(
      'est_id'                   => 'Number',
      'est_nombres'              => 'Text',
      'est_apellidos'            => 'Text',
      'est_cedula'               => 'Text',
      'est_fecha_nacimiento'     => 'Date',
      'est_email_estudiante'     => 'Text',
      'est_house'                => 'Text',
      'est_nombre_representante' => 'Text',
      'est_telf_repr_casa'       => 'Text',
      'est_telf_repr_trabajo'    => 'Text',
      'est_telf_repr_celular'    => 'Text',
      'est_email_representante'  => 'Text',
      'est_login_representante'  => 'Text',
      'est_pass_representante'   => 'Text',
      'gra_id'                   => 'ForeignKey',
      'sf_guard_user_id'         => 'ForeignKey',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
