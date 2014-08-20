<?php

/**
 * admingrados module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage admingrados
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdmingradosGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'emdi_grado' : 'emdi_grado_'.$action;
  }
}
