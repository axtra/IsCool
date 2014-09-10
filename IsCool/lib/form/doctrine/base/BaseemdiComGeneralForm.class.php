<?php

/**
 * emdiComGeneral form base class.
 *
 * @method emdiComGeneral getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiComGeneralForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cge_id'         => new sfWidgetFormInputHidden(),
      'cge_contenido'  => new sfWidgetFormTextarea(),
      'cge_referencia' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'cge_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cge_id')), 'empty_value' => $this->getObject()->get('cge_id'), 'required' => false)),
      'cge_contenido'  => new sfValidatorString(),
      'cge_referencia' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_general[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComGeneral';
  }

}
