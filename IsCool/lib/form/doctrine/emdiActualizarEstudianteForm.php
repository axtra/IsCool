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
class emdiActualizarEstudianteForm extends BaseemdiEstudianteForm {

    public function configure() {

        // Embed Form para agregar el sfGuardUserForm
//        $guardUser = Doctrine_Core::getTable('sfGuarduser')->find(array($this->getObject()->getEstId()));
//        $actualizarEstudianteForm = new sfGuardUserForm($guardUser);
//        $this->embedForm('sf_guard_user_id', $actualizarEstudianteForm);
        
        // Quitar validatorSchema y widgetSchema de elementos no usados en el formulario 
        unset(
          $this['est_nombres'],
          $this['est_apellidos'],
          $this['est_cedula'],
          $this['est_fecha nacimiento'],
          $this['est_house'],
          $this['est_nombre_representante'],
          $this['est_login_representante'],
          $this['est_pass_representante'],
          $this['created_at'],
          $this['updated_at'],
          $this['gra_id'],
          $this['est_fecha_nacimiento'],
          $this['est_email_estudiante'],
          $this['sf_guard_user_id']
        );

//        $this->widgetSchema['confirm_password'] = new sfWidgetFormInputPassword();

        $this->widgetSchema->setLabels(array(
            'est_telf_repr_casa' => 'Teléfono Casa',
            'est_telf_repr_trabajo' => 'Teléfono Trabajo',
            'est_telf_repr_celular' => 'Teléfono Celular',
            'est_email_representante' => 'Email',
//            'sf_guard_user_id' => 'Password',
//            'confirm_password' => 'Confirmar Password',
        ));
        
        // ********Validadores
        $this->validatorSchema['est_telf_repr_casa'] = new sfValidatorAnd(array(
            new sfValidatorRegex(array('pattern'=> '/^[0-9]+$/'),array(
                'invalid' => 'El Teléfono solo puede tener números')
                ),
            new sfValidatorString(
                    array('max_length' => 10, 'min_length' => 6),
                    array(
                        'max_length' => 'Número de Teléfono muy largo (max. 10 caracteres)',
                        'min_length' => 'Número de Teléfono muy corto (min. 6 caracteres)')
            ),
        ));

        $this->validatorSchema['est_telf_repr_trabajo'] = new sfValidatorAnd(array(
            new sfValidatorRegex(array('pattern'=> '/^[0-9]+$/'),array(
                'invalid' => 'El Teléfono solo puede tener números')
                ),
            new sfValidatorString(
                    array('max_length' => 10, 'min_length' => 6),
                    array(
                        'max_length' => 'Número de Teléfono muy largo (max. 10 caracteres)',
                        'min_length' => 'Número de Teléfono muy corto (min. 6 caracteres)')
            ),
        ));

        $this->validatorSchema['est_telf_repr_celular'] = new sfValidatorAnd(array(
            new sfValidatorRegex(array('pattern'=> '/^[0-9]+$/'),array(
                'invalid' => 'El Teléfono solo puede tener números')
                ),
            new sfValidatorString(
                    array('max_length' => 10, 'min_length' => 6),
                    array(
                        'max_length' => 'Número de Teléfono muy largo (max. 10 caracteres)',
                        'min_length' => 'Número de Teléfono muy corto (min. 6 caracteres)')
            ),
        ));
        
       $this->validatorSchema['est_email_representante'] = new sfValidatorAnd(array(
            new sfValidatorEmail(array(),array(
                'invalid' => 'Ingrese un email válido')
            ),
        ),array('required'=>false));
          
        // Validador Password
/*        $this->validatorSchema['sf_guard_user_id']['password'] = new sfValidatorAnd(array(
                    $this->validatorSchema['sf_guard_user_id']['password'],
                    new sfValidatorString(
                            array('max_length' => 20, 'min_length' => 5, 'required' => true),
                            array(
                                'max_length' => 'Password muy largo (max. 20 caracteres)',
                                'min_length' => 'Password muy corto (min. 5 caracteres)')
                    ),
        ));

        // Usar un diferente Decorator, creado por mi /app/frontend/lib/widget/sfWidgetFormSchemaFormatterVacio.class.php
        $oDecorator = new sfWidgetFormSchemaFormatterVacio($this->getWidgetSchema());
        $this->getWidgetSchema()->addFormFormatter('vacio', $oDecorator);
        $this->widgetSchema['sf_guard_user_id']->setFormFormatterName('vacio');

        // Confirmar password
        $this->validatorSchema['confirm_password'] = clone $this->validatorSchema['sf_guard_user_id']['password'];
        $this->widgetSchema->moveField('confirm_password', 'after', 'sf_guard_user_id');
        $this->mergePostValidator(new sfValidatorSchemaCompare('password',sfValidatorSchemaCompare::EQUAL,'confirm_password',array(),
                        array('invalid' => 'Contraseña no coincide. Vuelva a repertir su contraseña.') ) );
*/

        /*
          $this->setWidgets(array(
          'permissions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
          ));

          $this->widgetSchema['content']->setAttributes(array('rows' => 10, 'cols' => 40));

          $authorQuery = Doctrine::getTable('Author')->getActiveAuthorsQuery();
          $this->widgetSchema['author_id']->setOption('query', $authorQuery);
          $this->validatorSchema['author_id']->setOption('query', $authorQuery);

          $this->validatorSchema['email'] = new sfValidatorAnd(array(
          new sfValidatorString(array('max_length' => 255)),
          new sfValidatorEmail(),
          ));

          $emailWidget = new sfWidgetFormInputText(array(), array('class' => 'email'));

          $this->widgetSchema['status'] = new sfWidgetFormSelect(array('choices' => ArticleTable::getStatuses()));

          // validators
          $this->validatorSchema['status'] = new sfValidatorChoice(array('choices' => array_keys(ArticleTable::getStatuses())));
          $this->validatorSchema['author_id']->setOption('query', $authorQuery);

         */
    }
}

?>
