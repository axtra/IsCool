<?php

/**
 * sfGuardUser form.
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {
        unset(
          $this['algorithm'],
          $this['salt'],
          $this['last_login'],
          $this['created_at'],
          $this['updated_at']
          //$this['groups_list'],
          //$this['permissions_list']
        );
        
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        
        $this->widgetSchema->setLabels(array(
            'password' => false,
        ));
  }
}
