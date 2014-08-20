<td class="sf_admin_text sf_admin_list_td_nombres_apellidos">
  <?php echo get_partial('adminestudiantes/nombres_apellidos', array('type' => 'list', 'emdi_estudiante' => $emdi_estudiante)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_est_house">
  <?php echo $emdi_estudiante->getEstHouse() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_est_nombre_representante">
  <?php echo $emdi_estudiante->getEstNombreRepresentante() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_est_email_representante">
  <?php echo $emdi_estudiante->getEstEmailRepresentante() ?>
</td>
