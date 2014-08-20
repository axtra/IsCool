<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_mxg_id">
  <?php if ('mxg_id' == $sort[0]): ?>
    <?php echo link_to(__('Mxg', array(), 'messages'), '@emdi_materia_x_grado_asignarmaterias', array('query_string' => 'sort=mxg_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Mxg', array(), 'messages'), '@emdi_materia_x_grado_asignarmaterias', array('query_string' => 'sort=mxg_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_gra_id">
  <?php if ('gra_id' == $sort[0]): ?>
    <?php echo link_to(__('Grado', array(), 'messages'), '@emdi_materia_x_grado_asignarmaterias', array('query_string' => 'sort=gra_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Grado', array(), 'messages'), '@emdi_materia_x_grado_asignarmaterias', array('query_string' => 'sort=gra_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_mat_id">
  <?php if ('mat_id' == $sort[0]): ?>
    <?php echo link_to(__('Materia', array(), 'messages'), '@emdi_materia_x_grado_asignarmaterias', array('query_string' => 'sort=mat_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Materia', array(), 'messages'), '@emdi_materia_x_grado_asignarmaterias', array('query_string' => 'sort=mat_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_pro_id">
  <?php if ('pro_id' == $sort[0]): ?>
    <?php echo link_to(__('Profesor', array(), 'messages'), '@emdi_materia_x_grado_asignarmaterias', array('query_string' => 'sort=pro_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Profesor', array(), 'messages'), '@emdi_materia_x_grado_asignarmaterias', array('query_string' => 'sort=pro_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>