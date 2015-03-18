<?php

/**
 * moderarTareas actions.
 *
 * @package    emdi
 * @subpackage moderarTareas
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class moderarTareasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
        $this->fecha = date('Y-m-d', time());
        
    	$this->grados = Doctrine::getTable('emdiGrado')
                        	->createQuery('g')
                        	->execute();
    	
    	$this->estudiantes = array();
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
  
  /**
   * Muestra la agenda correspondiente al alumno seleccionado
   * @param sfWebRequest $request
   * @return string
   */
  public function executeMostrarAgenda(sfWebRequest $request){
    
    // Tomo parametros iniciales
    $this->fecha = date('Y-m-d', time());
    $est_id = $request->getParameter('est_id');
    
    $this->estudiante = Doctrine::getTable('emdiEstudiante')
                          ->createQuery('e')
                          ->where('e.est_id = ?', $est_id)
                          ->fetchOne();
                          
    // Saco grado del estudiante
    $gra_id = $this->estudiante->getGraId();

    $this->tareas = Doctrine::getTable('emdiTarea')
                          ->createQuery('t')
                          ->leftJoin('t.mxg c')
                          ->where('c.gra_id = ?', $gra_id)
                          ->andWhere('date(t.tar_fecha_envio) = ?', $this->fecha)
                          ->execute();
                          
    $this->comunicados = Doctrine::getTable('emdiComProfesor')
                                  ->createQuery('c')
                                  ->where('c.est_id = ?', $est_id)
                                  ->andWhere('date(c.created_at) = ?', $this->fecha)
                                  ->execute();
                                  
    $this->comunicados_gen = Doctrine::getTable('emdiComXGrado')
                                    ->createQuery('t')
                                    ->leftJoin('t.cge c')
                                    ->where('t.gra_id = ?', $gra_id)
                                    ->andWhere('date(c.created_at) = ?', $this->fecha)
                                    ->execute();
    
    return $this->renderPartial(
                  'partial_agenda', 
                  array(
                      'tareas' => $this->tareas,
                      'comunicados' => $this->comunicados,
                      'comunicados_gen' => $this->comunicados_gen,
                      'estudiante' => $this->estudiante
                  )
            );
  }
  
  /**
   * Cambia la fecha de visualizacion de la agenda
   * @param sfWebRequest $request
   * @return string
   */
  public function executeCambiarFecha(sfWebRequest $request)
  {

    // Tomo parametros iniciales
    $this->fecha = $request->getParameter('fecha');
    $est_id = $request->getParameter('est_id');
    
    $this->estudiante = Doctrine::getTable('emdiEstudiante')
                              ->createQuery('e')
                              ->where('e.est_id = ?', $est_id)
                              ->fetchOne();
    
    // Saco grado del estudiante
    $gra_id = $this->estudiante->getGraId();
    
    $this->tareas = Doctrine::getTable('emdiTarea')
                                    ->createQuery('t')
                                    ->leftJoin('t.mxg c')
                                    ->where('c.gra_id = ?', $gra_id)
                                    ->andWhere('date(t.tar_fecha_envio) = ?', $this->fecha)
                                    ->execute();
      
    $this->comunicados = Doctrine::getTable('emdiComProfesor')
                                    ->createQuery('c')
                                    ->where('c.est_id = ?', $est_id)
                                    ->andWhere('date(c.created_at) = ?', $this->fecha)
                                    ->execute();
    
    $this->comunicados_gen = Doctrine::getTable('emdiComXGrado')
                                    ->createQuery('t')
                                    ->leftJoin('t.cge c')
                                    ->where('t.gra_id = ?', $gra_id)
                                    ->andWhere('date(c.created_at) = ?', $this->fecha)
                                    ->execute();
    
    return $this->renderPartial(
                                'partial_agenda',
                                array(
                                    'tareas' => $this->tareas,
                                    'comunicados' => $this->comunicados,
                                    'comunicados_gen' => $this->comunicados_gen,
                                    'estudiante' => $this->estudiante
                                    )
                                );
  }
  
  

}
