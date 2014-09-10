<?php

/**
 * emdiPlantilla form base class.
 *
 * @method emdiPlantilla getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiPlantillaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pla_id'        => new sfWidgetFormInputHidden(),
      'pla_contenido' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'pla_id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('pla_id')), 'empty_value' => $this->getObject()->get('pla_id'), 'required' => false)),
      'pla_contenido' => new sfValidatorString(array('max_length' => 300)),
    ));

    $this->widgetSchema->setNameFormat('emdi_plantilla[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiPlantilla';
  }

}
