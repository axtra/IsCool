

<select id="plantilla-select" name="plantilla-select" class="plantilla-select">
    <option value="" selected="selected">Haga clic para seleccionar una plantilla...</option>
    <?php foreach ($plantillas as $plantilla): ?>
        <option value="<?php echo $plantilla['pla_contenido']; ?>">
          <?php echo $plantilla['pla_contenido']; ?>
        </option>
    <?php endforeach; ?> 
</select>

<br />
  
