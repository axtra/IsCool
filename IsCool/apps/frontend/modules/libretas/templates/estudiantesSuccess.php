.....................
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/default.css" />



<br />

<div id="sf_admin_container" style="text-align: left;padding: 15px;">
    <h1>Exportaci&oacute;n de Libreta por estudiante: </h1>

    
    <div id="sf_admin_header">

	<p>Elija el estudiante para exportar su libreta.</p>
    </div>

    <div id="sf_admin_content" style="text-align:left;">
        
        <ul>
            <?php foreach ($estudiantes as $estudiante): ?>
                <li>
                    <a href="<?php echo url_for('libretas/exportar?est='.$estudiante->getEstId() )  ?>">
                        <?php echo $estudiante->getEstNombres()." ".$estudiante->getEstApellidos() ?>
                    </a>
                </li>
            <?php endforeach; ?>    
        </ul>
        
    </div>
    
    
</div>