<?php use_helper('I18N', 'Date') ?>
<?php include_partial('admindatos/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Habilitacion de Notas Parciales', array(), 'messages') ?></h1>

  <?php include_partial('admindatos/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('admindatos/form_header', array('emdi_administracion' => $emdi_administracion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('admindatos/form', array('emdi_administracion' => $emdi_administracion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('admindatos/form_footer', array('emdi_administracion' => $emdi_administracion, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
