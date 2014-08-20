<?php use_helper('I18N', 'Date') ?>
<?php include_partial('adminmaterias/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Administración de Materias', array(), 'messages') ?></h1>

  <?php include_partial('adminmaterias/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('adminmaterias/list_header', array('pager' => $pager)) ?>
  </div>


  <div id="sf_admin_content">
    <?php include_partial('adminmaterias/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('adminmaterias/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('adminmaterias/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adminmaterias/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
