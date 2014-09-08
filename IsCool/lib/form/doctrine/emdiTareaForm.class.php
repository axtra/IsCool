<?php

/**
 * emdiTarea form.
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class emdiTareaForm extends BaseemdiTareaForm
{
  public function configure()
  {

    unset(
        $this['created_at'],
        $this['updated_at']
    );
    
    $this->widgetSchema['tar_fecha_envio'] = new sfWidgetFormJQueryDate(array(
        'image' => '/images/calendar.png',
        'config' => '{minDate: 0, maxDate: "+3M"}',
        'culture' => 'es',
        'date_widget' => new sfWidgetFormDate(array('format' => '%year%-%month%-%day%'))
    ));
    
    $this->widgetSchema['tar_fecha_entrega'] = new sfWidgetFormJQueryDate(array(
        'image' => '/images/calendar.png',
        'config' => '{minDate: +1, maxDate: "+3M"}',
        'culture' => 'es',
        'date_widget' => new sfWidgetFormDate(array('format' => '%year%-%month%-%day%'))
    ));
    
    $this->widgetSchema['tar_contenido'] = new sfWidgetFormTextarea(
        array(),
        array('cols' => '80', 'rows' => '6', 'maxlength' => '300')
    );
    
    $this->widgetSchema->setLabels(array(
        'tar_fecha_envio' => 'Fecha de Envío',
        'tar_fecha_entrega' => 'Fecha de Entrega',
        'tar_contenido' => 'Tarea'
    ));
    
    $this->widgetSchema['mxg_id'] = new sfWidgetFormInputHidden();
    
/*
 * TODO:
 * ***************************
 *  EMBEDEED FORM CHECK!
      $subForm = new sfForm();
      for ($i = 0; $i < 2; $i++)
      {
      $productPhoto = new ProductPhoto();
      $productPhoto->Product = $this->getObject();
      
      $form = new ProductPhotoForm($productPhoto);
      
      $subForm->embedForm($i, $form);
      }
      $this->embedForm('newPhotos', $subForm);
*/
  }
  

  public function setup()
  {
    parent::setup();
    $this->widgetSchema->setNameFormat('%s');
  }
}
