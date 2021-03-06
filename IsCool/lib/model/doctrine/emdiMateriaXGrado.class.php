<?php

/**
 * emdiMateriaXGrado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    emdi
 * @subpackage model
 * @author     Bitcoder
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class emdiMateriaXGrado extends BaseemdiMateriaXGrado
{
    public function __toString(){
      return $this->getGra()->getGraNombre()." / ".$this->getMat()->getMatNombre();
    }
    
    public static function ingresarMateria($entrada) {
        
         if(isset ($entrada['gra_id'])) {
             $grado = $entrada['gra_id'];
         } else {
             return "No se ha definido un grado";
         }
         
         if(isset ($entrada['mat_id'])) {
             $materia = $entrada['mat_id'];
         } else {
             return "No se ha definido una materia";
         }
         
         if(isset ($entrada['pro_id'])) {
             $profesor = $entrada['pro_id'];
         } else {
             return "No se ha definido un profesor";
         }
         
         $materiaporgrado= new emdiMateriaXGrado();
         $materiaporgrado->setGraId($grado);
         $materiaporgrado->setMatId($materia);
         $materiaporgrado->setProId($profesor);
         $materiaporgrado->save();
         return "La asignación se realizo con exito";
    }
}