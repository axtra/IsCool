<?php use_helper('I18N', 'Date') ?>
<?php include_partial('asignarmaterias/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Asignando materias al Grado', array(), 'messages') ?></h1>

  <?php include_partial('asignarmaterias/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('asignarmaterias/form_header', array('emdi_materia_x_grado' => $emdi_materia_x_grado, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php 
            include_partial('asignarmaterias/form', 
                    array('grado_id' => $grado_id,
                          'materias' => $materias,
                          'resultado' => $resultado, 
                          'emdi_materia_x_grado' => $emdi_materia_x_grado, 
                          'form' => $form, 
                          'configuration' => $configuration, 
                          'helper' => $helper)
            ) 
    ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('asignarmaterias/form_footer', array('emdi_materia_x_grado' => $emdi_materia_x_grado, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
