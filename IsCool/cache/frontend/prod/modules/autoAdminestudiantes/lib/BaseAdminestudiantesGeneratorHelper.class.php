<?php

/**
 * adminestudiantes module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage adminestudiantes
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdminestudiantesGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'emdi_estudiante' : 'emdi_estudiante_'.$action;
  }
}
