<script>
$(function() {
    $( ".collapse-comunicados-gen" )
      .button({
	      icons: {
  	        primary: "ui-icon-circle-triangle-n"
  	      },
      })
      .click(function( event ) {
        event.preventDefault();
        $(this).data('state', ($(this).data('state') == 'disarm') ? 'arm' : 'disarm');
        $( '#body-comunicados-gen' ).toggle("slow");
    	$( '.collapse-comunicados-gen' ).button({
            icons: {
                primary: ($(this).data('state') == "disarm") ? "ui-icon-circle-triangle-s" : "ui-icon-circle-triangle-n"
            },
            label: ($(this).data('state') == "disarm") ? "Expandir listado" : "Contraer listado"
        });

      });
});
</script>

<button class="collapse-comunicados-gen collapse-button">Contraer listado</button>
<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Referencia</th>
          <th class="ui-th-column">Mensaje</th>
          <th class="ui-th-column">Fecha</th>
        </tr>
      </thead>
      <tbody id="body-comunicados-gen">
<?php if( sizeof($comunicados_gen) > 0 ): ?>

	<?php foreach ($comunicados_gen as $comunicado): ?>
                <tr>
                    <td class="sf_admin_text"><?php echo $comunicado['cge_referencia']; ?></td>
                    <td class="sf_admin_text tarea-contenido">
                    <?php 
                      echo sfOutputEscaper::unescape($comunicado['cge_contenido']);
                      ?></td>
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
