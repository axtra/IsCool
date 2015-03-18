<script>
$(function() {
    $( "#tabs" ).tabs();

    abrir_dialogo = function(dialogo, titulo){
        $( dialogo ).dialog("open");
        $( dialogo ).dialog( "option", "title", titulo );

    };
});

// Hacer una funcion que refresque los dos partials cuando cambie el calendario

</script>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Tareas - Comunicados</a></li>
    <li><a href="#tabs-2">Enviar Nota</a></li>
  </ul>
  
  <div id="tabs-1">  		    
      <h2>Tareas</h2>
      <div id="tareas-container">
      <?php 
          include_partial('partial_tareas', 
              array(
                'tareas' => $tareas,
                'estados_tareas' => $estados_tareas
              )
          ); 
      ?>
      </div>
      
      <div class="clear"></div>

      <div id="comunicados-container">
      <?php 
          include_partial('partial_comunicados', 
              array('comunicados' => $comunicados, 'comunicados_gen' => $comunicados_gen)
          ); 
      ?>
      </div>
  </div>
  
  <div id="tabs-2">
      <h2>Notas enviadas</h2>
      <div id="enviados-container">
      <?php 
          include_partial('partial_enviados',
              array('enviados' => $enviados)
          ); 
      ?>
      </div>
  </div>
</div>