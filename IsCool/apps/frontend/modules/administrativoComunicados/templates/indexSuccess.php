<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/default.css" />

  <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<style>
.ui-widget-overlay{
    position:fixed !important;
}
</style>
<script>
$(function() {
	  $( "#opener" ).hide();
      $( "#dialog" ).dialog({ 
          autoOpen: false,
          resizable: false,
          height:175,
          width:450,
          modal: true,
          buttons: {
            'Enviar Comunicado': function() {
              
              if (tinymce.get('plantilla-select').getContent()) {
            	  // Enviar comunicado
                  enviar_comunicado();
                  render_flashes();
                  $( this ).dialog( 'close' );
              } else {
            	  alert('Debe ingresar un mensaje');
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

tinymce.init({
	selector:'#plantilla-select',
	entity_encoding : 'raw',
	height : 400,
	menubar: false
});

function procesando() {
    $("#loading-div-background").show();
}


function listo() {
    $("#loading-div-background").hide();
}
</script>
  
<?php 
use_helper('jQuery'); 
echo jq_javascript_tag("

    mostrar_items = function(gra)
    {
        ".
        jq_remote_function(array(
                 'url'      => '@administrativo_alumnos_por_grado',
                 'with'     => "'gra=' + gra.value",
                 'loading'  => "$('#estudiantes-list').hide();$('#loader-est').show();$('#opener').hide();$('#mensajes-list').hide();",
                 'complete' => "$('#loader-est').hide();$('#estudiantes-list').show();",
                 'script'   => 'true',
                 'update'   => 'estudiantes-list'))
        ."
    }
    
    mostrar_mensajes = function()
    {
       $('#mensajes-list').show();
       $('#opener').show();
    }


    enviar_comunicado = function()
    {      
        var msgcuerpo = tinymce.get('plantilla-select').getContent();
        ".
        jq_remote_function(array(
                 'url'      => '@administrativo_comunicado_profesor',
                 'with'     => "'ref=' + $( '#ref' ).val() + '&est_id=' + $( '#estudiantes-select' ).val() + '&msg=' + msgcuerpo + '&pro=' + $( '#pro-id' ).val()",
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
                 'url'      => '@administrativo_render_flashes',
                 'loading'  => "$('#flashes-div').hide();",
                 'complete' => "$('#flashes-div').show();",
                 'script'   => 'true',
                 'update'   => 'flashes-div'))
        ."
    }
    
");

?>


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

		<div id="sf_admin_header">
			<h1>Administración de Comunicados</h1>
		</div>

		<div id="sf_admin_content" class="sf_forms" style="text-align: left;">
		
                 <div id="flashes-div">
                    <?php include_partial('partial_flashes'); ?>
                 </div>   
             
                <form>
                
                <!-- Valor por default para usuario adminitrativo -->
                <input type="hidden" id="profesor-id" value="1">
                <input type="hidden" id="pro-id" value="<?php echo $pro; ?>">
                <!-- ********************** -->
                <!-- Listado de Grados -->
                
                <select id="grado-materia-list" onchange="mostrar_items(this); return false;">
                    <option value="" selected="selected">Elija un Grado / Materia...</option>
                <?php foreach ($materias as $materia): ?>
                    <option value="<?php echo $materia->getGraId() ?>">
                      <?php echo $materia ?>
                    </option>
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
                <!-- Listado de Referencia -->
                
                <div class="clear"></div>
                <div class="form-horiz">
                    <div id="loader-msg" style="display: none;">
                        <?php echo image_tag('/images/ajax-loader.gif', array('height'=>"16") ); ?>
                    </div>
                    
                    <div id="mensajes-list" style="display: none;">
                        
                      <label for="ref">Referencia:</label>
                      <input type="text" id="ref" width="40" maxlength="100" />
                      
                      <textarea id="plantilla-select" cols="30" rows="100"></textarea>

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
		</div>
		

	</div>
</div>