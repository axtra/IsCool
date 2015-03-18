<?php

/**
 * agenda actions.
 *
 * @package    emdi
 * @subpackage agenda
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class agendaActions extends sfActions
{
  
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

    // Variables usadas
    $est_id = $this->getUser()->getAttribute('id_estudiante'); //Estudiante
    $this->fecha = date('Y-m-d', time()); // Fecha actual
    
    $this->estudiante = Doctrine::getTable('emdiEstudiante')
                        ->createQuery('e')
                        ->where('e.est_id = ?', $est_id)
                        ->fetchOne();
    
    $gra_id = $this->estudiante->getGraId(); // Grado del estudiante
    
    // Tareas realizadas en la fecha actual
    $this->tareas = Doctrine::getTable('emdiTarea')
                        ->createQuery('t')
                        ->leftJoin('t.mxg c')
                        ->where('c.gra_id = ?', $gra_id)
                        ->andWhere('date(t.tar_fecha_envio) = ?', $this->fecha)
                        ->execute();
    
    // Comunicados enviados por profesores en la fecha actual
    $this->comunicados = Doctrine::getTable('emdiComProfesor')
                        ->createQuery('c')
                        ->where('c.est_id = ?', $est_id)
                        ->andWhere('date(c.created_at) = ?', $this->fecha)
                        ->execute();
    
    // Comunicados Generales a la fecha actual
    $this->comunicados_gen = Doctrine::getTable('emdiComXGrado')
                        ->createQuery('t')
                        ->leftJoin('t.cge c')
                        ->where('t.gra_id = ?', $gra_id)
                        ->andWhere('date(c.created_at) = ?', $this->fecha)
                        ->execute();
     
    // Comunicados Generales a la fecha actual
    $this->enviados = Doctrine::getTable('emdiComRepresentante')
                        ->createQuery('e')
                        ->where('e.est_id = ?', $est_id)
                        ->andWhere('date(e.created_at) = ?', $this->fecha)
                        ->execute();
    
    // Sacando estado de tareas realizadas
    $this->estados_tareas = $this->getEstadosTareas($this->tareas);
    
  }

  /**
   * Devuelve un arreglo asociado de id de tarea (tar_id)
   * con su estado 'pendiente/realizado', para la 
   * coleccion pasada. 
   * 
   * @param Doctrine_Collection $tareas
   * @return Array de estados por tarea
   */
  private function getEstadosTareas(Doctrine_Collection $tareas) {
    
    $est_id = $this->getUser()->getAttribute('id_estudiante');
    $estados_tareas = array();
  
    foreach ($tareas as $tarea) {
  
      $tar_id = $tarea->getTarId();
      $estados_tareas[$tar_id] = emdiTarea::estaRealizada($tar_id, $est_id);
    }
  
    return $estados_tareas;
  
  }
  
  public function executeEnviarComunicado(sfWebRequest $request)
  {
    
    $this->fecha = date('Y-m-d', time());
   
    if($request->isMethod('POST')){

      $est_id = $request->getParameter('est');
      // TODO: Posible control para verificar que id de estudiante
      // coincide con el recibido. Caso contrario cerrar session.
      $comunicado = $request->getParameter('com_gen');
      
      $peticion['est_id'] = $est_id;
      $peticion['mre_contenido'] = $comunicado;
    
      $resultado = emdiComRepresentante::ingresarComunicado($peticion);
      $this->getUser()->setFlash($resultado['tipo'], $resultado['mensaje']);
    }
    
    
    $this->enviados = Doctrine::getTable('emdiComRepresentante')
                        ->createQuery('e')
                        ->where('e.est_id = ?', $est_id)
                        ->andWhere('date(e.created_at) = ?', $this->fecha)
                        ->execute();
     
    return $this->renderPartial('partial_enviados', array('enviados' => $this->enviados));
  }
  
  public function executeCambiarFecha(sfWebRequest $request)
  {
  
    // Variables usadas
    $est_id = $this->getUser()->getAttribute('id_estudiante'); //Estudiante
    $this->fecha = $request->getParameter('fecha'); // Fecha actual
    
    $this->estudiante = Doctrine::getTable('emdiEstudiante')
                        ->createQuery('e')
                        ->where('e.est_id = ?', $est_id)
                        ->fetchOne();
    
    $gra_id = $this->estudiante->getGraId(); // Grado del estudiante
    
    // Tareas realizadas en la fecha actual 
    $this->tareas = Doctrine::getTable('emdiTarea')
                        ->createQuery('t')
                        ->leftJoin('t.mxg c')
                        ->where('c.gra_id = ?', $gra_id)
                        ->andWhere('date(t.tar_fecha_envio) = ?', $this->fecha)
                        ->execute();
    
    // Comunicados enviados por profesores en la fecha dada
    $this->comunicados = Doctrine::getTable('emdiComProfesor')
                        ->createQuery('c')
                        ->where('c.est_id = ?', $est_id)
                        ->andWhere('date(c.created_at) = ?', $this->fecha)
                        ->execute();
    
    // Comunicados Generales a la fecha dada
    $this->comunicados_gen = Doctrine::getTable('emdiComXGrado')
                        ->createQuery('t')
                        ->leftJoin('t.cge c')
                        ->where('t.gra_id = ?', $gra_id)
                        ->andWhere('date(c.created_at) = ?', $this->fecha)
                        ->execute();
    
    // Comunicados Generales a la fecha dada
    $this->enviados = Doctrine::getTable('emdiComRepresentante')
                        ->createQuery('e')
                        ->where('e.est_id = ?', $est_id)
                        ->andWhere('date(e.created_at) = ?', $this->fecha)
                        ->execute();
    
    // Sacando estado de tareas realizadas
    $this->estados_tareas = $this->getEstadosTareas($this->tareas);
     
    return $this->renderPartial('partial_agenda', 
                            array(
                                'tareas' => $this->tareas,
                                'comunicados' => $this->comunicados, // consolidar generales y profesor
                                'comunicados_gen' => $this->comunicados_gen,
                                'enviados' => $this->enviados,
                                'estados_tareas' => $this->estados_tareas
                            ));
  }

  public function executeCambiarEstadoTarea(sfWebRequest $request)
  {
  
    $resultado = false;
     
    if($request->isMethod('POST')){
  
      $est_id = $this->getUser()->getAttribute('id_estudiante');
      $tar_id = $request->getParameter('tar_id');
  
      // Pongo el estado en 1 como realizada.
      $resultado = emdiTarea::cambiarEstadoTarea($tar_id, $est_id, 1);

    }
     
    return $resultado;
  }
  
  public function executeGetTareasPendientes(sfWebRequest $request)
  {
    if($request->isMethod('POST')){
    
      $est_id = $this->getUser()->getAttribute('id_estudiante');

      $this->tareas_pendientes  = Doctrine::getTable('emdiTareaXEstudiante')
                        ->createQuery('t')
                        ->where('t.est_id = ?', $est_id)
                        ->andWhere('t.txe_estado = ?', 0)
                        ->execute();
    
    }
    
    return $this->renderPartial('partial_pendientes', array( 'tareas' => $this->tareas_pendientes)); 
  }

}
