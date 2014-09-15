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

    // Fecha de hoy
    $this->fecha = date('Y-m-d', time());
    
    $est_id = $this->getUser()->getAttribute('id_estudiante');
    
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
     
    $this->enviados = Doctrine::getTable('emdiComRepresentante')
                        ->createQuery('e')
                        ->where('e.est_id = ?', $est_id)
                        ->andWhere('date(e.created_at) = ?', $this->fecha)
                        ->execute();
  }
  
  public function executeEnviarComunicado(sfWebRequest $request)
  {
   
    if($request->isMethod('POST')){

      $est_id = $request->getParameter('est');
      
      /*
      $est_id_sesion = $this->getUser()->getAttribute('id_estudiante');
      
      if($est_id_sesion != $est_id){
        ;// enviar email al Willy
      }
      */
      
      $comunicado = $request->getParameter('com_gen');
      
      $peticion['est_id'] = $est_id;
      $peticion['mre_contenido'] = $comunicado;
    
      $resultado = emdiComRepresentante::ingresarComunicado($peticion);
      $this->getUser()->setFlash($resultado['tipo'], $resultado['mensaje']);
    }
    
    
    $this->enviados = Doctrine::getTable('emdiComRepresentante')
                        ->createQuery('e')
                        ->where('e.est_id = ?', $est_id)
                        ->andWhere('date(e.created_at) = ?', $fecha)
                        ->execute();
     
    return $this->renderPartial('partial_enviados', array('enviados' => $this->enviados));
  }
  
  public function executeCambiarFecha(sfWebRequest $request)
  {
  
    $this->fecha = $request->getParameter('fecha');
    
    $est_id = $this->getUser()->getAttribute('id_estudiante');
    
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
     
    $this->enviados = Doctrine::getTable('emdiComRepresentante')
                        ->createQuery('e')
                        ->where('e.est_id = ?', $est_id)
                        ->andWhere('date(e.created_at) = ?', $this->fecha)
                        ->execute();
     
    return $this->renderPartial('partial_agenda', 
                            array(
                                'tareas' => $this->tareas,
                                'comunicados' => $this->comunicados, // consolidar generales y profesor
                                'enviados' => $this->enviados
                            ));
  }
  
}
