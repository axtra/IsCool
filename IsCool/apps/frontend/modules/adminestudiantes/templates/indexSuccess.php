<?php use_helper('I18N', 'Date') ?>
<?php include_partial('adminestudiantes/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Administración de Estudiante', array(), 'messages') ?></h1>

  <?php include_partial('adminestudiantes/flashes') ?>

    <ul class="sf_admin_actions">
      <?php include_partial('adminestudiantes/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('adminestudiantes/list_actions', array('helper' => $helper)) ?>
      <li><?php echo link_to('Ingresar Usuario', 'adminusuarios/new') ?></li>
    </ul>
  
  <div id="sf_admin_header">
    <?php include_partial('adminestudiantes/list_header', array('pager' => $pager)) ?>
  </div>

  
  <div id="sf_admin_bar">
    <?php include_partial('adminestudiantes/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>
  

  <div id="sf_admin_content">
    <?php include_partial('adminestudiantes/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>

  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adminestudiantes/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
