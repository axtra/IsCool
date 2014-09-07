                
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice">
    <?php 
      echo $sf_user->getFlash('notice') 
    ?>
  </div>
<?php endif; ?>
        
<table>
      <thead class="detalle-table-header">
        <tr>
          <th class="ui-th-column">Fecha de Entrega</th>
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
                    <td class="sf_admin_text"><?php echo $tarea['tar_fecha_entrega']; ?></td>
                    <td class="sf_admin_text"><?php echo $tarea['tar_contenido']; ?></td>
                    <td class="sf_admin_text">
                    <?php
                        //echo link_to(image_tag('/sf/sf_admin/images/edit.png', array('title'=>"Modificar", 'alt'=>"Modificar")),'unaruta', array('onclick' => "'facturas_edit_link('this.href + '?fac_id=".$detalle->getFacId()."'), 'facturas_edit');"));
                    ?>


                    </td>
                </tr>
	<?php endforeach; //Final tarea ?>

<?php else: ?>
          <tr>
              <td colspan="3">No hay Tareas asignadas aún.</td>
          </tr>
<?php endif; ?>

    </tbody>
</table>
