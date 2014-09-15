<script >
$(function() {
    $( ".dialog-comunicados" ).dialog({
    	autoOpen: false,
        resizable: false,
        height:400,
        width:500,
        modal: true,
        buttons: {
          Cerrar: function() {
            $( this ).dialog( "close" );
          }
        }
    });

    $( ".ver-com-btn" ).button({
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
          <th class="ui-th-column">Referencia</th>
          <th class="ui-th-column">Contenido</th>
          <th class="ui-th-column">Ver</th>
        </tr>
      </thead>
      <tbody id="body-comunicados">
<?php if( sizeof($comunicados) > 0 ): ?>

	<?php foreach ($comunicados as $comunicado): ?>
	
	<?php 
	
	$materia = explode( ' / ' , $comunicado['cpr_referencia'] );
	$fecha = explode( ' ' , $comunicado['created_at'] );
	$profesor = $comunicado->getPro();
	$limite = 100; // caracteres
    $str_contenido = $comunicado['cpr_contenido'];
    $contenido = (strlen($str_contenido) > $limite) ? substr( $str_contenido, 0, $limite ).'...' : $str_contenido;
		
	?>
        <tr>
            <td class="sf_admin_text"><?php echo($materia[1]); ?></td>
            <td class="sf_admin_text tarea-contenido"><?php echo $contenido ?></td>
            <td class="sf_admin_text 1-button-column">
                <button class="ver-com-btn" onclick="abrir_dialogo('#dialog-com-<?php echo $comunicado['cpr_id']; ?>','<?php echo $materia[1] ?>')">
                Ver comunicado</button>
                
                <div id="dialog-com-<?php echo $comunicado['cpr_id']; ?>" class="dialog-comunicados" title="Comunicado">
                    
                    <div id="sf_admin_container">
                    <table>
                      <tr>
                        <th>Materia</th>
                        <td>
                          <?php echo $materia[1]; ?>
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
                          <?php echo $fecha[0]; ?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td colspan="2">
                          <?php echo $comunicado['cpr_contenido']; ?>
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
              <td colspan="4">No tiene comunicados recibidos.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>

