<?php

/**
 * admindatos module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage admindatos
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdmindatosGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'emdi_administracion' : 'emdi_administracion_'.$action;
  }
}
