<td colspan="4">
  <?php echo __('%%nombres_apellidos%% - %%est_house%% - %%est_nombre_representante%% - %%est_email_representante%%', array('%%nombres_apellidos%%' => get_partial('adminestudiantes/nombres_apellidos', array('type' => 'list', 'emdi_estudiante' => $emdi_estudiante)), '%%est_house%%' => $emdi_estudiante->getEstHouse(), '%%est_nombre_representante%%' => $emdi_estudiante->getEstNombreRepresentante(), '%%est_email_representante%%' => $emdi_estudiante->getEstEmailRepresentante()), 'messages') ?>
</td>
