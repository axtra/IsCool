<?php

/**
 * emdiComXGrado filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiComXGradoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cge_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('cge'), 'add_empty' => true)),
      'gra_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('gra'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cge_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('cge'), 'column' => 'cge_id')),
      'gra_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('gra'), 'column' => 'gra_id')),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_x_grado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComXGrado';
  }

  public function getFields()
  {
    return array(
      'cxg'    => 'Number',
      'cge_id' => 'ForeignKey',
      'gra_id' => 'ForeignKey',
    );
  }
}
