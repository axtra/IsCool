<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of emdiActualizarDatosForm
 *
 * @author juan
 */
class emdiActualizarPasswordForm extends BasesfGuardUserForm {

    public function configure() {
        
        // Quitar validatorSchema y widgetSchema de elementos no usados en el formulario 
        unset(
          $this['first_name'],
          $this['last_name'],
          $this['username'],
          $this['email_address'],
          $this['is_active'],
          $this['is_super_admin'],
          $this['last_login'],
          $this['created_at'],
          $this['updated_at'],
          $this['salt'],
          $this['algorithm'],
          $this['groups_list'],
          $this['permissions_list']
        );
        
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->widgetSchema['confirm_password'] = new sfWidgetFormInputPassword();

        $this->widgetSchema->setLabels(array(
            'password' => 'Nuevo Password',
            'confirm_password' => 'Confirmar Nuevo Password',
        ));
        
        // Validador Password
        $this->validatorSchema['password'] = new sfValidatorAnd(array(
                    $this->validatorSchema['password'],
                    new sfValidatorString(
                            array('max_length' => 20, 'min_length' => 5, 'required' => true),
                            array(
                                'max_length' => 'El Password debe ser de máximo 20 caracteres y mínimo 5 caracteres',
                                'min_length' => 'El Password debe ser de máximo 20 caracteres y mínimo 5 caracteres')
                    ),
        ));

        // Confirmar password
        $this->validatorSchema['confirm_password'] = clone $this->validatorSchema['password'];
        $this->widgetSchema->moveField('confirm_password', 'after', 'password');
        $this->mergePostValidator(new sfValidatorSchemaCompare('password',sfValidatorSchemaCompare::EQUAL,'confirm_password',array(),
                        array('invalid' => 'Las contraseñas no coinciden. Vuelva a repertir su contraseña.') ) );

    }

}

?>
