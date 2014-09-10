<?php

/**
 * emdiComXGrado form base class.
 *
 * @method emdiComXGrado getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiComXGradoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cxg'    => new sfWidgetFormInputHidden(),
      'cge_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('cge'), 'add_empty' => false)),
      'gra_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('gra'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'cxg'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('cxg')), 'empty_value' => $this->getObject()->get('cxg'), 'required' => false)),
      'cge_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('cge'))),
      'gra_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('gra'))),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_x_grado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComXGrado';
  }

}
