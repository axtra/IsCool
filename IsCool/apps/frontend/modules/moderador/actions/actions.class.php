<?php

/**
 * moderador actions.
 *
 * @package    emdi
 * @subpackage moderador
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class moderadorActions extends sfActions
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
    
    $this->mensajes = Doctrine::getTable('emdiComRepresentante')
                        ->createQuery('t')
                        ->where('date(t.created_at) = ?', $this->fecha)
                        ->execute();
    
    $this->profesores = Doctrine::getTable('emdiProfesor')
                        ->createQuery('t')
                        ->execute();
  }
  
  public function executeCambiarFecha(sfWebRequest $request)
  {
    // Fecha de hoy
    $this->fecha = $request->getParameter('fecha');
  
    $this->mensajes = Doctrine::getTable('emdiComRepresentante')
                      ->createQuery('t')
                      ->where('date(t.created_at) = ?', $this->fecha)
                      ->execute();
    
    $this->profesores = Doctrine::getTable('emdiProfesor')
                      ->createQuery('t')
                      ->execute();
    
    
    return $this->renderPartial('partial_mensajes', 
                                    array(
                                        'mensajes' => $this->mensajes,
                                        'profesores' => $this->profesores
                                ));
  }
  
  public function executeEnviarModeracion(sfWebRequest $request)
  {

    $this->fecha = $request->getParameter('fecha');
    
    if($request->isMethod('POST')){
  
      $mre_id = $request->getParameter('mre');
      $pro_id = $request->getParameter('pro');
  
      $peticion['mre_id'] = $mre_id;
      $peticion['pro_id'] = $pro_id;
  
      $resultado = emdiComRepresentante::moderarComunicado($peticion);
      $this->getUser()->setFlash($resultado['tipo'], $resultado['mensaje']);
    }
  
    $this->mensajes = Doctrine::getTable('emdiComRepresentante')
                        ->createQuery('t')
                        ->where('date(t.created_at) = ?', $this->fecha)
                        ->execute();
     
    $this->profesores = Doctrine::getTable('emdiProfesor')
                      ->createQuery('t')
                      ->execute();
    
    
    return $this->renderPartial('partial_mensajes', 
                                    array(
                                        'mensajes' => $this->mensajes,
                                        'profesores' => $this->profesores
                                ));
  }
}
