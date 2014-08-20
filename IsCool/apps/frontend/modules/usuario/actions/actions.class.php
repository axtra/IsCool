<?php

/**
 * usuario actions.
 *
 * @package    emdi
 * @subpackage usuario
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        // Datos para Administrador
        if ($this->getUser()->hasCredential('admin')) {

            $this->datos_usuario = Doctrine::getTable('sfGuardUser')
                    ->createQuery('u')
                    ->where('u.is_super_admin = ?', true)
                    ->fetchOne();

        // Datos para Profesores
        } elseif ($this->getUser()->hasCredential('profesor')) {
            $this->datos_usuario = Doctrine::getTable('emdiProfesor')
                    ->createQuery('u')
                    ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();
            
        //Datos para estudiantes
        } else {
            $this->datos_usuario = Doctrine::getTable('emdiEstudiante')
                    ->createQuery('u')
                    ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();

            $this->grado = Doctrine::getTable('emdiGrado')
                    ->createQuery('g')
                    ->where('g.gra_id = ?', $this->datos_usuario->getGraId())
                    ->fetchOne();
        }
    }

    public function executeActualizar(sfWebRequest $request) {
        // Administrador
        if ($this->getUser()->hasCredential('admin')) {

            $this->datos_usuario = Doctrine::getTable('sfGuardUser')
                    ->createQuery('u')
                    ->where('u.is_super_admin = ?', true)
                    ->fetchOne();
            
            $this->form = new sfGuardUserForm($this->datos_usuario);

        // Profesores
        } elseif ($this->getUser()->hasCredential('profesor')) {
            $this->datos_usuario = Doctrine::getTable('emdiProfesor')
                    ->createQuery('u')
                    ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();

            $this->form = new emdiActualizarProfesorForm($this->datos_usuario);

        // Estudiantes
        } else {
            $this->datos_usuario = Doctrine::getTable('emdiEstudiante')
                    ->createQuery('u')
                    ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();

            $this->grado = Doctrine::getTable('emdiGrado')
                    ->createQuery('g')
                    ->where('g.gra_id = ?', $this->datos_usuario->getGraId())
                    ->fetchOne();

            $this->form = new emdiActualizarEstudianteForm($this->datos_usuario);
        }
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($sf_guard_user = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));

        // Administrador
        if ($this->getUser()->hasCredential('admin')) {

            
            // Profesores
        } elseif ($this->getUser()->hasCredential('profesor')) {
            $this->datos_usuario = Doctrine::getTable('emdiProfesor')
                    ->createQuery('u')
                    ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();
            
            $this->form = new emdiActualizarProfesorForm($this->datos_usuario);
            $this->processForm($request, $this->form);
            $this->setTemplate('actualizar');

            // Estudiantes
        } else {
            $this->datos_usuario = Doctrine::getTable('emdiEstudiante')
                    ->createQuery('u')
                    ->where('u.sf_guard_user_id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();
            
            $this->grado = Doctrine::getTable('emdiGrado')
                    ->createQuery('g')
                    ->where('g.gra_id = ?', $this->datos_usuario->getGraId())
                    ->fetchOne();
            
            $this->form = new emdiActualizarEstudianteForm($this->datos_usuario);
            $this->processForm($request, $this->form);
            $this->setTemplate('actualizar');
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        
        if ($form->isValid()) {
            $estudiante = $form->save();

            $this->redirect('usuario/index');
        }
    }

    public function executePassword(sfWebRequest $request) {

        $this->sf_guard_user = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id')));
        $this->form = new emdiActualizarPasswordForm($this->datos_usuario);
    }

    public function executeUpdatePassword(sfWebRequest $request) {
            $this->datos_usuario = Doctrine::getTable('sfGuarduser')
                    ->createQuery('u')
                    ->where('u.id = ?', $this->getUser()->getGuardUser()->getId())
                    ->fetchOne();
            
            $this->form = new emdiActualizarPasswordForm($this->datos_usuario);
            $this->processUpdate($request, $this->form);
            $this->setTemplate('password');

    }

    protected function processUpdate(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        
        if ($form->isValid()) {
            $estudiante = $form->save();

            $this->redirect('usuario/index');
        }
    }


}
