<?php

/**
 * Modulo de inicio de todo el Portal no tiene acceso a los usuarios
 * Se redirige aqui siempre que hace logout
 *
 * @package    emdi
 * @subpackage inicio
 * @author     Bitcoder
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
//    $this->forward('default', 'module');
  }
}
