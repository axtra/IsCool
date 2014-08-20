<td class="sf_admin_text sf_admin_list_td_gra_id">
  <?php echo link_to($Grado->getGraId(), 'emdi_grado_edit', $Grado) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_gra_nombre">
  <?php echo $Grado->getGraNombre() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_gra_nombre_corto">
  <?php echo $Grado->getGraNombreCorto() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nombres_apellidos">
  <?php echo get_partial('admingrados/nombres_apellidos', array('type' => 'list', 'Grado' => $Grado)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_asignar_materias">
  <?php echo get_partial('admingrados/asignar_materias', array('type' => 'list', 'Grado' => $Grado)) ?>
</td>
