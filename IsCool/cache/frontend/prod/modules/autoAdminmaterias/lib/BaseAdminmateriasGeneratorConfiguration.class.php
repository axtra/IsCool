<?php

/**
 * adminmaterias module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage adminmaterias
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdminmateriasGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  '_new' =>   array(    'label' => 'Ingresar Nuevo Materia',  ),);
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' =>   array(    'label' => 'Ingresar Nuevo Materia',  ),);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%mat_id%% - %%mat_nombre%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Administración de Materias';
  }

  public function getEditTitle()
  {
    return 'Editando Materia %%mat_nombre%%';
  }

  public function getNewTitle()
  {
    return 'Ingresando nuevo Materia';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'mat_id',  1 => 'mat_nombre',);
  }

  public function getFieldsDefault()
  {
    return array(
      'mat_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'ID',),
      'mat_nombre' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Nombre',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'mat_id' => array(),
      'mat_nombre' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'mat_id' => array(),
      'mat_nombre' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'mat_id' => array(),
      'mat_nombre' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'mat_id' => array(),
      'mat_nombre' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'mat_id' => array(),
      'mat_nombre' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'emdiMateriaForm';
  }

  public function hasFilterForm()
  {
    return false;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'emdiMateriaFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getTableMethod()
  {
    return '';
  }

  public function getTableCountMethod()
  {
    return '';
  }
}
