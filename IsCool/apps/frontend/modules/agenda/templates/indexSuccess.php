<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/default.css" />

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"> -->
    
<!--  NOTA: usar cdn   -->
  <!-- Bootstrap-switch para checkboxes de agenda -->
  <script src="/js/bootstrap-checkbox.min.js" defer></script>

  
<div id="loading-div-background" style="z-index: 10000">
    <div id="loading-div" class="ui-corner-all" >
      <img style="height:70px;margin:10px;" src="/images/loader_barra.gif" alt="Enviando comunicado..."/>
      <h2 style="color:gray;font-weight:normal;">Cargando...</h2>
     </div>
</div>


<script>
$(function() {
    var fecha = new Date('<?php echo $fecha; ?>');
    fecha.setDate(fecha.getDate()+1);
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $( '#cabecera-fecha' ).html($.datepicker.formatDate("d 'de' MM 'del' yy", fecha));
    $("#loading-div-background").css({ opacity: 0.8 });

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
            $( '#cabecera-fecha' ).html($.datepicker.formatDate("d 'de' MM 'del' yy", fecha));
        }
    });

    $( "#tareas-pendientes-container" ).dialog({
    	autoOpen: false,
        resizable: false,
        height:450,
        width:680,
        modal: true,
        buttons: {
          Cerrar: function() {
            $( this ).dialog( "close" );
          }
        }
    });

    
    
    $( "#rev-tareas-btn" ).button({
    	  icons: { primary: "ui-icon-alert" }
    }).click(function() {

    	  // Refresco el partial para tener las ultimas tareas pendientes
    	  cargar_tareas_pendientes();

    	  // Abrir dialogo luego de haber actualizado su contenido
    	  $( '#tareas-pendientes-container' ).dialog('open');
    	  
    });

});

function openPendientes() {

	$( '#dialog-tareas-pendientes' ).dialog('open');

    
}

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

    cambiar_fecha = function(fecha)
    { 
        ".
        jq_remote_function(array(
                 'url'      => '@cambiar_fecha',
                 'with'     => "'fecha=' + $( '#change-date' ).val()",
                 'loading'  => "procesando();",
                 'complete' => "listo();",
                 'script'   => 'true',
                 'update'   => 'agenda-container'))
        ."
    }

    cargar_tareas_pendientes = function()
    { 
        ".
        jq_remote_function(array(
                 'url'      => '@cargar_tareas_pendientes',
                 'loading'  => "procesando();",
                 'complete' => "listo();",
                 'script'   => 'true',
                 'update'   => 'dialog-tareas-pendientes'))
        ."
    }

");
?>

<div id="agenda-header">
	<h1 id="h1-agenda">Agenda Virtual</h1>
    <div id="datepicker" class="calendario-box"></div>
    <div id="cabecera-fecha"></div>
    <div class="cabecera-botones">
      <button id="rev-tareas-btn">Tareas Pendientes</button>
    </div>
</div>

<form>
<input type="hidden" id="change-date" />
</form>

<div id="main_container">
	<div id="sf_admin_container">       		
        
        <div class="clear"></div>
        
        <!-- Cuerpo de la agenda -->
		<div id="sf_admin_content" class="sf_forms" style="text-align: left;">


            <div class="clear"></div>
            <div class="form-horiz">
                <div id="main-loader" style="text-align: center;display: none;">
                    <?php echo image_tag('/images/loader_barra.gif', array('height'=>"70") ); ?>
                </div>
                
                <div id="agenda-container">

                <?php 
                include_partial('partial_agenda', 
                    array(
                      'tareas' => $tareas,
                      'comunicados' => $comunicados, // consolidar generales y profesor
                      'enviados' => $enviados,
                      'comunicados_gen' => $comunicados_gen,
                      'estados_tareas' => $estados_tareas
                    )
                ); 
                ?>
                </div>
            </div>
            
		</div>
		
		<div id="sf_admin_footer"></div>
	</div>
</div>

<?php $tareas_pendientes = ''; ?>

<!-- Pop-up de Tareas Pendientes -->
<div id="tareas-pendientes-container" class="dialog-pendientes" title="Tareas Pendientes">
  <div id="dialog-tareas-pendientes" >
    <?php 
       include_partial('partial_pendientes', array( 'tareas' => $tareas_pendientes)); 
    ?>
  </div>
</div>