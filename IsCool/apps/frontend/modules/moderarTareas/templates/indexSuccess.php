<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/default.css" />
  
<script>
$(document).ready(function() {

	poner_fecha();
    $( '#mostrar' ).hide();
    $( '#agenda-container' ).hide();
    $('#calendario-container').hide();
    
    $( "#mostrar" ).click(function() {
        mostrar_agenda();
        return false;
    });

    $.datepicker.setDefaults($.datepicker.regional['es']);
    $("#datepicker").datepicker({
        // The hidden field to receive the date
        altField: "#change-date",
        // The format you want
        altFormat: "yy-mm-dd",
        // The format the user actually sees
        dateFormat: "yy-mm-dd",
        minDate: new Date(2014, 8, 1),
        maxDate: new Date(2015, 8, 1),
        onSelect: function (date) {
            // Your CSS changes, just in case you still need them
            //$('a.ui-state-default').removeClass('ui-state-highlight');
            //$(this).addClass('ui-state-highlight');
            cambiar_fecha(date);
            var fecha = new Date(date);
            fecha.setDate(fecha.getDate()+1);
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $( '#fecha-agenda' ).html($.datepicker.formatDate("d 'de' MM 'del' yy", fecha));
        }
    });
    
    $("#loading-div-background").css({ opacity: 0.8 });
});


function procesando() {
    $("#loading-div-background").show();
    $('#mostrar').hide();    
}

function listo() {
    $("#loading-div-background").hide();
}

function poner_fecha() {
    var fecha = new Date('<?php echo $fecha; ?>');
    fecha.setDate(fecha.getDate()+1);
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $( '#fecha-agenda' ).html($.datepicker.formatDate("d 'de' MM 'del' yy", fecha));
}
</script>
  
<?php 
use_helper('jQuery'); 
echo jq_javascript_tag("

    mostrar_items = function(gra)
    {
        ".
        jq_remote_function(array(
                 'url'      => '@moderador_alumnos_por_grado',
                 'with'     => "'gra=' + gra.value",
                 'loading'  => "$('#agenda-container').hide();$('#estudiantes-list').hide();$('#calendario-container').hide();$('#mostrar').hide();",
                 'complete' => "$('#estudiantes-list').show();",
                 'script'   => 'true',
                 'update'   => 'estudiantes-list'))
        ."
    }
    
    mostrar_agenda = function()
    {
        ".
        jq_remote_function(array(
                 'url'      => '@moderador_agendas',
                 'with'     => "'est_id=' + $( '#estudiantes-select' ).val()",
                 'loading'  => "procesando;",
                 'complete' => "listo;$('#agenda-container').show();$('#calendario-container').show();",
                 'script'   => 'true',
                 'update'   => 'agenda-container'))
        ."
    }
    
    cambiar_fecha = function(fecha)
    { 
        ".
        jq_remote_function(array(
                 'url'      => '@moderador_cambiar_fecha',
                 'with'     => "'est_id=' + $( '#estudiantes-select' ).val() + '&fecha=' + $( '#change-date' ).val()",
                 'loading'  => "procesando();",
                 'complete' => "listo();",
                 'script'   => 'true',
                 'update'   => 'agenda-container'))
        ."
    }
    
");

?>

<div id="loading-div-background" style="z-index: 10000">
    <div id="loading-div" class="ui-corner-all" >
      <img style="height:70px;margin:10px;" src="/images/loader_barra.gif" alt="Cargando..."/>
      <h2 style="color:gray;font-weight:normal;">Cargando....</h2>
     </div>
</div>



<div id="selector-container"  class="sf_forms">
	    <div id="sf_admin_header">
		    <h1>Administración de Tareas <span id="fecha-agenda"></span></h1>
		    
      </div>

    <!-- ********************** -->
    <!-- Listado de Grados -->
    
    <select id="grado-materia-list" onchange="mostrar_items(this); return false;">
        <option value="" selected="selected">Elija un Grado...</option>
    <?php foreach ($grados as $grado): ?>
        <option value="<?php echo $grado->getGraId() ?>">
          <?php echo $grado ?>
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
         
    <button id="mostrar">Mostrar Agenda</button>    
</div>

<div id="calendario-container">
      <div id="datepicker" class="calendario-box"></div>
      <form>
          <input type="hidden" id="change-date" />
      </form>
</div>

<div class="clear"></div>

<div id="main_container">
	<div id="sf_admin_container">
	   
        <div class="clear"></div>
		<div id="sf_admin_content" class="sf_forms" style="text-align: left;">

          
          <!-- ********************** -->
          <!-- Agenda desplegada por estudiante seleccionado -->

          <div class="form-horiz">
              <div id="agenda-container">              
                <?php 
                include_partial('partial_agenda', 
                    array(
                      'tareas' => $tareas,
                      'comunicados' => $comunicados, 
                      'comunicados_gen' => $comunicados_gen,
                      'estudiante' => $estudiante,
                    )
                ); 
                ?>
              </div>
          </div>

		</div>

	</div>
</div>