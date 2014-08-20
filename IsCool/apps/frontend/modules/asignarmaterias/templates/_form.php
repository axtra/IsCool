<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php

use_helper('jQuery');
echo jq_javascript_tag("

    mostrar_items = function(grado_id)
    {
        ".
        jq_remote_function(array(
                 'url'      => '@mostrar_materia_por_grado',
                 'with'     => "'gra_id=' + grado_id",
                 'script'   => 'true',
                 'update'   => 'items_div'))
        ."
    }

    borrar_item = function(mxg_id,gra_id)
    {
        if(confirm('¿Está seguro que desea borrar esta materia?'))
        {".
         jq_remote_function(array(
                        'url'      => '@borrar_materia_por_grado',
                        'with'     => "'mxg_id=' + mxg_id + '&gra_id=' + gra_id",
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
    
<div class="sf_admin_form">
  <?php //echo form_tag_for($form, '@emdi_materia_x_grado_asignarmaterias') ?>

    <?php echo jq_form_remote_tag(array(
            'url'      => 'asignarmaterias/new',
            'loading'  => "$('#items_div').hide();$('#loader').show();disable_form();",
            'complete' => "$('#loader').hide();mostrar_items('".$grado_id."');$('#items_div').show();enable_form();\$('tag').value = ''",
            'update'   => 'items_div',
        ),
        array('id' => 'proyecto'));
    ?>
    
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('asignarmaterias/form_fieldset', array('emdi_materia_x_grado' => $emdi_materia_x_grado, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>
    
    <?php include_partial('asignarmaterias/form_actions', array('emdi_materia_x_grado' => $emdi_materia_x_grado, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    
    <br />

    <!-- Tabla de Materias asignadas al Grado -->
    <h2>Materias asignadas</h2>

    <div class="clear"></div>
    
    <div id="form3" class="form-horiz">
        <div id="loader" style="display: none;">
            <?php echo image_tag('loader_barra.gif', array('height'=>"64") ); ?>
        </div>
        
        <div id="items_div">
            <?php include_partial('partial_items', array('materias' => $materias, 'grado_id' => $grado_id)); ?>
        </div>
    </div>
    
  </form>
</div>
