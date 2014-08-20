<?php use_helper('I18N', 'Date') ?>
<?php include_partial('admingrados/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Ingresando nuevo Grado', array(), 'messages') ?></h1>

  <?php include_partial('admingrados/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('admingrados/form_header', array('Grado' => $Grado, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('admingrados/form', array('Grado' => $Grado, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('admingrados/form_footer', array('Grado' => $Grado, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
