<td colspan="15">
  <?php echo __('%%adm_id%% - %%adm_habilitar_nota1%% - %%adm_habilitar_nota2%% - %%adm_habilitar_nota3%% - %%adm_habilitar_nota4%% - %%adm_habilitar_nota5%% - %%adm_habilitar_nota6%% - %%adm_habilitar_nota7%% - %%adm_habilitar_nota8%% - %%adm_habilitar_nota9%% - %%adm_habilitar_nota10%% - %%adm_habilitar_nota11%% - %%adm_habilitar_nota12%% - %%created_at%% - %%updated_at%%', array('%%adm_id%%' => link_to($emdi_administracion->getAdmId(), 'emdi_administracion_edit', $emdi_administracion), '%%adm_habilitar_nota1%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota1())), '%%adm_habilitar_nota2%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota2())), '%%adm_habilitar_nota3%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota3())), '%%adm_habilitar_nota4%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota4())), '%%adm_habilitar_nota5%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota5())), '%%adm_habilitar_nota6%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota6())), '%%adm_habilitar_nota7%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota7())), '%%adm_habilitar_nota8%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota8())), '%%adm_habilitar_nota9%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota9())), '%%adm_habilitar_nota10%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota10())), '%%adm_habilitar_nota11%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota11())), '%%adm_habilitar_nota12%%' => get_partial('admindatos/list_field_boolean', array('value' => $emdi_administracion->getAdmHabilitarNota12())), '%%created_at%%' => false !== strtotime($emdi_administracion->getCreatedAt()) ? format_date($emdi_administracion->getCreatedAt(), "f") : '&nbsp;', '%%updated_at%%' => false !== strtotime($emdi_administracion->getUpdatedAt()) ? format_date($emdi_administracion->getUpdatedAt(), "f") : '&nbsp;'), 'messages') ?>
</td>