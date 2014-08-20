<?php

/**
 * Project form base class.
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {

    // Agregar un Formatter a todos los campos de la aplicacion
    $GeneralDecorator = new sfWidgetFormSchemaFormatterSinErrores($this->getWidgetSchema());
    $this->getWidgetSchema()->addFormFormatter('SinErrores', $GeneralDecorator);
    $this->getWidgetSchema()->setFormFormatterName('SinErrores');
    
  }
}
