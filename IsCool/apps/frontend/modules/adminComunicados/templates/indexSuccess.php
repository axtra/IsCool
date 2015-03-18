<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/default.css" />

<?php 
use_helper('jQuery'); 
echo jq_javascript_tag("

    mostrar_items = function(gra)
    {
        ".
        jq_remote_function(array(
                 'url'      => '@mostrar_alumnos_por_grado',
                 'with'     => "'gra=' + gra.value",
                 'loading'  => "$('#estudiantes-list').hide();$('#loader-est').show();$('#opener').hide();$('#mensajes-list').hide();",
                 'complete' => "$('#loader-est').hide();$('#estudiantes-list').show();",
                 'script'   => 'true',
                 'update'   => 'estudiantes-list'))
        ."
    }
    
    mostrar_mensajes = function()
    {
        ".
        jq_remote_function(array(
                 'url'      => '@mostrar_plantillas',
                 'loading'  => "$('#mensajes-list').hide();$('#loader-msg').show();$('#opener').hide();$('#mensajes-list').hide();",
                 'complete' => "$('#loader-msg').hide();$('#mensajes-list').show();$('#opener').show();",
                 'script'   => 'true',
                 'update'   => 'mensajes-list'))
        ."
    }


    enviar_comunicado = function()
    {      
        ".
        jq_remote_function(array(
                 'url'      => '@enviar_comunicado_profesor',
                 'with'     => "'ref=' + $( '#grado-materia-list option:selected' ).text() + '&est_id=' + $( '#estudiantes-select' ).val() + '&msg=' + $( '#plantilla-select' ).val() + '&pro=' + $( '#profesor-id' ).val()",
                 'loading'  => "$('#opener').hide();$('#mensajes-list').hide();procesando();",
                 'complete' => "listo();",
                 'script'   => 'true',
                 'update'   => 'com-enviados-table'))
        ."
    }

    render_flashes = function()
    {
        ".
        jq_remote_function(array(
                 'url'      => '@render_flashes',
                 'loading'  => "listo();$('#flashes-div').hide();",
                 'complete' => "listo();$('#flashes-div').show();",
                 'script'   => 'true',
                 'update'   => 'flashes-div'))
        ."
    }
    
");

?>

  
  
<script>
$(document).ready(function() {
	  $( "#opener" ).hide();
      $( "#dialog" ).dialog({ 
          autoOpen: false,
          resizable: false,
          height:175,
          width:450,
          modal: true,
          buttons: {
            'Enviar Comunicado': function() {
              
              if ($( "#plantilla-select" ).val()) {
            	  // Enviar comunicado
                  enviar_comunicado();
                  render_flashes();
                  $( this ).dialog( 'close' );
              } else {
            	  alert('Debe seleccionar una plantilla de mensaje');
            	  $( this ).dialog( 'close' );
              }
                     
            },
            Cancel: function() {
              $( this ).dialog( 'close' );
            }
          }
      });
      
      $( "#opener" ).click(function() {
        $( "#dialog" ).dialog( "open" );
        return false;
      });

      
      $("#loading-div-background").css({ opacity: 0.8 });
});

function procesando() {
    $("#loading-div-background").show();
}


function listo() {
    $("#loading-div-background").hide();
}
</script>
  


<!--  Alertas Boxes -->
<div id="dialog" title="Confirmación de envío">
    <p style="text-align: left;">
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    <strong>Está seguro que desea enviar este comunicado?</strong>
    Una vez enviado el comunicado al padre de familia no puede ser borrado.
    </p>
</div>

<div id="loading-div-background">
    <div id="loading-div" class="ui-corner-all" >
      <img style="height:70px;margin:10px;" src="/images/loader_barra.gif" alt="Enviando comunicado..."/>
      <h2 style="color:gray;font-weight:normal;">Enviando comunicado....</h2>
     </div>
</div>

<div id="main_container">
	<div id="sf_admin_container">

<?php if (sizeof($materias) == 0 ): ?>
		<div id="sf_admin_header">
			<h1>Administración de Comunicados</h1>
			
             <div id="flashes-div">
                <?php include_partial('adminComunicados/partial_flashes'); ?>
             </div>   
             
			<p>Su perfil no tiene cátedras asociadas:</p>
		</div>

<?php else: ?>
		<div id="sf_admin_header">
			<h1>Administración de Comunicados</h1>
		</div>

		<div id="sf_admin_content" class="sf_forms" style="text-align: left;">
            
             <div id="flashes-div">
                <?php include_partial('adminComunicados/partial_flashes'); ?>
             </div>   
         
            <form>
            <input type="hidden" id="profesor-id" value="<?php echo $pro ?>">
            <!-- ********************** -->
            <!-- Listado de Grados -->
            
            <select id="grado-materia-list" onchange="mostrar_items(this); return false;">
                <option value="" selected="selected">Elija un Grado / Materia...</option>
            <?php foreach ($materias as $materia): ?>
                <option value="<?php echo $materia->getGraId() ?>"><?php echo $materia->getGra()." / ". $materia->getMat(); ?></option>
            <?php endforeach; ?> 
            </select>
            
            
            <!-- ********************** -->
            <!-- Listado de Estudiantes -->
            
            <div class="clear"></div>
            <div class="form-horiz">
                <div id="loader-est" style="display: none;">
                    <?php echo image_tag('/images/ajax-loader.gif', array('height'=>"16") ); ?>
                </div>
                
                <div id="estudiantes-list" style="display: none;">
                    <?php include_partial('partial_estudiantes', array('estudiantes' => $estudiantes)); ?>
                </div>
            </div>
            
            
            <!-- ********************** -->
            <!-- Listado de Estudiantes -->
            
            <div class="clear"></div>
            <div class="form-horiz">
                <div id="loader-msg" style="display: none;">
                    <?php echo image_tag('/images/ajax-loader.gif', array('height'=>"16") ); ?>
                </div>
                
                <div id="mensajes-list" style="display: none;">
                    <?php include_partial('partial_plantillas', array('plantillas' => $plantillas)); ?>
                </div>
                
                <button id="opener">Enviar Comunicado</button>
  
            </div>
            </form>
            
            <!-- ********************** -->
            <!-- Tabla de Comunicados recibidos -->
    		<h2>Comunicados Recibidos</h2>
		
            <div class="clear"></div>
            <div class="form-horiz">
                <div id="loader-tabla" style="display: none;">
                    <?php echo image_tag('/images/loader_barra.gif', array('height'=>"70") ); ?>
                </div>
                
                <div id="com-recibidos-table">
                    <?php include_partial('partial_recibidos', array('comunicados_rep' => $comunicados_rep)); ?>
                </div>
            </div>
            
            <!-- ********************** -->
            <!-- Tabla de Comunicados enviados -->
    		<h2>Comunicados Enviados </h2>
                <div class="clear"></div>
                <div class="form-horiz">
                    <div id="loader-tabla" style="display: none;">
                        <?php echo image_tag('/images/loader_barra.gif', array('height'=>"70") ); ?>
                    </div>
                    
                    <div id="com-enviados-table">
                        <?php include_partial('partial_comunicados', array('comunicados' => $comunicados)); ?>
                    </div>
                </div>
		
		</div>
		
		
		<div id="sf_admin_footer"></div>

<?php endif; ?>

	</div>
</div>