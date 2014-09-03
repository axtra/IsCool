<?php

/**
 * emdiAdministracion form base class.
 *
 * @method emdiAdministracion getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiAdministracionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'adm_id'               => new sfWidgetFormInputHidden(),
      'adm_habilitar_nota1'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota2'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota3'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota4'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota5'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota6'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota7'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota8'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota9'  => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota10' => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota11' => new sfWidgetFormInputCheckbox(),
      'adm_habilitar_nota12' => new sfWidgetFormInputCheckbox(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'adm_id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('adm_id')), 'empty_value' => $this->getObject()->get('adm_id'), 'required' => false)),
      'adm_habilitar_nota1'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota2'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota3'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota4'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota5'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota6'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota7'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota8'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota9'  => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota10' => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota11' => new sfValidatorBoolean(array('required' => false)),
      'adm_habilitar_nota12' => new sfValidatorBoolean(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'emdiAdministracion', 'column' => array('adm_id')))
    );

    $this->widgetSchema->setNameFormat('emdi_administracion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiAdministracion';
  }

}
