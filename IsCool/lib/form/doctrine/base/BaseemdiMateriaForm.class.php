<?php

/**
 * emdiMateria form base class.
 *
 * @method emdiMateria getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiMateriaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mat_id'     => new sfWidgetFormInputHidden(),
      'mat_nombre' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'mat_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('mat_id')), 'empty_value' => $this->getObject()->get('mat_id'), 'required' => false)),
      'mat_nombre' => new sfValidatorString(array('max_length' => 60)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'emdiMateria', 'column' => array('mat_id')))
    );

    $this->widgetSchema->setNameFormat('emdi_materia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiMateria';
  }

}
