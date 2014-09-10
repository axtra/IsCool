<?php

/**
 * emdiPlantilla form.
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class emdiPlantillaForm extends BaseemdiPlantillaForm
{
  public function configure()
  {
        // Quitar validatorSchema y widgetSchema de elementos no usados en el formulario 
        unset(
          $this['pla_id']
        );
  }
}
