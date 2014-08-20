<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nombres_apellidos">
  <?php echo __('Nombres', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_est_house">
  <?php if ('est_house' == $sort[0]): ?>
    <?php echo link_to(__('House', array(), 'messages'), '@emdi_estudiante', array('query_string' => 'sort=est_house&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('House', array(), 'messages'), '@emdi_estudiante', array('query_string' => 'sort=est_house&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_est_nombre_representante">
  <?php if ('est_nombre_representante' == $sort[0]): ?>
    <?php echo link_to(__('Representante', array(), 'messages'), '@emdi_estudiante', array('query_string' => 'sort=est_nombre_representante&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Representante', array(), 'messages'), '@emdi_estudiante', array('query_string' => 'sort=est_nombre_representante&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_est_email_representante">
  <?php if ('est_email_representante' == $sort[0]): ?>
    <?php echo link_to(__('Email', array(), 'messages'), '@emdi_estudiante', array('query_string' => 'sort=est_email_representante&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Email', array(), 'messages'), '@emdi_estudiante', array('query_string' => 'sort=est_email_representante&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>