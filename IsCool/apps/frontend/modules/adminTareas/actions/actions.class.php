<?php

/**
 * adminTareas actions.
 *
 * @package    emdi
 * @subpackage adminTareas
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminTareasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

    // Conseguir listado de materias por profesor
	if($this->getUser()->hasCredential('profesor')) {
	  
        $id_profesor = $request->getParameter('pro');
    	
    	$this->materias = Doctrine::getTable('emdiMateriaXGrado')
                        	->createQuery('g')
                        	->where('g.pro_id = ?', $id_profesor)
                        	->execute();    
	}
	
	// Conseguir listado de todas las materias
	if($this->getUser()->hasCredential('admin')) {
	  $this->materias = Doctrine::getTable('emdiMateriaXGrado')
	  ->createQuery('g')
	  ->execute();
	}
  }
  
  public function executeIngresarTarea(sfWebRequest $request){

    $resultado = "";
    $this->mxg_id = $request->getParameter('mxg');
    
    $this->form = new emdiTareaForm();
    $this->form->setDefault('mxg_id', $this->mxg_id);
    //$this->emdi_materia_x_grado = $this->form->getObject();

    // Extrae info de grado
    $this->materia_grado = Doctrine::getTable('emdiMateriaXGrado')
                  ->findOneBy('mxg_id', $this->mxg_id);
    
    // Extraer info para partial
    $this->tareas = Doctrine::getTable('emdiTarea')
                    ->createQuery('u')
                    ->where('u.mxg_id = ?', $this->mxg_id)
                    ->orderBy('u.tar_fecha_envio DESC')
                    ->fetchArray();
   
    if($request->isMethod('POST')){
      
      $envio = $request->getParameter("tar_fecha_envio");
      $entrega = $request->getParameter("tar_fecha_entrega");
      
      $fecha_envio = $envio['year']."-".$envio['month']."-".$envio['day'];
      $fecha_entrega = $entrega['year']."-".$entrega['month']."-".$entrega['day'];      
      
      $peticion['tar_fecha_envio'] = $fecha_envio;
      $peticion['tar_fecha_entrega'] = $fecha_entrega;
      $peticion['tar_contenido'] = $request->getParameter('tar_contenido');
      $peticion['mxg_id'] = $request->getParameter('mxg_id');
      
      $resultado = emdiTarea::ingresarTarea($peticion);
      $this->getUser()->setFlash($resultado['tipo'], $resultado['mensaje']);
    } 
    
    $this->resultado = $resultado;

  }
  
  public function executeMostrar(sfWebRequest $request)
  {
    
    $mxg_id = $request->getParameter('mxg_id');
    
    $tareas = Doctrine::getTable('emdiTarea')
          ->createQuery('u')
          ->where('u.mxg_id = ?', $mxg_id)
          ->orderBy('u.tar_fecha_envio DESC')
          ->fetchArray();
  
    return $this->renderPartial('partial_items', array('tareas' => $tareas, 'mxg_id' => $mxg_id));
  }
  
  public function executeBorrar(sfWebRequest $request)
  {
    $tar_id = $request->getParameter('tar_id');
    $mxg_id = $request->getParameter('mxg_id');
  
    $delete_cabecera = Doctrine_Query::create()
          ->delete()
          ->from('emdiTarea u')
          ->where('u.tar_id= ?', $tar_id)
          ->execute();
        
          $tareas = Doctrine::getTable('emdiTarea')
          ->createQuery('u')
          ->where('u.mxg_id = ?', $mxg_id)
          ->orderBy('u.tar_fecha_envio DESC')
          ->fetchArray();
  
    return $this->renderPartial('partial_items', array('tareas' => $tareas, 'mxg_id' => $mxg_id));
  }
  
}


