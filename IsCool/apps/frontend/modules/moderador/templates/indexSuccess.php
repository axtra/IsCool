<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen"	href="/sfDoctrinePlugin/css/default.css" />

<div id="loading-div-background">
    <div id="loading-div" class="ui-corner-all" >
      <img style="height:70px;margin:10px;" src="/images/loader_barra.gif" alt="Cargando..."/>
      <h2 style="color:gray;font-weight:normal;">Cargando....</h2>
     </div>
</div>

<script>

$(function() {

    $("#loading-div-background").css({ opacity: 0.8 });
    var fecha = new Date('<?php echo $fecha; ?>');
    fecha.setDate(fecha.getDate()+1);
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $( '#cabecera-fecha' ).html($.datepicker.formatDate("d 'de' MM 'del' yy", fecha));
    
    $("#datepicker").datepicker({
        // The hidden field to receive the date
        altField: "#change-date",
        // The format you want
        altFormat: "yy-mm-dd",
        // The format the user actually sees
        dateFormat: "yy-mm-dd",
        onSelect: function (date) {
            // Your CSS changes, just in case you still need them
            $('a.ui-state-default').removeClass('ui-state-highlight');
            $(this).addClass('ui-state-highlight');
            cambiar_fecha(date);

            var fecha = new Date(date);
            fecha.setDate(fecha.getDate()+1);
            $( '#cabecera-fecha' ).html($.datepicker.formatDate("d 'de' MM 'del' yy", fecha));
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
                 'url'      => '@cambiar_fecha_moderador',
                 'with'     => "'fecha=' + $( '#change-date' ).val()",
                 'loading'  => "procesando();",
                 'complete' => "listo();",
                 'script'   => 'true',
                 'update'   => 'agenda-container'))
        ."
    }

");
?>

<div id="agenda-header">
	<h1 id="h1-agenda">Moderación</h1>
    <div id="datepicker" class="calendario-box"></div>
    <div id="cabecera-fecha">
    </div>
</div>

<form>
<input type="hidden" id="change-date" />
</form>

<div id="main_container">
	<div id="sf_admin_container">       		
        <!-- Cuerpo de la agenda -->
		<div id="sf_admin_content" class="sf_forms" style="text-align: left;">


            <div class="clear"></div>
            <div class="form-horiz">
                <div id="main-loader" style="text-align: center;display: none;">
                    <?php echo image_tag('/images/loader_barra.gif', array('height'=>"70") ); ?>
                </div>
                
                <div id="agenda-container">
                <?php 
                  include_partial('partial_mensajes', array('mensajes' => $mensajes, 'profesores' => $profesores)); 
                ?>
                </div>
            </div>
            
		</div>
		
		<div id="sf_admin_footer"></div>
	</div>
</div>