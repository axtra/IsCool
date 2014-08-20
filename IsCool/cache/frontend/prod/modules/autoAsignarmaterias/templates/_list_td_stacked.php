<td colspan="4">
  <?php echo __('%%mxg_id%% - %%gra_id%% - %%mat_id%% - %%pro_id%%', array('%%mxg_id%%' => link_to($emdi_materia_x_grado->getMxgId(), 'emdi_materia_x_grado_asignarmaterias_edit', $emdi_materia_x_grado), '%%gra_id%%' => $emdi_materia_x_grado->getGraId(), '%%mat_id%%' => $emdi_materia_x_grado->getMatId(), '%%pro_id%%' => $emdi_materia_x_grado->getProId()), 'messages') ?>
</td>
