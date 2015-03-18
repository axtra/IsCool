<script >
$("#flashes-div").show().delay(3000).fadeOut();
</script>

<div id="flashes-div" style="display: none;">
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice">
    <?php 
      echo $sf_user->getFlash('notice') 
    ?>
  </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error">
    <?php 
      echo $sf_user->getFlash('error') 
    ?>
  </div>
<?php endif; ?>
</div>

<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Envío</th>
          <th class="ui-th-column">Entrega</th>
          <th class="ui-th-column">Tarea</th>
          <th class="ui-th-column">Acciones</th>
        </tr>
      </thead>
      <tbody>
<?php if( sizeof($tareas) > 0 ): ?>

	<?php foreach ($tareas as $tarea ): ?>
          
          <?php
                // Sacar los detalles asociados con la materia
//                 $profesor = Doctrine::getTable('emdiProfesor')->find($materia['pro_id']);
//                 $nombre_materia = Doctrine::getTable('emdiMateria')->find($materia['mat_id']);
          ?>
                <tr class="sf_admin_row ui-widget-content">
                    <td class="sf_admin_text"><?php echo $tarea['tar_fecha_envio']; ?></td>
                    <td class="sf_admin_text"><?php echo $tarea['tar_fecha_entrega']; ?></td>
                    <td class="sf_admin_text tarea-contenido"><?php echo $tarea['tar_contenido']; ?></td>
                    <td class="sf_admin_text">
                    <?php
                        //echo link_to(image_tag('/sf/sf_admin/images/edit.png', array('title'=>"Modificar", 'alt'=>"Modificar")),'unaruta', array('onclick' => "'facturas_edit_link('this.href + '?fac_id=".$detalle->getFacId()."'), 'facturas_edit');"));
                    ?>

                        <a style="border:0;" title="Eliminar Item" href="#" onclick="borrar_item('<?php echo $tarea['tar_id'] ?>','<?php echo $tarea['mxg_id'] ?>'); return false;">
                            <?php echo image_tag('delete.png', array('title'=>"Eliminar Tarea", "border" => 0))  ?>
                        </a>
                    </td>
                </tr>
	<?php endforeach; //Final tarea ?>

<?php else: ?>
          <tr>
              <td colspan="4">No hay Tareas asignadas aún.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>
