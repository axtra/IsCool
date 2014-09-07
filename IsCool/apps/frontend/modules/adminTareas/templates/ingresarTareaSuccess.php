<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/default.css" />


<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.ui.datepicker-es.js"></script>


<div id="main_container">
	<div id="sf_admin_container">

		<div id="sf_admin_header">
			<h1>Tareas de <?php echo $materia_grado->getGra()->getGraNombre(); ?></h1>
			<h3>Ingresar tarea de <?php echo $materia_grado->getMat()->getMatNombre(); ?></h3>
		</div>
        

		<div id="sf_admin_content" style="text-align: left;">

		    <div class="sf_admin_form">
            <?php include_partial('form', array('form' => $form, 'mxg_id' => $mxg_id))?>
		    </div>
			
            <!-- Tabla de Materias asignadas al Grado -->
            <h2>Tareas asignadas</h2>
        
            <div class="clear"></div>
            

            
            <div id="form3" class="form-horiz">
                <div id="loader" style="display: none;">
                    <?php echo image_tag('/images/loader_barra.gif', array('height'=>"64") ); ?>
                </div>
                
                <div id="items_div">
                    <?php include_partial('partial_items', array('tareas' => $tareas, 'mxg_id' => $mxg_id)); ?>
                </div>
            </div>
    
		</div>
		<div id="sf_admin_footer"></div>
	</div>
</div>