<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_adm_id">
  <?php if ('adm_id' == $sort[0]): ?>
    <?php echo link_to(__('Adm', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Adm', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota1">
  <?php if ('adm_habilitar_nota1' == $sort[0]): ?>
    <?php echo link_to(__('Aporte 1', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota1&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Aporte 1', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota1&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota2">
  <?php if ('adm_habilitar_nota2' == $sort[0]): ?>
    <?php echo link_to(__('Aporte 2', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota2&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Aporte 2', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota2&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota3">
  <?php if ('adm_habilitar_nota3' == $sort[0]): ?>
    <?php echo link_to(__('Aporte 3', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota3&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Aporte 3', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota3&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota4">
  <?php if ('adm_habilitar_nota4' == $sort[0]): ?>
    <?php echo link_to(__('Examen 1er Quimestre', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota4&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Examen 1er Quimestre', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota4&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota5">
  <?php if ('adm_habilitar_nota5' == $sort[0]): ?>
    <?php echo link_to(__('Aporte 1', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota5&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Aporte 1', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota5&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota6">
  <?php if ('adm_habilitar_nota6' == $sort[0]): ?>
    <?php echo link_to(__('Aporte 2', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota6&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Aporte 2', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota6&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota7">
  <?php if ('adm_habilitar_nota7' == $sort[0]): ?>
    <?php echo link_to(__('Aporte 3', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota7&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Aporte 3', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota7&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota8">
  <?php if ('adm_habilitar_nota8' == $sort[0]): ?>
    <?php echo link_to(__('Examen 2do Quimestre', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota8&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Examen 2do Quimestre', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota8&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota9">
  <?php if ('adm_habilitar_nota9' == $sort[0]): ?>
    <?php echo link_to(__('Recuperacion', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota9&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Recuperacion', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota9&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota10">
  <?php if ('adm_habilitar_nota10' == $sort[0]): ?>
    <?php echo link_to(__('Supletorio', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota10&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Supletorio', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota10&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota11">
  <?php if ('adm_habilitar_nota11' == $sort[0]): ?>
    <?php echo link_to(__('Promedio Final', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota11&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Promedio Final', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota11&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_adm_habilitar_nota12">
  <?php if ('adm_habilitar_nota12' == $sort[0]): ?>
    <?php echo link_to(__('Deshabilitado', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota12&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Deshabilitado', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=adm_habilitar_nota12&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_created_at">
  <?php if ('created_at' == $sort[0]): ?>
    <?php echo link_to(__('Created at', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=created_at&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Created at', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=created_at&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_updated_at">
  <?php if ('updated_at' == $sort[0]): ?>
    <?php echo link_to(__('Updated at', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=updated_at&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Updated at', array(), 'messages'), '@emdi_administracion', array('query_string' => 'sort=updated_at&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>