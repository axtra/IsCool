<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of emdiActualizarProfesorForm
 *
 * @author juan
 */
class emdiActualizarProfesorForm extends BaseemdiProfesorForm {

    public function configure() {
        
        // Quitar validatorSchema y widgetSchema de elementos no usados en el formulario 
        unset(
          $this['pro_nombres'],
          $this['pro_apellidos'],
          $this['pro_cedula'],
          $this['pro_login'],
          $this['pro_pass'],
          $this['pro_fecha_nacimiento'],
          $this['pro_house'],
          $this['sf_guard_user_id']
        );

//        $this->widgetSchema['confirm_password'] = new sfWidgetFormInputPassword();

        $this->widgetSchema->setLabels(array(
            'pro_telf_casa' => 'Teléfono Casa',
            'pro_telf_celular' => 'Teléfono Celular',
            'pro_email' => 'Email',
        ));
        
        // ********Validadores
        $this->validatorSchema['pro_telf_casa'] = new sfValidatorAnd(array(
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

        $this->validatorSchema['pro_telf_celular'] = new sfValidatorAnd(array(
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

       $this->validatorSchema['pro_email'] = new sfValidatorAnd(array(
            new sfValidatorEmail(array(),array(
                'invalid' => 'Ingrese un email válido')
            ),
        ),array('required'=>false));
    }
}

?>
