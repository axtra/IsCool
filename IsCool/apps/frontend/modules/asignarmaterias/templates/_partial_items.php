 <table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Materia</th>
          <th class="ui-th-column">Profesor</th>
          <th class="ui-th-column">Acciones</th>
        </tr>
      </thead>
      <tbody>
<?php if( sizeof($materias) > 0 ): ?>

	<?php foreach ($materias as $materia ): ?>
          
          <?php
                // Sacar los detalles asociados con la materia
                $profesor = Doctrine::getTable('emdiProfesor')->find($materia['pro_id']);
                $nombre_materia = Doctrine::getTable('emdiMateria')->find($materia['mat_id']);
          ?>
                <tr class="sf_admin_row ui-widget-content">
                    <td class="sf_admin_text"><?php echo $nombre_materia['mat_nombre']; ?></td>
                    <td class="sf_admin_text"><?php echo $profesor['pro_nombres']." ".$profesor['pro_apellidos']; ?></td>
                    <td class="sf_admin_text">
                    <?php
                        //echo link_to(image_tag('/sf/sf_admin/images/edit.png', array('title'=>"Modificar", 'alt'=>"Modificar")),'unaruta', array('onclick' => "'facturas_edit_link('this.href + '?fac_id=".$detalle->getFacId()."'), 'facturas_edit');"));
                    ?>

                        <a style="border:0;" title="Eliminar Item" href="#" onclick="borrar_item('<?php echo $materia['mxg_id'] ?>','<?php echo $grado_id ?>'); return false;">
                            <?php echo image_tag('delete.png', array('title'=>"Eliminar Item", "border" => 0))  ?>
                        </a>
                    </td>
                </tr>
	<?php endforeach; //Final materia ?>

<?php else: ?>
          <tr>
              <td colspan="3">No hay Materias asignadas aún.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>
