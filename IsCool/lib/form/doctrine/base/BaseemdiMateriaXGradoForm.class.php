<?php

/**
 * emdiMateriaXGrado form base class.
 *
 * @method emdiMateriaXGrado getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiMateriaXGradoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mxg_id' => new sfWidgetFormInputHidden(),
      'gra_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('gra'), 'add_empty' => false)),
      'mat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mat'), 'add_empty' => false)),
      'pro_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'mxg_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('mxg_id')), 'empty_value' => $this->getObject()->get('mxg_id'), 'required' => false)),
      'gra_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('gra'))),
      'mat_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mat'))),
      'pro_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('pro'))),
    ));

    $this->widgetSchema->setNameFormat('emdi_materia_x_grado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiMateriaXGrado';
  }

}
