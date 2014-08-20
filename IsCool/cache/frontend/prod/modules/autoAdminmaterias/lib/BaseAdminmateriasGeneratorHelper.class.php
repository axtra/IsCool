<?php

/**
 * adminmaterias module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage adminmaterias
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdminmateriasGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'emdi_materia' : 'emdi_materia_'.$action;
  }
}
