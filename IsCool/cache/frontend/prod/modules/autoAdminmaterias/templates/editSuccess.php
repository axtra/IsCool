<?php use_helper('I18N', 'Date') ?>
<?php include_partial('adminmaterias/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editando Materia %%mat_nombre%%', array('%%mat_nombre%%' => $emdi_materia->getMatNombre()), 'messages') ?></h1>

  <?php include_partial('adminmaterias/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('adminmaterias/form_header', array('emdi_materia' => $emdi_materia, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('adminmaterias/form', array('emdi_materia' => $emdi_materia, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adminmaterias/form_footer', array('emdi_materia' => $emdi_materia, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
