<?php use_helper('I18N', 'Date') ?>
<?php include_partial('adminprofesores/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Administración de Profesores', array(), 'messages') ?></h1>

  <?php include_partial('adminprofesores/flashes') ?>
  
    <ul class="sf_admin_actions">
      <?php include_partial('adminprofesores/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('adminprofesores/list_actions', array('helper' => $helper)) ?>
        <li><?php echo link_to('Ingresar Usuario', 'adminusuarios/new') ?></li>
    </ul>

  <div id="sf_admin_header">
    <?php include_partial('adminprofesores/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <?php include_partial('adminprofesores/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adminprofesores/list_footer', array('pager' => $pager)) ?>
  </div>
</div>