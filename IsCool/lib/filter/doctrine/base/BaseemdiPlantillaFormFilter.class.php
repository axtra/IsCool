<?php

/**
 * emdiPlantilla filter form base class.
 *
 * @package    emdi
 * @subpackage filter
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseemdiPlantillaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pla_contenido' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'pla_contenido' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('emdi_plantilla_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'emdiPlantilla';
  }

  public function getFields()
  {
    return array(
      'pla_id'        => 'Number',
      'pla_contenido' => 'Text',
    );
  }
}
