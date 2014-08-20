<?php use_helper('I18N', 'Date') ?>
<?php include_partial('adminusuarios/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Ingresando nuevo Usuario', array(), 'messages') ?></h1>

  <?php include_partial('adminusuarios/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('adminusuarios/form_header', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('adminusuarios/form', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adminusuarios/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
