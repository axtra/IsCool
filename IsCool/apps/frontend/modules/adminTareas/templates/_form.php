<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php 

use_helper('jQuery'); 
echo jq_javascript_tag("

    mostrar_items = function(mxg_id)
    {
        ".
        jq_remote_function(array(
                 'url'      => '@mostrar_tareas_por_grado',
                 'with'     => "'mxg_id=' + mxg_id",
                 'script'   => 'true',
                 'update'   => 'items_div'))
        ."
    }

    borrar_item = function(tar_id, mxg_id)
    {
        if(confirm('¿Está seguro que desea borrar esta tarea?'))
        {".
         jq_remote_function(array(
                        'url'      => '@borrar_tarea',
                        'with'     => "'tar_id=' + tar_id + '&mxg_id=' + mxg_id",
                        'script'   => 'true',
                        'update'   => 'items_div'))
       ."}
    }

    disable_form = function()
    {
        $('#proyecto :input').attr('disabled', true);
    }

    enable_form = function()
    {
        $('#proyecto :input').removeAttr('disabled');
    }

");

?>

   <?php echo jq_form_remote_tag(array(
            'url'      => 'adminTareas/ingresarTarea',
            'loading'  => "$('#items_div').hide();$('#loader').show();disable_form();",
            'complete' => "$('#loader').hide();mostrar_items('".$mxg_id."');$('#items_div').show();enable_form();\$('tag').value = ''",
            'update'   => 'items_div',
        ),
        array('id' => 'proyecto'));
    ?>


  <table>
    <tbody>
    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>
    
      <tr>
        <th><?php echo $form['tar_fecha_envio']->renderLabel() ?></th>
        <td>
          <?php echo $form['tar_fecha_envio']->renderError() ?>
          <?php echo $form['tar_fecha_envio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tar_fecha_entrega']->renderLabel() ?></th>
        <td>
          <?php echo $form['tar_fecha_entrega']->renderError() ?>
          <?php echo $form['tar_fecha_entrega'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tar_contenido']->renderLabel() ?></th>
        <td>
          <?php echo $form['tar_contenido']->renderError() ?>
          <?php echo $form['tar_contenido'] ?>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="hidden" name="mxg" value="<?php echo $mxg_id ?>" />
          <?php echo $form->renderHiddenFields(false) ?>
          <input type="submit" value="Enviar" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
