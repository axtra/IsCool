<?php

/**
 * emdiComGeneral filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiComGeneralFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cge_codigo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cge_fecha_envio' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cge_contenido'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cge_tipo'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cge_seccion'     => new sfWidgetFormFilterInput(),
      'gra_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('gra'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'cge_codigo'      => new sfValidatorPass(array('required' => false)),
      'cge_fecha_envio' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'cge_contenido'   => new sfValidatorPass(array('required' => false)),
      'cge_tipo'        => new sfValidatorPass(array('required' => false)),
      'cge_seccion'     => new sfValidatorPass(array('required' => false)),
      'gra_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('gra'), 'column' => 'gra_id')),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('emdi_com_general_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiComGeneral';
  }

  public function getFields()
  {
    return array(
      'cge_id'          => 'Number',
      'cge_codigo'      => 'Text',
      'cge_fecha_envio' => 'Date',
      'cge_contenido'   => 'Text',
      'cge_tipo'        => 'Text',
      'cge_seccion'     => 'Text',
      'gra_id'          => 'ForeignKey',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
