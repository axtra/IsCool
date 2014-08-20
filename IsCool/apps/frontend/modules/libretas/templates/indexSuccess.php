
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/default.css" />



<br />

<div style="text-align: left;padding: 15px;">
<div id="sf_admin_container">
    <h1>Generaci&oacute;n de Libretas: </h1>

    
    <div id="sf_admin_header">

	<p>Elija el grado que para el que desea generar las libretas.</p>
    </div>


    <div id="sf_admin_content">
        
        <ul>
            <?php foreach ($grados as $grado): ?>
                <li>
                	<a href="<?php echo url_for('libretas/exportarAlumnos?gra='.$grado->getGraId() )  ?>" title="Exportar por alumnos">
	                	<?php echo $grado->getGraNombre() ?> 
                	</a>
                </li>
            <?php endforeach; ?>    
        </ul>
        
    </div>

    <div id="sf_admin_footer">
    </div>
</div>


</div>