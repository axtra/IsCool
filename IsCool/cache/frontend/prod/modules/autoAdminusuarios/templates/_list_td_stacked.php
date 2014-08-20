<td colspan="4">
  <?php echo __('%%nombres_apellidos%% - %%email_address%% - %%username%% - %%is_active%%', array('%%nombres_apellidos%%' => get_partial('adminusuarios/nombres_apellidos', array('type' => 'list', 'sf_guard_user' => $sf_guard_user)), '%%email_address%%' => $sf_guard_user->getEmailAddress(), '%%username%%' => $sf_guard_user->getUsername(), '%%is_active%%' => get_partial('adminusuarios/list_field_boolean', array('value' => $sf_guard_user->getIsActive()))), 'messages') ?>
</td>
