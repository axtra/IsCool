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



        // Profesores
        } elseif ($this->getUser()->hasCredential('profesor')) {
            $datos_usuario = Doctrine::getTable('emdiProfesor')
                    ->createQuery('u')
                    ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();
            
            $this->getUser()->setAttribute('id_profesor', $datos_usuario->getProId());
            


        // Estudiantes
        } else {
            $datos_usuario = Doctrine::getTable('emdiEstudiante')
                    ->createQuery('u')
                    ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();
            
            $this->getUser()->setAttribute('id_estudiante', $datos_usuario->getEstId());
        }
  }
}
