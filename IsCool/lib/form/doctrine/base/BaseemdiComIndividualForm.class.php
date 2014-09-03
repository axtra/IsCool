<?php

/**
 * emdiComIndividual form base class.
 *
 * @method emdiComIndividual getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiComIndividualForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cin_id'                => new sfWidgetFormInputHidden(),
      'cin_codigo'            => new sfWidgetFormInputText(),
      'cin_fecha_envio'       => new sfWidgetFormDate(),
      'cin_contenido'         => new sfWidgetFormTextarea(),
      'cin_referencias'       => new sfWidgetFormInputText(),
      'cin_estado_moderacion' => new sfWidgetFormInputText(),
      'est_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('est'), 'add_empty' => false)),
      'pro_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => false)),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'cin_id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cin_id')), 'empty_value' => $this->getObject()->get('cin_id'), 'required' => false)),
      'cin_codigo'            => new sfValidatorString(array('max_length' => 15)),
      'cin_fecha_envio'       => new sfValidatorDate(array('required' => false)),
      'cin_contenido'         => new sfValidatorString(),
      'cin_referencias'       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'cin_estado_moderacion' => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'est_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('est'))),
      'pro_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('pro'))),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_individual[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComIndividual';
  }

}
