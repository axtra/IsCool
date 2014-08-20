<?php

/**
 * admindatos module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage admindatos
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdmindatosGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%adm_id%% - %%adm_habilitar_nota1%% - %%adm_habilitar_nota2%% - %%adm_habilitar_nota3%% - %%adm_habilitar_nota4%% - %%adm_habilitar_nota5%% - %%adm_habilitar_nota6%% - %%adm_habilitar_nota7%% - %%adm_habilitar_nota8%% - %%adm_habilitar_nota9%% - %%adm_habilitar_nota10%% - %%adm_habilitar_nota11%% - %%adm_habilitar_nota12%% - %%created_at%% - %%updated_at%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Admindatos List';
  }

  public function getEditTitle()
  {
    return 'Habilitacion de Notas Parciales';
  }

  public function getNewTitle()
  {
    return 'New Admindatos';
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
    return array(  0 => 'adm_habilitar_nota1',  1 => 'adm_habilitar_nota2',  2 => 'adm_habilitar_nota3',  3 => 'adm_habilitar_nota4',  4 => 'adm_habilitar_nota5',  5 => 'adm_habilitar_nota6',  6 => 'adm_habilitar_nota7',  7 => 'adm_habilitar_nota8',  8 => 'adm_habilitar_nota9',  9 => 'adm_habilitar_nota10',  10 => 'adm_habilitar_nota11',  11 => 'adm_habilitar_nota12',);
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'adm_id',  1 => 'adm_habilitar_nota1',  2 => 'adm_habilitar_nota2',  3 => 'adm_habilitar_nota3',  4 => 'adm_habilitar_nota4',  5 => 'adm_habilitar_nota5',  6 => 'adm_habilitar_nota6',  7 => 'adm_habilitar_nota7',  8 => 'adm_habilitar_nota8',  9 => 'adm_habilitar_nota9',  10 => 'adm_habilitar_nota10',  11 => 'adm_habilitar_nota11',  12 => 'adm_habilitar_nota12',  13 => 'created_at',  14 => 'updated_at',);
  }

  public function getFieldsDefault()
  {
    return array(
      'adm_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'adm_habilitar_nota1' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Aporte 1',  'help' => 'Primer Parcial - I Quimestre',),
      'adm_habilitar_nota2' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Aporte 2',  'help' => 'Segundo Parcial - I Quimestre',),
      'adm_habilitar_nota3' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Aporte 3',  'help' => 'Tercer Parcial - I Quimestre',),
      'adm_habilitar_nota4' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Examen 1er Quimestre',  'help' => 'Examen del I Quimestre',),
      'adm_habilitar_nota5' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Aporte 1',  'help' => 'Primer Parcial - II Quimestre',),
      'adm_habilitar_nota6' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Aporte 2',  'help' => 'Segundo Parcial - II Quimestre',),
      'adm_habilitar_nota7' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Aporte 3',  'help' => 'Tercer Parcial - II Quimestre',),
      'adm_habilitar_nota8' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Examen 2do Quimestre',  'help' => 'Examen del II Quimestre',),
      'adm_habilitar_nota9' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Recuperacion',  'help' => 'Recuperacion',),
      'adm_habilitar_nota10' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Supletorio',  'help' => 'Supletorio',),
      'adm_habilitar_nota11' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Promedio Final',  'help' => 'Promedio Final',),
      'adm_habilitar_nota12' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',  'label' => 'Deshabilitado',  'help' => 'Deshabilitado',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'adm_id' => array(),
      'adm_habilitar_nota1' => array(),
      'adm_habilitar_nota2' => array(),
      'adm_habilitar_nota3' => array(),
      'adm_habilitar_nota4' => array(),
      'adm_habilitar_nota5' => array(),
      'adm_habilitar_nota6' => array(),
      'adm_habilitar_nota7' => array(),
      'adm_habilitar_nota8' => array(),
      'adm_habilitar_nota9' => array(),
      'adm_habilitar_nota10' => array(),
      'adm_habilitar_nota11' => array(),
      'adm_habilitar_nota12' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'adm_id' => array(),
      'adm_habilitar_nota1' => array(),
      'adm_habilitar_nota2' => array(),
      'adm_habilitar_nota3' => array(),
      'adm_habilitar_nota4' => array(),
      'adm_habilitar_nota5' => array(),
      'adm_habilitar_nota6' => array(),
      'adm_habilitar_nota7' => array(),
      'adm_habilitar_nota8' => array(),
      'adm_habilitar_nota9' => array(),
      'adm_habilitar_nota10' => array(),
      'adm_habilitar_nota11' => array(),
      'adm_habilitar_nota12' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'adm_id' => array(),
      'adm_habilitar_nota1' => array(),
      'adm_habilitar_nota2' => array(),
      'adm_habilitar_nota3' => array(),
      'adm_habilitar_nota4' => array(),
      'adm_habilitar_nota5' => array(),
      'adm_habilitar_nota6' => array(),
      'adm_habilitar_nota7' => array(),
      'adm_habilitar_nota8' => array(),
      'adm_habilitar_nota9' => array(),
      'adm_habilitar_nota10' => array(),
      'adm_habilitar_nota11' => array(),
      'adm_habilitar_nota12' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'adm_id' => array(),
      'adm_habilitar_nota1' => array(),
      'adm_habilitar_nota2' => array(),
      'adm_habilitar_nota3' => array(),
      'adm_habilitar_nota4' => array(),
      'adm_habilitar_nota5' => array(),
      'adm_habilitar_nota6' => array(),
      'adm_habilitar_nota7' => array(),
      'adm_habilitar_nota8' => array(),
      'adm_habilitar_nota9' => array(),
      'adm_habilitar_nota10' => array(),
      'adm_habilitar_nota11' => array(),
      'adm_habilitar_nota12' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'adm_id' => array(),
      'adm_habilitar_nota1' => array(),
      'adm_habilitar_nota2' => array(),
      'adm_habilitar_nota3' => array(),
      'adm_habilitar_nota4' => array(),
      'adm_habilitar_nota5' => array(),
      'adm_habilitar_nota6' => array(),
      'adm_habilitar_nota7' => array(),
      'adm_habilitar_nota8' => array(),
      'adm_habilitar_nota9' => array(),
      'adm_habilitar_nota10' => array(),
      'adm_habilitar_nota11' => array(),
      'adm_habilitar_nota12' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'emdiAdministracionForm';
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
    return 'emdiAdministracionFormFilter';
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
