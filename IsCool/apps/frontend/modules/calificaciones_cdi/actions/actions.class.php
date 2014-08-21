<?php

/**
 * calificaciones_cdi actions for Centro de Desarrollo Infantil.
 *
 * @package    emdi
 * @subpackage calificaciones_cdi
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calificaciones_cdiActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {

    $est_id = $this->getUser()->getAttribute('id_estudiante');

    $this->estudiante = Doctrine::getTable('emdiEstudiante')
                         ->createQuery('e')
                         ->where('e.est_id = ?', $est_id)
                         ->fetchOne();
    
    $this->materias = Doctrine::getTable('emdiMateriaXGrado')
                    ->createQuery('g')
                    ->where('g.gra_id = ?', $this->estudiante->getGraId())
                    ->execute();
                    //->fetchArray();    
    
//    $this->materias = array();
    
//    foreach ($materias_grado as $materia_grado) {
//        
//        $this->materias[] = $materia_grado->getGra;
//    }
    
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
                        ->execute();
      
      $this->profesor = Doctrine::getTable('emdiProfesor')
                        ->createQuery('p')
                        ->where('p.pro_id = ?', $this->getUser()->getAttribute('id_profesor'))
                        ->fetchOne();
      
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
      // $request->setParameter('gra', $value);
      // $this->redirect('ingresonotas/edit?not_id='.$emdi_nota->getNotId());
//
//      $mat_id = $request->getParameter('mat');
//      $gra_id = $request->getParameter('gra');
      
    $this->getUser()->setFlash('notice', 'Se ha guardado existosamente');
      
      $this->materia = Doctrine::getTable('emdiMateria')
                        ->createQuery('m')
                        ->where('m.mat_id = ?', $mat_id)
                        ->fetchOne();
      
      $this->estudiantes = Doctrine::getTable('emdiEstudiante')
                        ->createQuery('e')
                        ->where('e.gra_id = ?', $gra_id)
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

}
