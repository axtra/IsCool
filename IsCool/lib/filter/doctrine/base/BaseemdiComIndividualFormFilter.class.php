<?php

/**
 * emdiComIndividual filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiComIndividualFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cin_codigo'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cin_fecha_envio'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cin_contenido'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cin_referencias'       => new sfWidgetFormFilterInput(),
      'cin_estado_moderacion' => new sfWidgetFormFilterInput(),
      'est_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('est'), 'add_empty' => true)),
      'pro_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => true)),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'cin_codigo'            => new sfValidatorPass(array('required' => false)),
      'cin_fecha_envio'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'cin_contenido'         => new sfValidatorPass(array('required' => false)),
      'cin_referencias'       => new sfValidatorPass(array('required' => false)),
      'cin_estado_moderacion' => new sfValidatorPass(array('required' => false)),
      'est_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('est'), 'column' => 'est_id')),
      'pro_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('pro'), 'column' => 'pro_id')),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_individual_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComIndividual';
  }

  public function getFields()
  {
    return array(
      'cin_id'                => 'Number',
      'cin_codigo'            => 'Text',
      'cin_fecha_envio'       => 'Date',
      'cin_contenido'         => 'Text',
      'cin_referencias'       => 'Text',
      'cin_estado_moderacion' => 'Text',
      'est_id'                => 'ForeignKey',
      'pro_id'                => 'ForeignKey',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
