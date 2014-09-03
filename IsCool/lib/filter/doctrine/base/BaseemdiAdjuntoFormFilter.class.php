<?php

/**
 * emdiAdjunto filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiAdjuntoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'adj_archivo' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tar_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('tar'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'adj_archivo' => new sfValidatorPass(array('required' => false)),
      'tar_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('tar'), 'column' => 'tar_id')),
    ));

    $this->widgetSchema->setNameFormat('emdi_adjunto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiAdjunto';
  }

  public function getFields()
  {
    return array(
      'adj_id'      => 'Number',
      'adj_archivo' => 'Text',
      'tar_id'      => 'ForeignKey',
    );
  }
}
