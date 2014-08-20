<?php

/**
 * libretas actions.
 *
 * @package    emdi
 * @subpackage libretas
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class libretasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	public function executeIndex(sfWebRequest $request)
	{

		if($this->getUser()->hasCredential('admin')) {
		
			$this->grados = Doctrine::getTable('emdiGrado')
			->createQuery('a')
			->execute();
		}
  	}
  
  	/**
  	 * Recibe el request de listado de grados para mostrar alumnos del
  	 * grado respectivo.
  	 * @param sfWebRequest $request
  	 */
  	public function executeExportarAlumnos(sfWebRequest $request)
  	{
  		 
  		$gra_id = $request->getParameter('gra');
  	
  		if($this->getUser()->hasCredential('admin')) {
  	
  			$this->estudiantes = Doctrine::getTable('emdiEstudiante')
  			->createQuery('a')
  			->where('a.gra_id = ?', $gra_id)
  			->orderby('a.est_nombres ASC')
  			->execute();
			
			//$this->grado = $gra_id;
			
  			$this->setTemplate('estudiantes');
  		}
  	
  	}
  	
  public function executeExportar(sfWebRequest $request)
  {

  	$est_id = $request->getParameter('est');
//   	$est_id = 1;
  	
  	$this->estudiante = Doctrine::getTable('emdiEstudiante')
  	->createQuery('e')
  	->where('e.est_id = ?', $est_id)
  	->fetchOne();
  	
  	$this->materias = Doctrine::getTable('emdiMateriaXGrado')
  	->createQuery('g')
  	->where('g.gra_id = ?', $this->estudiante->getGraId())
  	->execute();
  	
  	$this->setLayout(false);

  	$nombreGrado = $this->estudiante->getGra()->__toString();
  	$nombreEstudiante = $this->estudiante->__toString();
  	
  	$this->getResponse()->setContentType('application/msexcel; charset=utf-8');
  	$this->getResponse()->setHttpHeader('content-disposition: ', 
  			'attachment; filename="'.$nombreGrado." - ".$nombreEstudiante.'.xls"', 
  			true);
  	
  	
  	
//   	$this->getResponse()->setContentType('application/vnd.ms-excel; charset=iso-8859-1');

//   	  	$this->getResponse()->setContentType('application/msexcel');
// //   	$this->getResponse()->setContentType('application/msexcel; charset=utf-8');
// //   	$this->getResponse()->setContentType('application/vnd.oasis.opendocument.spreadsheet');
//   	$this->getResponse()->addHttpMeta('content-disposition: ', 'attachment; filename="nads.xls"', true);
  	$this->setTemplate('export');
  	
  }
}
