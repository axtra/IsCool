<?php

/**
 * adminComunicados actions.
 *
 * @package    emdi
 * @subpackage adminComunicados
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminComunicadosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // Comunicados Indivuales - Template index 
    if($this->getUser()->hasCredential('profesor')) {
        $id_profesor = $request->getParameter('pro');
    	
    	$this->materias = Doctrine::getTable('emdiMateriaXGrado')
                        	->createQuery('g')
                        	->where('g.pro_id = ?', $id_profesor)
                        	->execute();
    	
    	$this->comunicados = Doctrine::getTable('emdiComProfesor')
                          	->createQuery('u')
                          	->where('u.pro_id = ?', $id_profesor)
                          	->orderBy('u.created_at DESC')
                          	->execute();
    	
    	$this->comunicados_rep = Doctrine::getTable('emdiComRepresentante')
                          	->createQuery('u')
                          	->where('u.pro_id = ?', $id_profesor)
                          	->orderBy('u.created_at DESC')
                          	->execute();
    	
    	$this->estudiantes = array();
    	$this->pro = $id_profesor;
    }
    
    // Comunicados Generales - Template index
    if($this->getUser()->hasCredential('admin')) {
      
        // Buscar mas adelante que este codigo de profesor no este quemado
        // Se utiliza pro_id = 1 de la tabla emdi_profesor para identificar
        // cuando un comunicado proviene de la parte administrativa.
        $id_profesor = 1;
    
    	$this->materias = Doctrine::getTable('emdiGrado')
                        	->createQuery('g')
                        	->execute();
    	
    	$this->comunicados = Doctrine::getTable('emdiComProfesor')
                        	->createQuery('u')
                        	->where('u.pro_id = ?', $id_profesor)
                        	->orderBy('u.created_at DESC')
                        	->execute();
    	
    	$this->comunicados_gen = Doctrine::getTable('emdiComGeneral')
                        	->createQuery('u')
                        	->orderBy('u.created_at DESC')
                        	->execute();
    	

        $this->setTemplate('general');
    }
 
  }
  
  public function executeMostrarEstudiantes(sfWebRequest $request){
  
    $this->gra_id = $request->getParameter('gra');
  
    // Extraer info para partial
    $this->estudiantes = Doctrine::getTable('emdiEstudiante')
                    ->createQuery('u')
                    ->where('u.gra_id = ?', $this->gra_id)
                    ->orderBy('u.est_apellidos ASC')
                    ->fetchArray();
     
    return $this->renderPartial('partial_estudiantes', array('estudiantes' => $this->estudiantes));
  }
  
  
  public function executeMostrarPlantillas(sfWebRequest $request){
    
    // Extraer info para partial
    $this->plantillas = Doctrine::getTable('emdiPlantilla')
    ->createQuery('u')
    ->fetchArray();
     
    return $this->renderPartial('partial_plantillas', array('plantillas' => $this->plantillas));
  }
  
  public function executeEnviarComunicado(sfWebRequest $request){
    
    $id_profesor = $request->getParameter('pro');

        
    if($request->isMethod('POST')){
      
      $cpr_referencia = $request->getParameter("ref");
      $est_id = $request->getParameter("est_id");
      $cpr_contenido = $request->getParameter("msg");
      
      $peticion['cpr_referencia'] = $cpr_referencia;
      $peticion['est_id'] = $est_id;
      $peticion['cpr_contenido'] = $cpr_contenido;
      $peticion['pro_id'] = $id_profesor;
      
      
      $resultado = emdiComProfesor::ingresarComunicado($peticion);
      $this->getUser()->setFlash($resultado['tipo'], $resultado['mensaje']);
    } 
    
    $this->comunicados = Doctrine::getTable('emdiComProfesor')
                          ->createQuery('u')
                          ->where('u.pro_id = ?', $id_profesor)
                          ->orderBy('u.created_at DESC')
                          ->execute();
     
    return $this->renderPartial('partial_comunicados', array('comunicados' => $this->comunicados));  
  }
  
  public function executeEnviarComunicadoGeneral(sfWebRequest $request){
    
    if($request->isMethod('POST')){
    
      $cge_referencia = $request->getParameter("ref_gen");
      $cge_contenido = $request->getParameter("com_gen");
      $grados = explode ( ',', $request->getParameter("grados"));
    
      $comunicado['cge_referencia'] = $cge_referencia;
      $comunicado['cge_contenido'] = $cge_contenido;
      $comunicado['grados_id'] = $grados;
        
      $resultado = emdiComGeneral::ingresarComunicado($comunicado);
      $this->getUser()->setFlash($resultado['tipo'], $resultado['mensaje']);
    }
    
  	$this->comunicados_gen = Doctrine::getTable('emdiComGeneral')
                      	->createQuery('u')
                      	->orderBy('u.created_at DESC')
                      	->execute();
    
    return $this->renderPartial('partial_comunicados_gen', array('comunicados_gen' => $this->comunicados_gen));
  }
  
  public function executeRenderFlashes(sfWebRequest $request){
    
    return $this->renderPartial('partial_flashes', array('sf_user' => $this->getUser()));
  }
  
}
