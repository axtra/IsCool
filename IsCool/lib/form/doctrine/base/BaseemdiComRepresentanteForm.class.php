<?php

/**
 * emdiComRepresentante form base class.
 *
 * @method emdiComRepresentante getObject() Returns the current form's model object
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseemdiComRepresentanteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mre_id'        => new sfWidgetFormInputHidden(),
      'mre_contenido' => new sfWidgetFormTextarea(),
      'mre_estado'    => new sfWidgetFormInputText(),
      'est_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('est'), 'add_empty' => false)),
      'pro_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'mre_id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('mre_id')), 'empty_value' => $this->getObject()->get('mre_id'), 'required' => false)),
      'mre_contenido' => new sfValidatorString(),
      'mre_estado'    => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'est_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('est'))),
      'pro_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_representante[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComRepresentante';
  }

}
