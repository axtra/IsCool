<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/default.css" />

<script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script src="/sfFormExtraPlugin/js/double_list.js"></script>

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
	 selector:'#com-gen',
	 entity_encoding : 'raw',
	 height : 400,
	 menubar: false
});

tinymce.init({
	selector:'#plantilla-select',
	entity_encoding : 'raw',
	height : 400,
	menubar: false
});

$(function() {
	$( "#com_gen_btn" )
      .button({
	      icons: {
  	        primary: "ui-icon-mail-closed"
  	      },
      })
      .click(function( event ) {
        event.preventDefault();
        enviar_comunicado_general();
        render_flashes_gen();
      });
});

function procesando() {
    $("#loading-div-background").show();
}


function listo() {
    $("#loading-div-background").hide();
}

$(function() {
    $( "#tabs" ).tabs();
});

function countChar(val) {
    var len = val.value.length;
    if (len > 2000) {
      val.value = val.value.substring(0, 2000);
      $('#charNum').addClass("error");
    } else {
      $('#charNum').text(2000 - len);
      $('#charNum').addClass("notice");
    }
};

</script>
  
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
       $('#mensajes-list').show();
       $('#opener').show();
    }


    enviar_comunicado = function()
    {      
        var msgcuerpo = tinymce.get('plantilla-select').getContent();
        //msgcuerpo = msgcuerpo.replace(/&nbsp;/ig, ' ');
        ".
        jq_remote_function(array(
                 'url'      => '@enviar_comunicado_profesor',
                 'with'     => "'ref=' + $( '#ref' ).val() + '&est_id=' + $( '#estudiantes-select' ).val() + '&msg=' + msgcuerpo + '&pro=' + $( '#profesor-id' ).val()",
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
                 'loading'  => "$('#flashes-div').hide();",
                 'complete' => "$('#flashes-div').show();",
                 'script'   => 'true',
                 'update'   => 'flashes-div'))
        ."
    }

    render_flashes_gen = function()
    {
        ".
        jq_remote_function(array(
                 'url'      => '@render_flashes',
                 'loading'  => "$('#flashes-div-gen').hide();",
                 'complete' => "$('#flashes-div-gen').show();",
                 'script'   => 'true',
                 'update'   => 'flashes-div-gen'))
        ."
    }

    enviar_comunicado_general = function()
    {
        // Recopilar los grados y guardarlos en un array
        var selectedValues = []; 
        $('#cg_gra_id option').each(function(i, selected){ 
          selectedValues[i] = $(selected).val(); 
        });
    
        // Arreglar los espacios que se colocan en TinyMCE
        var cuerpo = tinymce.get('com-gen').getContent();
        //cuerpo = cuerpo.replace(/&nbsp;/ig, ' ');
    
        if (selectedValues.length == 0) {
            alert('Debe seleccionar uno o mas grados.');
        } else {
        ".
        jq_remote_function(array(
                 'url'      => '@enviar_comunicado_general',
                 'with'     => "'ref_gen=' + $( '#ref-gen' ).val() + '&com_gen=' + cuerpo + '&grados=' + selectedValues",
                 'loading'  => "procesando();",
                 'complete' => "listo();",
                 'script'   => 'true',
                 'update'   => 'com-gen-enviados-table'))
        ."
        }
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
		
		  <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Comunicados Generales</a></li>
              <li><a href="#tabs-2">Comunicados por Alumno</a></li>
            </ul> 
            
            
            <div id="tabs-1">
                 <div>
                 <div id="flashes-div-gen">
                    <?php include_partial('adminComunicados/partial_flashes'); ?>
                 </div>   
                
                <form>
                  <table>
                    <tbody>
                      <tr>
                        <th>Referencia</th>
                        <td>
                          <input type="text" id="ref-gen" />
                        </td>
                      </tr>
                      <tr>
                        <th>Contenido</th>
                        <td>
                          <textarea id="com-gen" cols="40" rows="15"></textarea>
                        </td>
                      </tr>
                      <!-- Lista doble de Grados -->
                      
                    <tr>
                    	<th>Destinatarios:</th>
                    	<td>
                    	<div class="double_list">
                			<div style="float: left">
                				<div class="double_list_label">Enviar a:</div>
                				<select size="10" class="double_list_select-selected"
                					name="cg_gra_id[]" multiple="multiple"
                					id="cg_gra_id">

                				</select>
                			</div>
                			
             <div style="float: left; margin-top: 2em">
             <a href="#" onclick="sfDoubleList.move('unassociated_cg_gra_id', 'cg_gra_id'); return false;">
                <img src="/sfFormExtraPlugin/images/previous.png" alt="associate" /></a>
             <br>
             <a href="#" onclick="sfDoubleList.move('cg_gra_id', 'unassociated_cg_gra_id'); return false;">
                <img src="/sfFormExtraPlugin/images/next.png" alt="unassociate"></a>
             </div>
                			
                			<div style="float: left">
                				<div class="double_list_label">Grados:</div>
                				<select size="10" class="double_list_select"
                					name="unassociated_cg_gra_id[]" multiple="multiple"
                					id="unassociated_cg_gra_id">
                					
                                <?php foreach ($materias as $materia): ?>
                                    <option value="<?php echo $materia->getGraId() ?>">
                                    <?php echo $materia ?>
                                    </option>
                                <?php endforeach; ?>
                                 
                				</select>
                			</div>
                			
                			<br style="clear: both">
                			
                			<script>
                			  sfDoubleList.init(document.getElementById('cg_gra_id'), 'double_list_select');
                			</script>
                    	</div>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                      <tr><td colspan="2">
                      <!-- AQUI LOS BOTONES DE ENVIO -->
                      <button id="com_gen_btn">Enviar Comunicado</button>
                      </td></tr>
                    </tfoot>
                  </table>
                </form>
                 
                </div>
                
        		<h2>Comunicados Generales Enviados </h2>
                <div class="clear"></div>
                <div class="form-horiz">
                    <div id="loader-tabla" style="display: none;">
                        <?php echo image_tag('/images/loader_barra.gif', array('height'=>"70") ); ?>
                    </div>
                    
                    <div id="com-gen-enviados-table">
                        <?php include_partial('partial_comunicados_gen', array('comunicados_gen' => $comunicados_gen)); ?>
                    </div>
                </div>
            </div>
            
            <div id="tabs-2">
                 <div id="flashes-div">
                    <?php include_partial('adminComunicados/partial_flashes'); ?>
                 </div>   
             
                <form>
                
                <!-- Valor por default para usuario adminitrativo -->
                <input type="hidden" id="profesor-id" value="1">
                <!-- ********************** -->
                <!-- Listado de Grados -->
                
                <select id="grado-materia-list" onchange="mostrar_items(this); return false;">
                    <option value="" selected="selected">Elija un Grado...</option>
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
                <!-- Listado de Estudiantes -->
                
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
                    
                    <div id="com-enviados-table"  style="width: 900px;">
                        <?php include_partial('partial_comunicados', array('comunicados' => $comunicados)); ?>
                    </div>
                </div>
            </div>
		  </div>
		</div>
		
		
		<div id="sf_admin_footer"></div>


	</div>
</div>