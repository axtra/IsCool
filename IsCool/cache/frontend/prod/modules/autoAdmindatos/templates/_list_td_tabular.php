<td class="sf_admin_text sf_admin_list_td_adm_id">
  <?php echo link_to($emdi_administracion->getAdmId(), 'emdi_administracion_edit', $emdi_administracion) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota1">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota1())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota2">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota2())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota3">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota3())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota4">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota4())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota5">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota5())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota6">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota6())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota7">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota7())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota8">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota8())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota9">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota9())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota10">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota10())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota11">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota11())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_adm_habilitar_nota12">
  <?php echo get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota12())) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($emdi_administracion->getCreatedAt()) ? format_date($emdi_administracion->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($emdi_administracion->getUpdatedAt()) ? format_date($emdi_administracion->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
