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
<table class="mensajes-table">
      <tbody id="body-recibidos">
<?php if( sizeof($comunicados_rep) > 0 ): ?>

	<?php foreach ($comunicados_rep as $comunicado_rep): ?>
          
          <?php
                // Sacar los detalles asociados con la materia
//                 $profesor = Doctrine::getTable('emdiProfesor')->find($materia['pro_id']);
//                 $nombre_materia = Doctrine::getTable('emdiMateria')->find($materia['mat_id']);
          ?>
                <tr>
                    <th class="sf_admin_text">
                    <?php echo $comunicado_rep->getEst(); ?>
                    - <?php echo $comunicado_rep->getEst()->getGra(); ?>
                    (<?php echo $comunicado_rep['created_at']; ?>)
                    </th>
                </tr>
                <tr>
                    <td class="sf_admin_text">
                    <?php echo sfOutputEscaper::unescape($comunicado_rep['mre_contenido']); ?>
                    </td>
                </tr>
	<?php endforeach; ?>

<?php else: ?>
          <tr>
              <td>No tiene comunicados recibidos.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>
