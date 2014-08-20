<td colspan="5">
  <?php echo __('%%gra_id%% - %%gra_nombre%% - %%gra_nombre_corto%% - %%nombres_apellidos%% - %%asignar_materias%%', array('%%gra_id%%' => link_to($Grado->getGraId(), 'emdi_grado_edit', $Grado), '%%gra_nombre%%' => $Grado->getGraNombre(), '%%gra_nombre_corto%%' => $Grado->getGraNombreCorto(), '%%nombres_apellidos%%' => get_partial('admingrados/nombres_apellidos', array('type' => 'list', 'Grado' => $Grado)), '%%asignar_materias%%' => get_partial('admingrados/asignar_materias', array('type' => 'list', 'Grado' => $Grado))), 'messages') ?>
</td>
