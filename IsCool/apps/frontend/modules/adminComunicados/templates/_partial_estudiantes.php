
<select id="estudiantes-select" onchange="mostrar_mensajes();return false;">
    <option value="" selected="selected">Elija un Estudiante...</option>
    <?php foreach ($estudiantes as $estudiante): ?>
        <option value="<?php echo $estudiante['est_id']; ?>">
          <?php echo $estudiante['est_nombres']." ".$estudiante['est_apellidos']; ?>
        </option>
    <?php endforeach; ?> 
</select>
