<?php

/**
 * ingresonotas actions.
 *
 * @package    emdi
 * @subpackage ingresonotas
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ingresonotasActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

    if($this->getUser()->hasCredential('profesor')) {
        $profesor_id = $this->getUser()->getAttribute('id_profesor');
        $this->grados = Doctrine::getTable('emdiMateriaXGrado')
                        ->createQuery('g')
                        ->where('g.pro_id = ?', $profesor_id)
                        ->execute();

        $this->notas_parciales = Doctrine_Query::create()->  // Sacando una fila desde un dato
                                      from('emdiAdministracion a')->
                                      where('a.adm_id = ?', array('1'))->
                                      fetchArray();
    }
    
    if($this->getUser()->hasCredential('admin')) {
        
        $this->grados = Doctrine::getTable('emdiMateriaXGrado')
                    ->createQuery('a')
                    ->execute();

        $this->notas_parciales = Doctrine_Query::create()->  // Sacando una fila desde un dato
                                      from('emdiAdministracion a')->
                                      where('a.adm_id = ?', array('1'))->
                                      fetchArray();
    }
    
  }

  public function executeIngresar(sfWebRequest $request)
  {
      $mat_id = $request->getParameter('mat');
      $gra_id = $request->getParameter('gra');
      
      $this->materia = Doctrine::getTable('emdiMateria')
                        ->createQuery('m')
                        ->where('m.mat_id = ?', $mat_id)
                        ->fetchOne();
      
      $this->estudiantes = Doctrine::getTable('emdiEstudiante')
                        ->createQuery('e')
                        ->where('e.gra_id = ?', $gra_id)
                        ->orderby('e.est_apellidos ASC')
                        ->execute();
      
      if ( $this->getUser()->hasCredential('admin') ) {
          
      } else {

          $this->profesor = Doctrine::getTable('emdiProfesor')
                        ->createQuery('p')
                        ->where('p.pro_id = ?', $this->getUser()->getAttribute('id_profesor'))
                        ->fetchOne();
      }
      
      $this->grado = Doctrine::getTable('emdiGrado')
                        ->createQuery('g')
                        ->where('g.gra_id = ?', $gra_id)
                        ->fetchOne();
   
    $notas_parciales = Doctrine_Query::create()->  // Sacando una fila desde un dato
                                  from('emdiAdministracion a')->
                                  where('a.adm_id = ?', array('1'))->
                                  fetchArray();

    $this->notas_habilitadas = array();

    for($i = 1, $j = 0; $i <= 12; $i++, $j++) {
        if ($notas_parciales[0]['adm_habilitar_nota'.$i] == 1) {
            $this->notas_habilitadas[$j] = $i;
        }
    }
    
    $this->mat_id = $request->getParameter('mat');
    $this->gra_id = $request->getParameter('gra');
  }
  
  public function executeProcesar(sfWebRequest $request)
  {
  	
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    // Procesar y validar campos   
    $inputnames = $request->getParameter('notainput');
    
    foreach ($inputnames as $inputs => $nota_estudiante) {
        
        //$location_of_character = strrpos($inputs, "-");
        $codigos_notas = explode ("-", $inputs);
    
        $id_estudiante = $codigos_notas[0];
        $codigo_parcial = $codigos_notas[1];
        
        $emdi_nota = new emdiNota;
        
        $emdi_nota->not_codigo_parcial = $codigo_parcial;
        
        // Por default la nota sera 0 si no se ingresa por formulario
        $nota_estudiante = ($nota_estudiante == '') ? 0 : $nota_estudiante;
        $emdi_nota->not_nota = $nota_estudiante;
        
        $emdi_nota->mat_id = $request->getParameter('mat');
        $emdi_nota->pro_id = $this->getUser()->getAttribute('id_profesor');
        $emdi_nota->est_id = $id_estudiante;
        
        $emdi_nota->save();
    }
    
      $mat_id = $request->getParameter('mat');
      $gra_id = $request->getParameter('gra');
    
    $this->executeNotas($mat_id, $gra_id);

  }
  
  protected function executeNotas($mat_id, $gra_id)
  {
      
    $this->getUser()->setFlash('notice', 'Se ha guardado existosamente');
      
      $this->materia = Doctrine::getTable('emdiMateria')
                        ->createQuery('m')
                        ->where('m.mat_id = ?', $mat_id)
                        ->fetchOne();
      
      $this->estudiantes = Doctrine::getTable('emdiEstudiante')
                        ->createQuery('e')
                        ->where('e.gra_id = ?', $gra_id)
                        ->orderby('e.est_apellidos ASC')
                        ->execute();
      
      $this->profesor = Doctrine::getTable('emdiProfesor')
                        ->createQuery('p')
                        ->where('p.pro_id = ?', $this->getUser()->getAttribute('id_profesor'))
                        ->fetchOne();
      
      $this->grado = Doctrine::getTable('emdiGrado')
                        ->createQuery('g')
                        ->where('g.gra_id = ?', $gra_id)
                        ->fetchOne();
   
      $this->mat_id = $mat_id;
      $this->gra_id = $gra_id;
      
      $this->setTemplate('notas');
  }
  
  public function executeIngresoAlumnos(sfWebRequest $request)
  {
  	
    $gra_id = $request->getParameter('gra');
    
    if($this->getUser()->hasCredential('profesor')) {
        $this->executeIndex($request);
    }
    
    if($this->getUser()->hasCredential('admin')) {
        
        $this->estudiantes = Doctrine::getTable('emdiEstudiante')
                    ->createQuery('a')
                    ->where('a.gra_id = ?', $gra_id)
                    ->orderby('a.est_apellidos ASC')
                    ->execute();
        
        $this->grado = Doctrine::getTable('emdiGrado')->findOneBy('gra_id', $gra_id);

		$this->setTemplate('grado');
    }
    
  }
  
  public function executeIngresoNotasAlumno(sfWebRequest $request)
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
