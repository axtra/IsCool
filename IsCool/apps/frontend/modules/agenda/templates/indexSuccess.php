<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/default.css" />

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
  <script src="/js/regional.es.js"></script>

<div id="loading-div-background">
    <div id="loading-div" class="ui-corner-all" >
      <img style="height:70px;margin:10px;" src="/images/loader_barra.gif" alt="Enviando comunicado..."/>
      <h2 style="color:gray;font-weight:normal;">Enviando comunicado....</h2>
     </div>
</div>


<script>
$(function() {
    $( ".collapse-comunicados" )
      .button({
	      icons: {
  	        primary: "ui-icon-circle-triangle-n"
  	      },
      })
      .click(function( event ) {
        event.preventDefault();
        $(this).data('state', ($(this).data('state') == 'disarm') ? 'arm' : 'disarm');
        $( '#body-comunicados' ).toggle("slow");
    	$( '.collapse-comunicados' ).button({
            icons: {
                primary: ($(this).data('state') == "disarm") ? "ui-icon-circle-triangle-s" : "ui-icon-circle-triangle-n"
            },
            label: ($(this).data('state') == "disarm") ? "Expandir listado" : "Contraer listado"
        });

      });

    
    $("#loading-div-background").css({ opacity: 0.8 });

    $("#datepicker").datepicker({
        // The hidden field to receive the date
        altField: "#change-date",
        // The format you want
        altFormat: "yy-mm-dd",
        // The format the user actually sees
        dateFormat: "dd/mm/yy",
        onSelect: function (date) {
            // Your CSS changes, just in case you still need them
            $('a.ui-state-default').removeClass('ui-state-highlight');
            $(this).addClass('ui-state-highlight');
            cambiar_fecha(date);
            $( '#cabecera-fecha' ).html(date);
        }
    });

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

");
?>


<div id="loading-div-background">
    <div id="loading-div" class="ui-corner-all" >
      <img style="height:70px;margin:10px;" src="/images/loader_barra.gif" alt="Enviando..."/>
      <h2 style="color:gray;font-weight:normal;">Enviando....</h2>
     </div>
</div>

<div id="agenda-header">
	<h1 id="h1-agenda">Agenda Virtual</h1>
    <div id="datepicker" class="calendario-box"></div>
    <div id="cabecera-fecha">
      <?php
        $test = new DateTime($fecha);
        echo date_format($test, 'l'); 
      ?>
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
                      'enviados' => $enviados
                    )
                ); 
                ?>
                </div>
            </div>
            
		</div>
		
		<div id="sf_admin_footer"></div>
	</div>
</div>