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
<h2>Notas de Profesores</h2>
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
	
	$materia = explode( ' / ' , utf8_decode($comunicado['cpr_referencia']) );
	//$profesor = $comunicado->getPro();
	// :( quemado codigo de Hugo pro_id = 1
	$profesor = ($comunicado['pro_id'] == 1) ? $materia[0] : $comunicado->getPro();
	$materia = (sizeof($materia) > 1) ? $materia[1] : $comunicado['cpr_referencia'];
	$fecha = explode( ' ' , $comunicado['created_at'] );
	
	$limite = 100; // caracteres
    $str_contenido = $comunicado['cpr_contenido'];
    $contenido = (strlen($str_contenido) > $limite) ? substr( $str_contenido, 0, $limite ).'...' : $str_contenido;
    $contenido = strip_tags(sfOutputEscaper::unescape($contenido));
    
	?>
        <tr>
            <td class="sf_admin_text"><?php echo $materia; ?></td>
            <td class="sf_admin_text tarea-contenido"><?php echo $contenido ?></td>
            <td class="sf_admin_text 1-button-column">
                <button class="ver-com-btn" onclick="abrir_dialogo('#dialog-com-<?php echo $comunicado['cpr_id']; ?>','<?php echo $materia ?>')">
                Ver comunicado</button>
                
                <div id="dialog-com-<?php echo $comunicado['cpr_id']; ?>" class="dialog-comunicados" title="Comunicado">
                    
                    <div id="sf_admin_container">
                    <table>
                      <tr>
                        <th>Referencia</th>
                        <td>
                          <?php echo $materia ?>
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
                          <?php echo sfOutputEscaper::unescape($comunicado['cpr_contenido']); ?>
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
              <td colspan="4">No tiene notas de profesores recibidas.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>



<!--  *********** Tabla de Comunicados Generales ********************* -->


<h2>Comunicados Generales</h2>
<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Unidad</th>
          <th class="ui-th-column">Contenido</th>
          <th class="ui-th-column">Ver</th>
        </tr>
      </thead>
      <tbody id="body-comunicados">
<?php if( sizeof($comunicados_gen) > 0 ): ?>

	<?php foreach ($comunicados_gen as $comunicado): ?>
	
	<?php 
	
	$materia = $comunicado->getCge()->getCgeReferencia();
	$fecha = explode( ' ' , $comunicado->getCge()->getCreatedAt() );
	$limite = 100; // caracteres
    $str_contenido = $comunicado->getCge()->getCgeContenido();
    $contenido = (strlen($str_contenido) > $limite) ? substr( $str_contenido, 0, $limite ).'...' : $str_contenido;
    $contenido = strip_tags(sfOutputEscaper::unescape($contenido));
		
	?>
        <tr>
            <td class="sf_admin_text"><?php echo($materia); ?></td>
            <td class="sf_admin_text tarea-contenido"><?php echo $contenido ?></td>
            <td class="sf_admin_text 1-button-column">
                <button class="ver-com-btn" onclick="abrir_dialogo('#dialog-comg-<?php echo $comunicado->getCge()->getCgeId(); ?>','<?php echo $materia ?>')">
                Ver comunicado</button>
                
                <div id="dialog-comg-<?php echo $comunicado->getCge()->getCgeId(); ?>" class="dialog-comunicados" title="Comunicado">
                    
                    <div id="sf_admin_container">
                    <table>
                      <tr>
                        <th>Unidad</th>
                        <td>
                          <?php echo $materia; ?>
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
                          <?php echo sfOutputEscaper::unescape($comunicado->getCge()->getCgeContenido()); ?>
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



