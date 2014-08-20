<td class="sf_admin_text sf_admin_list_td_mxg_id">
  <?php echo link_to($emdi_materia_x_grado->getMxgId(), 'emdi_materia_x_grado_asignarmaterias_edit', $emdi_materia_x_grado) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_gra_id">
  <?php echo $emdi_materia_x_grado->getGraId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_mat_id">
  <?php echo $emdi_materia_x_grado->getMatId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_pro_id">
  <?php echo $emdi_materia_x_grado->getProId() ?>
</td>
