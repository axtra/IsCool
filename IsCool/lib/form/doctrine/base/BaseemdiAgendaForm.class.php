<?php

/**
 * emdiAgenda form base class.
 *
 * @method emdiAgenda getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiAgendaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'age_id'     => new sfWidgetFormInputHidden(),
      'age_firma'  => new sfWidgetFormInputText(),
      'est_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('est'), 'add_empty' => false)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'age_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('age_id')), 'empty_value' => $this->getObject()->get('age_id'), 'required' => false)),
      'age_firma'  => new sfValidatorString(array('max_length' => 1)),
      'est_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('est'))),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('emdi_agenda[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiAgenda';
  }

}
