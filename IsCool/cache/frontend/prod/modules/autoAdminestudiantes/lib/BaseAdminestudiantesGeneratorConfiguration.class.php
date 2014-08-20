<?php

/**
 * adminestudiantes module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage adminestudiantes
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdminestudiantesGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  '_new' =>   array(    'label' => 'Ingresar Nuevo Estudiante',  ),);
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
    return array(  '_new' =>   array(    'label' => 'Ingresar Nuevo Estudiante',  ),);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%_nombres_apellidos%% - %%est_house%% - %%est_nombre_representante%% - %%est_email_representante%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Administración de Estudiante';
  }

  public function getEditTitle()
  {
    return 'Editando Estudiante - %%est_nombres%% %%est_apellidos%%';
  }

  public function getNewTitle()
  {
    return 'Ingresando nuevo Estudiante';
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
    return array(  0 => 'est_nombres',  1 => 'est_apellidos',  2 => 'est_cedula',  3 => 'est_fecha_nacimiento',  4 => 'est_house',  5 => 'est_nombre_representante',  6 => 'est_email_representante',  7 => 'est_telf_repr_casa',  8 => 'est_telf_repr_trabajo',  9 => 'est_telf_repr_celular',  10 => 'gra_id',  11 => 'sf_guard_user_id',);
  }

  public function getNewDisplay()
  {
    return array(  0 => 'est_nombres',  1 => 'est_apellidos',  2 => 'est_cedula',  3 => 'est_fecha_nacimiento',  4 => 'est_house',  5 => 'est_nombre_representante',  6 => 'est_email_representante',  7 => 'est_telf_repr_casa',  8 => 'est_telf_repr_trabajo',  9 => 'est_telf_repr_celular',  10 => 'gra_id',  11 => 'sf_guard_user_id',);
  }

  public function getListDisplay()
  {
    return array(  0 => '_nombres_apellidos',  1 => 'est_house',  2 => 'est_nombre_representante',  3 => 'est_email_representante',);
  }

  public function getFieldsDefault()
  {
    return array(
      'est_id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'est_nombres' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Apellidos',),
      'est_apellidos' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Nombres',),
      'est_cedula' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Cédula',),
      'est_fecha_nacimiento' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',  'label' => 'Fecha Nacimiento',),
      'est_email_estudiante' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'est_house' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'House',),
      'est_nombre_representante' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Representante',),
      'est_telf_repr_casa' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'T. Casa',),
      'est_telf_repr_trabajo' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'T. Trabajo',),
      'est_telf_repr_celular' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'T. Celular',),
      'est_email_representante' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Email',),
      'est_login_representante' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'est_pass_representante' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'gra_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Grado',),
      'sf_guard_user_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Usuario',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'updated_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'nombres_apellidos' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Nombres',),
      'telefonos' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'T. Casa/Trabajo/Celular',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'est_id' => array(),
      'est_nombres' => array(),
      'est_apellidos' => array(),
      'est_cedula' => array(),
      'est_fecha_nacimiento' => array(),
      'est_email_estudiante' => array(),
      'est_house' => array(),
      'est_nombre_representante' => array(),
      'est_telf_repr_casa' => array(),
      'est_telf_repr_trabajo' => array(),
      'est_telf_repr_celular' => array(),
      'est_email_representante' => array(),
      'est_login_representante' => array(),
      'est_pass_representante' => array(),
      'gra_id' => array(),
      'sf_guard_user_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'est_id' => array(),
      'est_nombres' => array(),
      'est_apellidos' => array(),
      'est_cedula' => array(),
      'est_fecha_nacimiento' => array(),
      'est_email_estudiante' => array(),
      'est_house' => array(),
      'est_nombre_representante' => array(),
      'est_telf_repr_casa' => array(),
      'est_telf_repr_trabajo' => array(),
      'est_telf_repr_celular' => array(),
      'est_email_representante' => array(),
      'est_login_representante' => array(),
      'est_pass_representante' => array(),
      'gra_id' => array(),
      'sf_guard_user_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'est_id' => array(),
      'est_nombres' => array(),
      'est_apellidos' => array(),
      'est_cedula' => array(),
      'est_fecha_nacimiento' => array(),
      'est_email_estudiante' => array(),
      'est_house' => array(),
      'est_nombre_representante' => array(),
      'est_telf_repr_casa' => array(),
      'est_telf_repr_trabajo' => array(),
      'est_telf_repr_celular' => array(),
      'est_email_representante' => array(),
      'est_login_representante' => array(),
      'est_pass_representante' => array(),
      'gra_id' => array(),
      'sf_guard_user_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'est_id' => array(),
      'est_nombres' => array(),
      'est_apellidos' => array(),
      'est_cedula' => array(),
      'est_fecha_nacimiento' => array(),
      'est_email_estudiante' => array(),
      'est_house' => array(),
      'est_nombre_representante' => array(),
      'est_telf_repr_casa' => array(),
      'est_telf_repr_trabajo' => array(),
      'est_telf_repr_celular' => array(),
      'est_email_representante' => array(),
      'est_login_representante' => array(),
      'est_pass_representante' => array(),
      'gra_id' => array(),
      'sf_guard_user_id' => array(),
      'created_at' => array(),
      'updated_at' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'est_id' => array(),
      'est_nombres' => array(),
      'est_apellidos' => array(),
      'est_cedula' => array(),
      'est_fecha_nacimiento' => array(),
      'est_email_estudiante' => array(),
      'est_house' => array(),
      'est_nombre_representante' => array(),
      'est_telf_repr_casa' => array(),
      'est_telf_repr_trabajo' => array(),
      'est_telf_repr_celular' => array(),
      'est_email_representante' => array(),
      'est_login_representante' => array(),
      'est_pass_representante' => array(),
      'gra_id' => array(),
      'sf_guard_user_id' => array(),
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
    return 'emdiEstudianteForm';
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
    return 'emdiEstudianteFormFilter';
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
