<?php

/**
 * emdiTarea form base class.
 *
 * @method emdiTarea getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiTareaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tar_id'            => new sfWidgetFormInputHidden(),
      'tar_fecha_ingreso' => new sfWidgetFormDate(),
      'tar_fecha_entrega' => new sfWidgetFormDate(),
      'tar_contenido'     => new sfWidgetFormTextarea(),
      'mxg_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mxg'), 'add_empty' => false)),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'tar_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('tar_id')), 'empty_value' => $this->getObject()->get('tar_id'), 'required' => false)),
      'tar_fecha_ingreso' => new sfValidatorDate(),
      'tar_fecha_entrega' => new sfValidatorDate(),
      'tar_contenido'     => new sfValidatorString(array('max_length' => 300)),
      'mxg_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mxg'))),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'emdiTarea', 'column' => array('tar_id')))
    );

    $this->widgetSchema->setNameFormat('emdi_tarea[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiTarea';
  }

}
