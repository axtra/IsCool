<script>
$(function() {
    $( ".collapse-recibidos" )
      .button({
	      icons: {
  	        primary: "ui-icon-circle-triangle-n"
  	      },
      })
      .click(function( event ) {
        event.preventDefault();
        $(this).data('state', ($(this).data('state') == 'disarm') ? 'arm' : 'disarm');
        $( '#body-recibidos' ).toggle("slow");
    	$( '.collapse-recibidos' ).button({
            icons: {
                primary: ($(this).data('state') == "disarm") ? "ui-icon-circle-triangle-s" : "ui-icon-circle-triangle-n"
            },
            label: ($(this).data('state') == "disarm") ? "Expandir listado" : "Contraer listado"
        });

      });
});
</script>

<button class="collapse-recibidos collapse-button">Contraer listado</button>
<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Estudiante</th>
          <th class="ui-th-column">Mensaje</th>
          <th class="ui-th-column">Fecha</th>
        </tr>
      </thead>
      <tbody id="body-recibidos">
<?php if( sizeof($comunicados_rep) > 0 ): ?>

	<?php foreach ($comunicados_rep as $comunicado_rep): ?>
          
          <?php
                // Sacar los detalles asociados con la materia
//                 $profesor = Doctrine::getTable('emdiProfesor')->find($materia['pro_id']);
//                 $nombre_materia = Doctrine::getTable('emdiMateria')->find($materia['mat_id']);
          ?>
                <tr>
                    <td class="sf_admin_text">
                      <?php
                        echo $comunicado_rep->getEst().'<br /><strong>'.$comunicado_rep->getEst()->getGra().'</strong>'; 
                      ?>
                    </td>
                    <td class="sf_admin_text tarea-contenido"><?php echo $comunicado_rep['mre_contenido']; ?></td>
                    <td class="sf_admin_text"><?php echo $comunicado_rep['created_at']; ?></td>
                </tr>
	<?php endforeach; ?>

<?php else: ?>
          <tr>
              <td colspan="3">No tiene comunicados recibidos.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>
