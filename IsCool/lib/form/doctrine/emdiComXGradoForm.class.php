<?php

/**
 * emdiComXGrado form.
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class emdiComXGradoForm extends BaseemdiComXGradoForm
{
  public function configure()
  {
    
    parent::configure();
    
    
    $this->widgetSchema['gra_id']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
    

//     $this->embedRelation('cge');
    unset(
        $this['cge_id']
    );
    
    
    $comunicado_object = $this->getObject()->getCge();
    $this->embedForm('foto_form', new emdiComGeneralForm($comunicado_object));
        

  }
}
