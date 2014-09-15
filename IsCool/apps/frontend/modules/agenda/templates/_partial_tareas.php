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

});
</script>

<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Asignatura</th>
          <th class="ui-th-column">Tarea</th>
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

