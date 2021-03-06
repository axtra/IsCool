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
<table class="mensajes-table">
      <tbody id="body-comunicados">
<?php if( sizeof($comunicados) > 0 ): ?>

	<?php foreach ($comunicados as $comunicado): ?>
          
          <?php
                // Sacar los detalles asociados con la materia
//                 $profesor = Doctrine::getTable('emdiProfesor')->find($materia['pro_id']);
//                 $nombre_materia = Doctrine::getTable('emdiMateria')->find($materia['mat_id']);
          ?>
                <tr>
                    <th class="sf_admin_text">
                    <?php echo $comunicado->getEst(); ?>
                    - <?php echo $comunicado['cpr_referencia']; ?>
                    (<?php echo $comunicado['created_at']; ?>)
                    </th>
                </tr>
                <tr>
                    <td class="sf_admin_text tarea-contenido">
                    <?php echo sfOutputEscaper::unescape($comunicado['cpr_contenido']); ?>
                    </td>
                </tr>
	<?php endforeach; ?>

<?php else: ?>
          <tr>
              <td colspan="1">Aún no tiene comunicados enviados.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>
