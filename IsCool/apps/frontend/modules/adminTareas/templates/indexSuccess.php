<link rel="stylesheet" type="text/css" media="screen"
	href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen"
	href="/sfDoctrinePlugin/css/default.css" />

<div id="main_container">
	<div id="sf_admin_container">

<?php if (sizeof($materias) == 0 ): ?>
		<div id="sf_admin_header">
			<h1>Administración de Tareas</h1>
			
			
			<p>Su perfil no tiene cátedras asociadas:</p>
		</div>

<?php else: ?>
		<div id="sf_admin_header">
			<h1>Administración de Tareas</h1>
			
			<p>Elija una de las cátedras dictadas:</p>
		</div>

		<div id="sf_admin_content" style="text-align: left;">

			<ul id="admin_list">
            <?php foreach ($materias as $materia): ?>
                <li><a
					href="<?php echo url_for('adminTareas/ingresarTarea?mxg='.$materia->getMxgId() )  ?>">
                        <?php echo $materia ?>
                    </a></li>
            <?php endforeach; ?>    
        </ul>

		</div>
		<div id="sf_admin_footer"></div>

<?php endif; ?>

	</div>
</div>