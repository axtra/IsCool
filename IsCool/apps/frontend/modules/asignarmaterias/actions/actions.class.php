<?php

require_once dirname(__FILE__).'/../lib/asignarmateriasGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/asignarmateriasGeneratorHelper.class.php';

/**
 * asignarmaterias actions.
 *
 * @package    emdi
 * @subpackage asignarmaterias
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class asignarmateriasActions extends autoAsignarmateriasActions
{
  /**
   * Esta función únicamente extrae la información para ser desplegada
   * en el partial.
   *
   * @param sfWebRequest $request
   */
  public function executeNew(sfWebRequest $request)
  {

    $this->form = new emdiMateriaXGradoForm();
    $grado_id = $request->getParameter('id');
    $this->grado_id = $grado_id;
    //$this->form = $this->configuration->getForm();
    $this->form->setDefault('gra_id', $grado_id);    
    $this->emdi_materia_x_grado = $this->form->getObject();
    
    
    $resultado = "";

     // Extraer info para partial
    $this->materias = Doctrine::getTable('emdiMateriaXGrado')
                    ->createQuery('u')
                    ->where('u.gra_id = ?', $grado_id)
                    ->fetchArray();
    
     if($request->isMethod('post')){
           $peticion['gra_id'] = $request->getParameter('gra_id');
           $peticion['mat_id'] = $request->getParameter('mat_id');
           $peticion['pro_id'] = $request->getParameter('pro_id');
           $resultado = emdiMateriaXGrado::ingresarMateria($peticion);
           $this->getUser()->setFlash('notice', 'Materia asignada al grado.');
     }
     
    $this->resultado = $resultado;
  }

  /**
   * Esta función únicamente extrae la información para ser desplegada
   * en el partial.
   *
   * @param sfWebRequest $request
   */
  public function executeMostrar(sfWebRequest $request)
  {
     $grado_id = $request->getParameter('gra_id');
     $materias = Doctrine::getTable('emdiMateriaXGrado')
                    ->createQuery('u')
                    ->where('u.gra_id = ?', $grado_id)
                    ->fetchArray();

     return $this->renderPartial('partial_items', array('materias' => $materias, 'grado_id' => $grado_id));
  }

  /**
   * Esta función únicamente extrae la información para ser desplegada
   * en el partial.
   *
   * @param sfWebRequest $request
   */
    public function executeBorrar(sfWebRequest $request)
    {
        $mxg_id = $request->getParameter('mxg_id');
        $grado_id = $request->getParameter('gra_id');

        $delete_cabecera = Doctrine_Query::create()
                      ->delete()
                      ->from('emdiMateriaXGrado u')
                      ->where('u.mxg_id= ?', $mxg_id)
                      ->execute();

        $materias = Doctrine::getTable('emdiMateriaXGrado')
                    ->createQuery('u')
                    ->where('u.gra_id = ?', $grado_id)
                    ->fetchArray();


        return $this->renderPartial('partial_items', array('materias' => $materias, 'grado_id' => $grado_id));
    }
}
