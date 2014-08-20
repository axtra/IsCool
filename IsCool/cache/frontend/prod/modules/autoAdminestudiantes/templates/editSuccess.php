<?php use_helper('I18N', 'Date') ?>
<?php include_partial('adminestudiantes/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editando Estudiante - %%est_nombres%% %%est_apellidos%%', array('%%est_nombres%%' => $emdi_estudiante->getEstNombres(), '%%est_apellidos%%' => $emdi_estudiante->getEstApellidos()), 'messages') ?></h1>

  <?php include_partial('adminestudiantes/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('adminestudiantes/form_header', array('emdi_estudiante' => $emdi_estudiante, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('adminestudiantes/form', array('emdi_estudiante' => $emdi_estudiante, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adminestudiantes/form_footer', array('emdi_estudiante' => $emdi_estudiante, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
