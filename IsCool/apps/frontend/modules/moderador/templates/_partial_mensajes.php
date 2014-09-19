<script >
$(function() {
    $( ".dialog-notas" ).dialog({
    	autoOpen: false,
        resizable: false,
        height:550,
        width:500,
        modal: true,
        buttons: {
          Asignar: function() {
        	  
        	  var mre = $( this ).find( ".mre" ).val();
        	  var pro = $( this ).find( ".pro option:selected" ).val();
        	  var fecha = $( this ).find( ".fecha" ).val();
        	  
        	  asignar_profesor(mre,pro,fecha);
        	  $( this ).dialog( "close" );
          },
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

    abrir_dialogo = function(dialogo, titulo){
        //event.preventDefault();
        $( dialogo ).dialog("open");
        $( dialogo ).dialog( "option", "title", titulo );
    };
});

</script>
  
<?php 
use_helper('jQuery'); 
echo jq_javascript_tag("

    asignar_profesor = function(mre,pro,fecha)
    { 
        ".
        jq_remote_function(array(
                 'url'      => '@enviar_moderacion',
                 'with'     => "'mre=' + mre + '&pro=' + pro + '&fecha=' + fecha",
                 'loading'  => "procesando();",
                 'complete' => "listo();",
                 'script'   => 'true',
                 'update'   => 'agenda-container'))
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
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Fecha</th>
          <th class="ui-th-column">Remitente</th>
          <th class="ui-th-column">Grado</th>
          <th class="ui-th-column">Asignado</th>
          <th class="ui-th-column">Ver</th>
        </tr>
      </thead>
      <tbody id="body-comunicados">
<?php if( sizeof($mensajes) > 0 ): ?>

	<?php foreach ($mensajes as $mensaje): ?>
	
	<?php 
	
	$fecha = explode( ' ' , $mensaje['created_at'] );
	$limite = 20; // caracteres
    $str_contenido = $mensaje['mre_contenido'];
    $contenido = (strlen($str_contenido) > $limite) ? substr( $str_contenido, 0, $limite ).'...' : $str_contenido;
    $estado = ($mensaje['mre_estado'] == 0) ? 'No asignado' : $mensaje->getPro();
		
	?>
        <tr>
            <td class="sf_admin_text"><?php echo $fecha[0]; ?></td>
            <td class="sf_admin_text"><?php echo $mensaje->getEst(); ?></td>
            <td class="sf_admin_text"><?php echo $mensaje->getEst()->getGra(); ?></td>
            <td class="sf_admin_text"><?php echo $estado; ?></td>
            <td class="sf_admin_text">
                <button class="ver-nota-btn" onclick="abrir_dialogo('#dialog-nota-<?php echo $mensaje['mre_id']; ?>','<?php echo $fecha[0] ?>')">
                Ver mensaje</button>
                
                <div id="dialog-nota-<?php echo $mensaje['mre_id']; ?>" class="dialog-notas" title="Nota">
                    
                    <div id="sf_admin_container">
                    <table>
                      <tr>
                        <th>Fecha de envío</th>
                        <td>
                          <?php echo $fecha[0]; ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Remitente</th>
                        <td>
                          <?php echo $mensaje->getEst(); ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Grado</th>
                        <td>
                          <?php echo $mensaje->getEst()->getGra(); ?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <?php echo $mensaje['mre_contenido']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          Asignado a:<br />
                          <input type="hidden" class="mre" value="<?php echo $mensaje['mre_id']; ?>">
                          <input type="hidden" class="fecha" value="<?php echo $fecha[0]; ?>">
                          <select class="pro">
                            <option value="" selected="selected" >Seleccionar un profesor...</option>
                            <?php foreach ($profesores as $profesor): ?>
                            <option value="<?php echo $profesor['pro_id'] ?>"><?php echo $profesor ?></option>
                            <?php endforeach; ?>
                          </select>
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
              <td colspan="5">No hay mensajes recibidos de padres de familia.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>
