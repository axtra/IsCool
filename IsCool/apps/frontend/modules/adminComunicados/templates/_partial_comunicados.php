
<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Estudiante</th>
          <th class="ui-th-column">Referencia</th>
          <th class="ui-th-column">Mensaje</th>
          <th class="ui-th-column">Fecha</th>
        </tr>
      </thead>
      <tbody>
<?php if( sizeof($comunicados) > 0 ): ?>

	<?php foreach ($comunicados as $comunicado): ?>
          
          <?php
                // Sacar los detalles asociados con la materia
//                 $profesor = Doctrine::getTable('emdiProfesor')->find($materia['pro_id']);
//                 $nombre_materia = Doctrine::getTable('emdiMateria')->find($materia['mat_id']);
          ?>
                <tr class="sf_admin_row ui-widget-content">
                    <td class="sf_admin_text"><?php echo $comunicado['est_id']; ?></td>
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
