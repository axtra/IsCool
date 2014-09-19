<script >
$(function() {
    $( ".dialog-notas" ).dialog({
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

    $( ".ver-nota-btn" ).button({
        icons: {
            primary: "ui-icon-folder-open"
          },
          text: false
    });

	$( "#com_rep_btn" )
    .button({
	      icons: {
	        primary: "ui-icon-mail-closed"
	      },
    })
    .click(function( event ) {
      //event.preventDefault();
      enviar_nota();
    });
});

</script>
  
<?php 
use_helper('jQuery'); 
echo jq_javascript_tag("

    enviar_nota = function()
    { 
        ".
        jq_remote_function(array(
                 'url'      => '@enviar_nota',
                 'with'     => "'est=' + $( '#est-id' ).val() + '&com_gen=' + $( '#com-rep' ).val()",
                 'loading'  => "procesando();",
                 'complete' => "listo();",
                 'script'   => 'true',
                 'update'   => 'enviados-container'))
        ."
    }

");

?>

<script >
$("#flashes-div").show().delay(3000).fadeOut();
</script>
<div id="flashes-div" style="display: none;">
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif; ?>
</div>


    <table>
      <tbody>
        <tr>
          <th>Nota:</th>
          <td>
            <input id="est-id" type="hidden" value="<?php echo $sf_user->getAttribute('id_estudiante'); ?>" />
            <textarea id="com-rep" cols="60" rows="15"></textarea>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr><td colspan="2">
        <!-- AQUI LOS BOTONES DE ENVIO -->
        <button id="com_rep_btn">Enviar Nota</button>
        </td></tr>
      </tfoot>
    </table>



<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Fecha</th>
          <th class="ui-th-column">Contenido</th>
          <th class="ui-th-column">Ver</th>
        </tr>
      </thead>
      <tbody id="body-comunicados">
<?php if( sizeof($enviados) > 0 ): ?>

	<?php foreach ($enviados as $enviado): ?>
	
	<?php 
	
	$fecha = explode( ' ' , $enviado['created_at'] );
	$limite = 60; // caracteres
    $str_contenido = $enviado['mre_contenido'];
    $contenido = (strlen($str_contenido) > $limite) ? substr( $str_contenido, 0, $limite ).'...' : $str_contenido;
		
	?>
        <tr>
            <td class="sf_admin_text"><?php echo $fecha[0]; ?></td>
            <td class="sf_admin_text tarea-contenido"><?php echo $contenido; ?></td>
            <td class="sf_admin_text">
                <button class="ver-nota-btn" onclick="abrir_dialogo('#dialog-nota-<?php echo $enviado['mre_id']; ?>','<?php echo $fecha[0] ?>')">
                Ver nota</button>
                
                <div id="dialog-nota-<?php echo $enviado['mre_id']; ?>" class="dialog-notas" title="Nota">
                    
                    <div id="sf_admin_container">
                    <table>
                      <tr>
                        <th>Fecha de envío</th>
                        <td>
                          <?php echo $fecha[0]; ?>
                        </td>
                      </tr>
                      
                      <tr>
                        <td colspan="2">
                          <?php echo $enviado['mre_contenido']; ?>
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
              <td colspan="4">No tiene notas enviadas.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>

