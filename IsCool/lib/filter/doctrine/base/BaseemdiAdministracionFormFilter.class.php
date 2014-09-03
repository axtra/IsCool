<?php

/**
 * emdiAdministracion filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiAdministracionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'adm_habilitar_nota1'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota2'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota3'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota4'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota5'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota6'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota7'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota8'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota9'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota10' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota11' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'adm_habilitar_nota12' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'adm_habilitar_nota1'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota2'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota3'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota4'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota5'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota6'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota7'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota8'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota9'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota10' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota11' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'adm_habilitar_nota12' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('emdi_administracion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiAdministracion';
  }

  public function getFields()
  {
    return array(
      'adm_id'               => 'Number',
      'adm_habilitar_nota1'  => 'Boolean',
      'adm_habilitar_nota2'  => 'Boolean',
      'adm_habilitar_nota3'  => 'Boolean',
      'adm_habilitar_nota4'  => 'Boolean',
      'adm_habilitar_nota5'  => 'Boolean',
      'adm_habilitar_nota6'  => 'Boolean',
      'adm_habilitar_nota7'  => 'Boolean',
      'adm_habilitar_nota8'  => 'Boolean',
      'adm_habilitar_nota9'  => 'Boolean',
      'adm_habilitar_nota10' => 'Boolean',
      'adm_habilitar_nota11' => 'Boolean',
      'adm_habilitar_nota12' => 'Boolean',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
