<td class="sf_admin_text sf_admin_list_td_nombres_apellidos">
  <?php echo get_partial('adminusuarios/nombres_apellidos', array('type' => 'list', 'sf_guard_user' => $sf_guard_user)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email_address">
  <?php echo $sf_guard_user->getEmailAddress() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_username">
  <?php echo $sf_guard_user->getUsername() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('adminusuarios/list_field_boolean', array('value' => $sf_guard_user->getIsActive())) ?>
</td>
