<?php

/**
 * emdiNota form base class.
 *
 * @method emdiNota getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiNotaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'not_id'             => new sfWidgetFormInputHidden(),
      'not_codigo_parcial' => new sfWidgetFormInputText(),
      'not_nota'           => new sfWidgetFormInputText(),
      'mat_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mat'), 'add_empty' => false)),
      'pro_id'             => new sfWidgetFormInputText(),
      'est_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('est'), 'add_empty' => false)),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'not_id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('not_id')), 'empty_value' => $this->getObject()->get('not_id'), 'required' => false)),
      'not_codigo_parcial' => new sfValidatorString(array('max_length' => 4)),
      'not_nota'           => new sfValidatorNumber(),
      'mat_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mat'))),
      'pro_id'             => new sfValidatorInteger(),
      'est_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('est'))),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'emdiNota', 'column' => array('not_id')))
    );

    $this->widgetSchema->setNameFormat('emdi_nota[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiNota';
  }

}
