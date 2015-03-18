<script >
$(function() {
    $( ".dialog-tareas" ).dialog({
    	autoOpen: false,
        resizable: false,
        height:450,
        width:450,
        modal: true,
        buttons: {
          Cerrar: function() {
            $( this ).dialog( "close" );
          }
        }
    });

    $( ".ver-tarea-btn" ).button({
        icons: {
            primary: "ui-icon-folder-open"
          },
          text: false
    });

    // Uso de Bootstrap checkbox para cambio de estado 
    $(':checkbox').checkboxpicker();

    $( "#dialog-cambio-estado-tarea" ).dialog({
    	autoOpen: false,
        resizable: false,
        height:250,
        width:350,
        modal: true,
        buttons: {
        	  
          Enviar: function(tar_id) {
        	  var tar_id = $( this ).data('tar_id_var');
        	  var elemento = $( this ).data('elemento_var');

        	  // LLamo a procedimiento AJAX
        	  cambiar_estado_tarea(tar_id);

        	  $(elemento).prop('disabled', true);
        	  $( this ).dialog( "close" );
          },
          
          Cancelar: function() {
        	  var elemento = $( this ).data('elemento_var');
        	  $(elemento).prop('checked', false);
              $( this ).dialog( "close" );
          }
        }
    });

});

// Funcion para abrir la confirmacion y cambio de estado de tarea
function cambiarEstadoPendiente(elemento, tar_id){

    var checked = $(elemento).is(':checked');
    
    if(checked) {
 	  $( '#dialog-cambio-estado-tarea' )
 	      .data({
 	    	  elemento_var: elemento,
 	    	  tar_id_var: tar_id
 	 	  })
 	      .dialog("open");
    }
}

</script>

<?php 
use_helper('jQuery');
echo jq_javascript_tag("

    cambiar_estado_tarea = function(tar_id)
    { 
        ".
        jq_remote_function(array(
                 'url'      => '@cambiar_estado_tarea',
                 'with'     => "'tar_id=' + tar_id + '&est_id='",
                 'loading'  => "procesando();",
                 'complete' => "listo();",
                 'script'   => 'true'))
        ."
    }
");
?>


<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Asignatura</th>
          <th class="ui-th-column">Tarea</th>
          <th class="ui-th-column">Realizada</th>
          <th class="ui-th-column">Ver</th>
        </tr>
      </thead>
      <tbody id="body-comunicados">
<?php if( sizeof($tareas) > 0 ): ?>

	<?php foreach ($tareas as $tarea): ?>
	<?php 
	   $materia = $tarea->getMxg()->getMat();
	   $profesor = $tarea->getMxg()->getPro();
	   $limite = 100; // caracteres
	   $str_contenido = $tarea['tar_contenido'];
	   $contenido = (strlen($str_contenido) > $limite) ? substr( $str_contenido, 0, $limite ).'...' : $str_contenido;
	?>
          <tr>
              <td class="sf_admin_text"><?php echo $materia ?></td>
              <td class="sf_admin_text tarea-contenido"><?php echo $contenido ?></td>
              <td class="sf_admin_text">

                <input type="checkbox" data-off-title="Tarea no realizada" data-on-title="Tarea realizada"
                       data-off-icon-class="glyphicon glyphicon-thumbs-down" data-on-icon-class="glyphicon glyphicon-thumbs-up" 
                       data-off-label="false" data-on-label="false" data-off-class="btn-warning"
                       onChange="cambiarEstadoPendiente(this, '<?php echo $tarea['tar_id'] ?>')"  
                       <?php if($estados_tareas[$tarea['tar_id']]):  ?>
                       disabled
                       checked
                       <?php endif; ?> 
                 >
                 
              </td>
              <td class="sf_admin_text 1-button-column">
                <button class="ver-tarea-btn" onclick="abrir_dialogo('#dialog-tarea-<?php echo $tarea['tar_id']; ?>','<?php echo $materia ?>')">
                Ver tarea</button>
                
                <div id="dialog-tarea-<?php echo $tarea['tar_id']; ?>" class="dialog-tareas" title="Tarea">
                    
                    <div id="sf_admin_container">
                    <table>
                      <tr>
                        <th>Materia</th>
                        <td>
                          <?php echo $materia; ?>
                        </td>
                      </tr>
                      
                      <tr>
                        <th>Docente</th>
                        <td>
                          <?php echo $profesor; ?>
                        </td>
                      </tr>
                      
                      <tr>
                        <th>Fecha de Envío</th>
                        <td>
                          <?php echo $tarea['tar_fecha_envio']; ?>
                        </td>
                      </tr>

                      <tr>
                        <th>Fecha de Entrega</th>
                        <td>
                          <?php echo $tarea['tar_fecha_entrega']; ?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td colspan="2">
                          <?php echo $tarea['tar_contenido']; ?>
                        </td>
                      </tr>
                      
                    </table>
                    </div>
                    
                </div>
                
              </td>
          </tr>
	<?php endforeach; ?>

<?php else: ?>
          <tr>
              <td colspan="4">No tiene tareas enviadas.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>



<div id="dialog-cambio-estado-tarea" class="dialog-pendientes" title="Cambiar estado de tarea">
    
    <div id="sf_admin_container">
      <p>Una vez que cambie el estado de la tarea a <strong>Realizada</strong> el proceso no es reversible.</p>  
      <p>¿Está seguro que desea marcar la tarea como <strong>Realizada</strong>?</p>
    </div>
    
</div>
