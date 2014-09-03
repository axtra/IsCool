<?php

/**
 * emdiProfesor form base class.
 *
 * @method emdiProfesor getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiProfesorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pro_id'               => new sfWidgetFormInputHidden(),
      'pro_nombres'          => new sfWidgetFormInputText(),
      'pro_apellidos'        => new sfWidgetFormInputText(),
      'pro_cedula'           => new sfWidgetFormInputText(),
      'pro_email'            => new sfWidgetFormInputText(),
      'pro_telf_casa'        => new sfWidgetFormInputText(),
      'pro_telf_celular'     => new sfWidgetFormInputText(),
      'pro_login'            => new sfWidgetFormInputText(),
      'pro_pass'             => new sfWidgetFormInputText(),
      'pro_fecha_nacimiento' => new sfWidgetFormDate(),
      'pro_house'            => new sfWidgetFormInputText(),
      'sf_guard_user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'pro_id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pro_id')), 'empty_value' => $this->getObject()->get('pro_id'), 'required' => false)),
      'pro_nombres'          => new sfValidatorString(array('max_length' => 60)),
      'pro_apellidos'        => new sfValidatorString(array('max_length' => 60)),
      'pro_cedula'           => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'pro_email'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'pro_telf_casa'        => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'pro_telf_celular'     => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'pro_login'            => new sfValidatorString(array('max_length' => 60, 'required' => false)),
      'pro_pass'             => new sfValidatorString(array('max_length' => 10)),
      'pro_fecha_nacimiento' => new sfValidatorDate(array('required' => false)),
      'pro_house'            => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'sf_guard_user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'emdiProfesor', 'column' => array('pro_id')))
    );

    $this->widgetSchema->setNameFormat('emdi_profesor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiProfesor';
  }

}
