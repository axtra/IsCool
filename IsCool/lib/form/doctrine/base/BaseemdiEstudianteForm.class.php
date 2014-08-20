<?php

/**
 * emdiEstudiante form base class.
 *
 * @method emdiEstudiante getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiEstudianteForm extends BaseFormDoctrine
{
  public function setup()
  {
  	
  	$years = range(1990, 2020);
  	
    $this->setWidgets(array(
      'est_id'                   => new sfWidgetFormInputHidden(),
      'est_nombres'              => new sfWidgetFormInputText(),
      'est_apellidos'            => new sfWidgetFormInputText(),
      'est_cedula'               => new sfWidgetFormInputText(),
      'est_fecha_nacimiento'     => new sfWidgetFormDate(
									  array('years' => array_combine($years, $years))
    								),
      'est_email_estudiante'     => new sfWidgetFormInputText(),
      'est_house'                => new sfWidgetFormInputText(),
      'est_nombre_representante' => new sfWidgetFormInputText(),
      'est_telf_repr_casa'       => new sfWidgetFormInputText(),
      'est_telf_repr_trabajo'    => new sfWidgetFormInputText(),
      'est_telf_repr_celular'    => new sfWidgetFormInputText(),
      'est_email_representante'  => new sfWidgetFormInputText(),
      'est_login_representante'  => new sfWidgetFormInputText(),
      'est_pass_representante'   => new sfWidgetFormInputText(),
      'gra_id'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('gra'), 'add_empty' => false)),
      'sf_guard_user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'est_id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('est_id')), 'empty_value' => $this->getObject()->get('est_id'), 'required' => false)),
      'est_nombres'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'est_apellidos'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'est_cedula'               => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'est_fecha_nacimiento'     => new sfValidatorDate(array('required' => false)),
      'est_email_estudiante'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'est_house'                => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'est_nombre_representante' => new sfValidatorString(array('max_length' => 120, 'required' => false)),
      'est_telf_repr_casa'       => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'est_telf_repr_trabajo'    => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'est_telf_repr_celular'    => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'est_email_representante'  => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'est_login_representante'  => new sfValidatorString(array('max_length' => 60)),
      'est_pass_representante'   => new sfValidatorString(array('max_length' => 10)),
      'gra_id'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('gra'))),
      'sf_guard_user_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'emdiEstudiante', 'column' => array('est_id')))
    );

    $this->widgetSchema->setNameFormat('emdi_estudiante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiEstudiante';
  }

}
