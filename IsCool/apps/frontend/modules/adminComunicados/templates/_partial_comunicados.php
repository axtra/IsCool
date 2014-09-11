<script>
$(function() {
    $( ".collapse-comunicados" )
      .button({
	      icons: {
  	        primary: "ui-icon-circle-triangle-n"
  	      },
      })
      .click(function( event ) {
        event.preventDefault();
        $(this).data('state', ($(this).data('state') == 'disarm') ? 'arm' : 'disarm');
        $( '#body-comunicados' ).toggle("slow");
    	$( '.collapse-comunicados' ).button({
            icons: {
                primary: ($(this).data('state') == "disarm") ? "ui-icon-circle-triangle-s" : "ui-icon-circle-triangle-n"
            },
            label: ($(this).data('state') == "disarm") ? "Expandir listado" : "Contraer listado"
        });

      });
});
</script>

<button class="collapse-comunicados collapse-button">Contraer listado</button>
<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Estudiante
          <span class="ui-icon-folder-collapse"></span>
          </th>
          <th class="ui-th-column">Referencia</th>
          <th class="ui-th-column">Mensaje</th>
          <th class="ui-th-column">Fecha</th>
        </tr>
      </thead>
      <tbody id="body-comunicados">
<?php if( sizeof($comunicados) > 0 ): ?>

	<?php foreach ($comunicados as $comunicado): ?>
          
          <?php
                // Sacar los detalles asociados con la materia
//                 $profesor = Doctrine::getTable('emdiProfesor')->find($materia['pro_id']);
//                 $nombre_materia = Doctrine::getTable('emdiMateria')->find($materia['mat_id']);
          ?>
                <tr>
                    <td class="sf_admin_text"><?php echo $comunicado->getEst(); ?></td>
                    <td class="sf_admin_text"><?php echo $comunicado['cpr_referencia']; ?></td>
                    <td class="sf_admin_text tarea-contenido"><?php echo $comunicado['cpr_contenido']; ?></td>
                    <td class="sf_admin_text"><?php echo $comunicado['created_at']; ?></td>
                </tr>
	<?php endforeach; ?>

<?php else: ?>
          <tr>
              <td colspan="4">Aún no tiene comunicados enviados.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>
