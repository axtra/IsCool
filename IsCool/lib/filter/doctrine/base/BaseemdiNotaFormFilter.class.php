<?php

/**
 * emdiNota filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiNotaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'not_codigo_parcial' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'not_nota'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mat_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mat'), 'add_empty' => true)),
      'pro_id'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'est_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('est'), 'add_empty' => true)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'not_codigo_parcial' => new sfValidatorPass(array('required' => false)),
      'not_nota'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'mat_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mat'), 'column' => 'mat_id')),
      'pro_id'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'est_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('est'), 'column' => 'est_id')),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('emdi_nota_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiNota';
  }

  public function getFields()
  {
    return array(
      'not_id'             => 'Number',
      'not_codigo_parcial' => 'Text',
      'not_nota'           => 'Number',
      'mat_id'             => 'ForeignKey',
      'pro_id'             => 'Number',
      'est_id'             => 'ForeignKey',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
    );
  }
}
