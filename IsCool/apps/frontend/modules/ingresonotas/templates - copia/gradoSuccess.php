<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/default.css" />





<div id="sf_admin_container">


    <div id="sf_admin_content" style="text-align:left;">
        
        <ul>
            <?php foreach ($estudiantes as $estudiante): ?>
                <li>
                    <a href="<?php echo url_for('ingresonotas/ingresoNotasAlumno?est='.$estudiante->getEstId() )  ?>">
                        <?php echo $estudiante->getEstNombres()." ".$estudiante->getEstApellidos() ?>
                    </a>
                </li>
            <?php endforeach; ?>    
        </ul>
        
    </div>
    
    
</div>