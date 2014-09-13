<?php

/**
 * emdiComGeneral form.
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class emdiComGeneralForm extends BaseemdiComGeneralForm
{
  public function configure()
  {
    // lib/form/doctrine/ProductForm.class.php
//       $subForm = new sfForm();

//         $productPhoto = new emdiComXGrado();
//         $productPhoto->cge = $this->getObject();
    
//         $form = new emdiComXGradoForm($productPhoto);
    

//       $this->embedForm('cge', $form); 
      

        unset(
          $this['created_at'],
          $this['updated_at']
        );
  }
}
