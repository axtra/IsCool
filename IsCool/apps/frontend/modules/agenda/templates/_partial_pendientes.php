<script>
$(function() {
    $( '#tabla-tareas-pendientes' ).tooltip({
      track: true
    });
});
</script>
  <style>
  label {
    display: inline-block;
    width: 5em;
  }
  .ui-tooltip {
    width: 210px;
  }
  </style>

    <div id="sf_admin_container">
      <table id="tabla-tareas-pendientes">
      
        <thead >
          <tr>
            <th class="ui-th-column">Asignatura</th>
            <th class="ui-th-column">F. Envío</th>
            <th class="ui-th-column">F. Entrega</th>
<!--             <th class="ui-th-column">Realizada</th> -->
          </tr>
        </thead>
        
      <?php foreach ($tareas as $tarea): ?>
        <tr>
          <td>
            <a href="#" title="<?php echo $tarea->getTar()->getTarContenido(); ?>"><?php echo $tarea->getTar()->getMxg()->getMat(); ?></a>
          </td>
          <td>
            <?php echo $tarea->getTar()->getTarFechaEnvio(); ?>
          </td>
          <td>
            <?php echo $tarea->getTar()->getTarFechaEntrega(); ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </table>
    </div>
