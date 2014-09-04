<?php

/**
 * adminTareas actions.
 *
 * @package    emdi
 * @subpackage adminTareas
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminTareasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $id_profesor = $request->getParameter('pro');
    
    /*
	$this->materias = Doctrine::getTable('emdiMateriaXGrado')
	    ->createQuery('a')
	    ->where('a.gra_id = ?', $gra_id)
	    ->orderby('a.est_nombres ASC')
	    ->execute();
	*/
	
	$this->materias = Doctrine_Query::create()
	->select('mxg.mxg_id, g.gra_nombre, m.mat_nombre')
	->from('emdiMateriaXGrado mxg')
	->leftJoin('mxg.gra g')
	->leftJoin('mxg.mat m')
	->where('mxg.pro_id = ?',$id_profesor)
	->execute();
	
	
	
	/*
	$est_id = $request->getParameter('est');
	 
	$this->materias = Doctrine::getTable('emdiMateriaXGrado')
	->createQuery('g')
	->where('g.gra_id = ?', $this->estudiante->getGraId())
	->execute();
	*/
    
  }
}
