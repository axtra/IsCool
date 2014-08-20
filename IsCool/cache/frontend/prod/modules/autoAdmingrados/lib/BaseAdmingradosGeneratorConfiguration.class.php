<?php

/**
 * admingrados module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage admingrados
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdmingradosGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  '_new' =>   array(    'label' => 'Ingresar Nuevo Grado',  ),);
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
    return array(  '_new' =>   array(    'label' => 'Ingresar Nuevo Grado',  ),);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%gra_id%% - %%gra_nombre%% - %%gra_nombre_corto%% - %%_nombres_apellidos%% - %%_asignar_materias%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Administración de Grados';
  }

  public function getEditTitle()
  {
    return 'Editando Grado %%gra_nombre%%';
  }

  public function getNewTitle()
  {
    return 'Ingresando nuevo Grado';
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
    return array(  0 => 'gra_id',  1 => 'gra_nombre',  2 => 'gra_nombre_corto',  3 => '_nombres_apellidos',  4 => '_asignar_materias',);
  }

  public function getFieldsDefault()
  {
    return array(
      'gra_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'ID',),
      'gra_nombre' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Nombre',),
      'gra_nombre_corto' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Abrev.',),
      'pro_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Tutor',),
      'nombres_apellidos' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Tutor',),
      'asignar_materias' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Materias',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'gra_id' => array(),
      'gra_nombre' => array(),
      'gra_nombre_corto' => array(),
      'pro_id' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'gra_id' => array(),
      'gra_nombre' => array(),
      'gra_nombre_corto' => array(),
      'pro_id' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'gra_id' => array(),
      'gra_nombre' => array(),
      'gra_nombre_corto' => array(),
      'pro_id' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'gra_id' => array(),
      'gra_nombre' => array(),
      'gra_nombre_corto' => array(),
      'pro_id' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'gra_id' => array(),
      'gra_nombre' => array(),
      'gra_nombre_corto' => array(),
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
    return 'emdiGradoForm';
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
    return 'emdiGradoFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfDoctrinePager';
  }

  public function getPagerMaxPerPage()
  {
    return 16;
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
