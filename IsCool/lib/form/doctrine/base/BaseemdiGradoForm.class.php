<?php

/**
 * emdiGrado form base class.
 *
 * @method emdiGrado getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiGradoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gra_id'           => new sfWidgetFormInputHidden(),
      'gra_nombre'       => new sfWidgetFormInputText(),
      'gra_nombre_corto' => new sfWidgetFormInputText(),
      'pro_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'gra_id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('gra_id')), 'empty_value' => $this->getObject()->get('gra_id'), 'required' => false)),
      'gra_nombre'       => new sfValidatorString(array('max_length' => 40)),
      'gra_nombre_corto' => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'pro_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('pro'))),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'emdiGrado', 'column' => array('gra_id')))
    );

    $this->widgetSchema->setNameFormat('emdi_grado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiGrado';
  }

}
