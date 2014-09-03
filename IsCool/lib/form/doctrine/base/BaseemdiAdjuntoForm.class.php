<?php

/**
 * emdiAdjunto form base class.
 *
 * @method emdiAdjunto getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiAdjuntoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'adj_id'      => new sfWidgetFormInputHidden(),
      'adj_archivo' => new sfWidgetFormTextarea(),
      'tar_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('tar'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'adj_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('adj_id')), 'empty_value' => $this->getObject()->get('adj_id'), 'required' => false)),
      'adj_archivo' => new sfValidatorString(),
      'tar_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('tar'))),
    ));

    $this->widgetSchema->setNameFormat('emdi_adjunto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiAdjunto';
  }

}
