<?php

/**
 * emdiProfesor filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiProfesorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pro_nombres'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pro_apellidos'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pro_cedula'           => new sfWidgetFormFilterInput(),
      'pro_email'            => new sfWidgetFormFilterInput(),
      'pro_telf_casa'        => new sfWidgetFormFilterInput(),
      'pro_telf_celular'     => new sfWidgetFormFilterInput(),
      'pro_login'            => new sfWidgetFormFilterInput(),
      'pro_pass'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pro_fecha_nacimiento' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'pro_house'            => new sfWidgetFormFilterInput(),
      'sf_guard_user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'pro_nombres'          => new sfValidatorPass(array('required' => false)),
      'pro_apellidos'        => new sfValidatorPass(array('required' => false)),
      'pro_cedula'           => new sfValidatorPass(array('required' => false)),
      'pro_email'            => new sfValidatorPass(array('required' => false)),
      'pro_telf_casa'        => new sfValidatorPass(array('required' => false)),
      'pro_telf_celular'     => new sfValidatorPass(array('required' => false)),
      'pro_login'            => new sfValidatorPass(array('required' => false)),
      'pro_pass'             => new sfValidatorPass(array('required' => false)),
      'pro_fecha_nacimiento' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'pro_house'            => new sfValidatorPass(array('required' => false)),
      'sf_guard_user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('emdi_profesor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiProfesor';
  }

  public function getFields()
  {
    return array(
      'pro_id'               => 'Number',
      'pro_nombres'          => 'Text',
      'pro_apellidos'        => 'Text',
      'pro_cedula'           => 'Text',
      'pro_email'            => 'Text',
      'pro_telf_casa'        => 'Text',
      'pro_telf_celular'     => 'Text',
      'pro_login'            => 'Text',
      'pro_pass'             => 'Text',
      'pro_fecha_nacimiento' => 'Date',
      'pro_house'            => 'Text',
      'sf_guard_user_id'     => 'ForeignKey',
    );
  }
}
