<?php

/**
 * emdiGrado filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiGradoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gra_nombre'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gra_nombre_corto' => new sfWidgetFormFilterInput(),
      'pro_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'gra_nombre'       => new sfValidatorPass(array('required' => false)),
      'gra_nombre_corto' => new sfValidatorPass(array('required' => false)),
      'pro_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('pro'), 'column' => 'pro_id')),
    ));

    $this->widgetSchema->setNameFormat('emdi_grado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiGrado';
  }

  public function getFields()
  {
    return array(
      'gra_id'           => 'Number',
      'gra_nombre'       => 'Text',
      'gra_nombre_corto' => 'Text',
      'pro_id'           => 'ForeignKey',
    );
  }
}
