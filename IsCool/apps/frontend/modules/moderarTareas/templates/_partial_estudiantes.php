<script>
$(document).ready(function() {

    $( "#estudiantes-select" ).on('change', function() {
      $('#mostrar').show();
    });
});
</script>


<select id="estudiantes-select">
    <option value="" selected="selected">Elija un Estudiante...</option>
    <?php foreach ($estudiantes as $estudiante): ?>
        <option value="<?php echo $estudiante['est_id']; ?>">
          <?php echo $estudiante['est_nombres']." ".$estudiante['est_apellidos']; ?>
        </option>
    <?php endforeach; ?> 
</select>