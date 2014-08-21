<?php

/**
 * emdiEstudiante form.
 *
 * @package    emdi
 * @subpackage form
 * @author     Bitcoder
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class emdiEstudianteForm extends BaseemdiEstudianteForm
{
  public function configure()
  {
        // Quitar validatorSchema y widgetSchema de elementos no usados en el formulario 
        unset(
          $this['est_login_representante'],
          $this['est_pass_representante'],
          $this['created_at'],
          $this['updated_at'],
          $this['est_email_estudiante']
        );
  }
}
