<?php

/**
 * emdiMateriaXGrado form.
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class emdiMateriaXGradoForm extends BaseemdiMateriaXGradoForm
{
  public function configure()
  {
      $this->widgetSchema['gra_id'] = new sfWidgetFormInputHidden();

  }
  
  public function setup()
  {
    parent::setup();
    $this->widgetSchema->setNameFormat('%s');
  }

}
