<?php

/**
 * emdiComRepresentante
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class emdiComRepresentante extends BaseemdiComRepresentante
{

  /**
   * Funcion para ingresar un comunicado via AJAX
   * @param unknown $entrada
   * @return multitype:string
   */
  public static function ingresarComunicado($entrada){

    if(isset ($entrada['est_id'])) {
      $est_id = $entrada['est_id'];
    } else {
      $error = "No se ha definido un estudiante";
      return array('tipo' => 'error', 'mensaje' => $error);
    }
  
  
    if(isset ($entrada['mre_contenido'])) {
      $mre_contenido = $entrada['mre_contenido'];
    } else {
      $error =  "No se ha definido un contenido";
      return array('tipo' => 'error', 'mensaje' => $error);
    }
  
    $comunicado = new emdiComRepresentante();
    $comunicado->setMreContenido($mre_contenido);
    $comunicado->setEstId($est_id);
    //$comunicado->setMreEstado();

    $comunicado->save();
  
    return array('tipo' => 'notice', 'mensaje' => 'Su nota fue enviada exitosamente.');
  }
  
  public static function moderarComunicado($entrada){
    
    $estado = 1;
    
    if(isset ($entrada['mre_id'])) {
      $mre_id = $entrada['mre_id'];
    } else {
      $error = "No se ha definido un mensaje";
      return array('tipo' => 'error', 'mensaje' => $error);
    }
  
    if(isset ($entrada['pro_id'])) {
      $pro_id = $entrada['pro_id'];
    } else {
      $error =  "No se ha definido un profesor";
      return array('tipo' => 'error', 'mensaje' => $error);
    }
    
    // Actualizar data
    $table = Doctrine::getTable('emdiComRepresentante');
    $table->createQuery('t')
          ->update()
          ->set('t.pro_id', $pro_id)
          ->set('t.mre_estado', $estado)
          ->where('t.mre_id = ?', $mre_id)
          ->execute();
  
    return array('tipo' => 'notice', 'mensaje' => 'El mensaje fue asignado exitosamente.');
  }
}