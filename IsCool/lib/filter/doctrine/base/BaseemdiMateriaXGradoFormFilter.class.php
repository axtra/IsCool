<?php

/**
 * emdiMateriaXGrado filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiMateriaXGradoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gra_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('gra'), 'add_empty' => true)),
      'mat_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mat'), 'add_empty' => true)),
      'pro_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'gra_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('gra'), 'column' => 'gra_id')),
      'mat_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mat'), 'column' => 'mat_id')),
      'pro_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('pro'), 'column' => 'pro_id')),
    ));

    $this->widgetSchema->setNameFormat('emdi_materia_x_grado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiMateriaXGrado';
  }

  public function getFields()
  {
    return array(
      'mxg_id' => 'Number',
      'gra_id' => 'ForeignKey',
      'mat_id' => 'ForeignKey',
      'pro_id' => 'ForeignKey',
    );
  }
}
