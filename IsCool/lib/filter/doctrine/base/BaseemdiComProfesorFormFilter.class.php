<?php

/**
 * emdiComProfesor filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiComProfesorFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cpr_contenido'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cpr_referencia' => new sfWidgetFormFilterInput(),
      'est_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('est'), 'add_empty' => true)),
      'pro_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('pro'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'cpr_contenido'  => new sfValidatorPass(array('required' => false)),
      'cpr_referencia' => new sfValidatorPass(array('required' => false)),
      'est_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('est'), 'column' => 'est_id')),
      'pro_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('pro'), 'column' => 'pro_id')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_profesor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComProfesor';
  }

  public function getFields()
  {
    return array(
      'cpr_id'         => 'Number',
      'cpr_contenido'  => 'Text',
      'cpr_referencia' => 'Text',
      'est_id'         => 'ForeignKey',
      'pro_id'         => 'ForeignKey',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
