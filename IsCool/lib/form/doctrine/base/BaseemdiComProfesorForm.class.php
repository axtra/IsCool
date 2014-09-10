<?php

/**
 * emdiComProfesor form base class.
 *
 * @method emdiComProfesor getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiComProfesorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cpr_id'         => new sfWidgetFormInputHidden(),
      'cpr_contenido'  => new sfWidgetFormTextarea(),
      'cpr_referencia' => new sfWidgetFormInputText(),
      'est_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('est'), 'add_empty' => false)),
      'pro_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => false)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'cpr_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cpr_id')), 'empty_value' => $this->getObject()->get('cpr_id'), 'required' => false)),
      'cpr_contenido'  => new sfValidatorString(array('max_length' => 300)),
      'cpr_referencia' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'est_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('est'))),
      'pro_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('pro'))),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_profesor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComProfesor';
  }

}
