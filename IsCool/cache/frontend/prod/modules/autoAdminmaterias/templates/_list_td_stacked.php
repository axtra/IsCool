<td colspan="2">
  <?php echo __('%%mat_id%% - %%mat_nombre%%', array('%%mat_id%%' => link_to($emdi_materia->getMatId(), 'emdi_materia_edit', $emdi_materia), '%%mat_nombre%%' => $emdi_materia->getMatNombre()), 'messages') ?>
</td>
