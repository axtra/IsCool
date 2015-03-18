<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/default.css" />

<div id="main_container">
<div id="sf_admin_container">

    <div id="sf_admin_header">
		<h1>Estudiantes tutoriados: </h1>
    </div>
    
    <div id="sf_admin_content" style="text-align:left;">
        
        <ul>
            <?php foreach ($estudiantes as $estudiante): ?>
                <li>
                    <a href="<?php echo url_for('tutoria/notasEstudiante?est='.$estudiante->getEstId() )  ?>">
                        <?php echo $estudiante->getEstNombres()." ".$estudiante->getEstApellidos() ?>
                    </a>
                </li>
            <?php endforeach; ?>    
        </ul>
        
    </div>
    <div id="sf_admin_footer">
    </div>
    
</div>


</div>