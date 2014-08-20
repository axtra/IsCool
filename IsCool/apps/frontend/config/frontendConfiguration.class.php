<?php

class frontendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
        sfValidatorBase::setDefaultMessage('required', 'El campo es requerido');
  }
}
