<?php

/**
 * Permite al tutor de un grado ver las notas de loss estudiantes de dicho grado.
 *
 * @package    emdi
 * @subpackage tutoria
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tutoriaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	
    $gra_id = $request->getParameter('gra');
    
	$this->estudiantes = Doctrine::getTable('emdiEstudiante')
	    ->createQuery('a')
	    ->where('a.gra_id = ?', $gra_id)
	    ->orderby('a.est_nombres ASC')
	    ->execute();
    
  }
  
  
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeNotasEstudiante(sfWebRequest $request)
  {

	  $est_id = $request->getParameter('est');
	  
	  $this->estudiante = Doctrine::getTable('emdiEstudiante')
		  ->createQuery('e')
		  ->where('e.est_id = ?', $est_id)
		  ->fetchOne();
	  
	  $this->materias = Doctrine::getTable('emdiMateriaXGrado')
		  ->createQuery('g')
		  ->where('g.gra_id = ?', $this->estudiante->getGraId())
		  ->execute();

  }
}
