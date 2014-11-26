<?php

/**
 * portal actions. Modulo al cual entra primero una vez autenticado con sfGuardUser.
 * Aqui se cargan las variables de sesion.
 *
 * @package    emdi
 * @subpackage portal
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class portalActions extends sfActions
{
 /**
  * Asignacion de Variables de Sesion
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
        // Administrador
        if ($this->getUser()->hasCredential('admin')) {

          
        } else {

            // Profesores
            if ($this->getUser()->hasCredential('profesor')) {
              $datos_usuario = Doctrine::getTable('emdiProfesor')
              ->createQuery('u')
              ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
              ->fetchOne();
            
              $grado_tutoreado = Doctrine::getTable('emdiGrado')
              ->createQuery('g')
              ->where('g.pro_id = ?', $datos_usuario->getProId())
              ->fetchOne();
            
            
              $this->getUser()->setAttribute('id_profesor', $datos_usuario->getProId());
            
            
              // Saca el Id del Grado solo si el profesor es tutor
              if($grado_tutoreado) {
                $grado_tutoreado = $grado_tutoreado->getGraId();
              }
            
              $this->getUser()->setAttribute('grado_tutoreado', $grado_tutoreado);
            }
            
            
            
            //         // Estudiantes
            if  ($this->getUser()->hasCredential('estudiante')) {
            
                $datos_usuario = Doctrine::getTable('emdiEstudiante')
                              ->createQuery('u')
                              ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                              ->fetchOne();
    
                $this->getUser()->setAttribute('id_estudiante', $datos_usuario->getEstId());
            }
            
            // Administrativo
            if  ($this->getUser()->hasCredential('administrativo') || $this->getUser()->hasCredential('moderador') ) {
              $datos_usuario = Doctrine::getTable('emdiProfesor')
                              ->createQuery('u')
                              ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                              ->fetchOne();
              
              $this->getUser()->setAttribute('id_profesor', $datos_usuario->getProId());
              
            }
        }

  }
}
