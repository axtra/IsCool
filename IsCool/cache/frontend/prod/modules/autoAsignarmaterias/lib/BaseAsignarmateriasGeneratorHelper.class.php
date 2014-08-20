<?php

/**
 * asignarmaterias module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage asignarmaterias
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAsignarmateriasGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'emdi_materia_x_grado_asignarmaterias' : 'emdi_materia_x_grado_asignarmaterias_'.$action;
  }
}
