<?php

/**
 * asignarmaterias module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage asignarmaterias
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAsignarmateriasGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
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
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%mxg_id%% - %%gra_id%% - %%mat_id%% - %%pro_id%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Asignarmaterias List';
  }

  public function getEditTitle()
  {
    return 'Editando Grado %%gra_nombre%%';
  }

  public function getNewTitle()
  {
    return 'Asignando materias al Grado %%gra_id%%';
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
    return array(  0 => 'mxg_id',  1 => 'gra_id',  2 => 'mat_id',  3 => 'pro_id',);
  }

  public function getFieldsDefault()
  {
    return array(
      'mxg_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'gra_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Grado',),
      'mat_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Materia',),
      'pro_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Profesor',  'help' => 'Profesor que dicta la materia',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'mxg_id' => array(),
      'gra_id' => array(),
      'mat_id' => array(),
      'pro_id' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'mxg_id' => array(),
      'gra_id' => array(),
      'mat_id' => array(),
      'pro_id' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'mxg_id' => array(),
      'gra_id' => array(),
      'mat_id' => array(),
      'pro_id' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'mxg_id' => array(),
      'gra_id' => array(),
      'mat_id' => array(),
      'pro_id' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'mxg_id' => array(),
      'gra_id' => array(),
      'mat_id' => array(),
      'pro_id' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'emdiMateriaXGradoForm';
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
    return 'emdiMateriaXGradoFormFilter';
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
