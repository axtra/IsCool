
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/default.css" />

<br />

<div style="text-align: left;padding: 15px;">
<div id="sf_admin_container">
    <h1>Ingreso de Notas:</h1>

    
    <div id="sf_admin_header">

	
    </div>


    <div id="sf_admin_content">
        
        <ul>
            <?php foreach ($grados as $grado): ?>
                <li>
                  <?php  if($sf_user->hasCredential('admin') ) : ?>
                	<a href="<?php echo url_for('ingresonotas/ingresoAlumnos?gra='.$grado->getGraId() )  ?>" title="Ingresar por alumnos">
	                	<?php echo $grado->getGra()->getGraNombre() ?> 
                	</a>
               	  <?php  else: ?>
               	  		<?php echo $grado->getGra()->getGraNombre() ?>
				  <?php  endif; ?>
                	:
                    <a href="<?php echo url_for('ingresonotas/ingresar?gra='.$grado->getGraId().'&mat='.$grado->getMat()->getMatId() )  ?>" title="Ingresar por materia">
                        <?php echo $grado->getMat()->getMatNombre() ?>
                    </a>
                </li>
            <?php endforeach; ?>    
        </ul>
        
    </div>

    <div id="sf_admin_footer">
    </div>
</div>


</div>