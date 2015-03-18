<script>
$(function() {
    abrir_dialogo = function(dialogo, titulo){
        //event.preventDefault();
        $( dialogo ).dialog("open");
        $( dialogo ).dialog( "option", "title", titulo );

    };
});
</script>
<h2><?php echo $estudiante ?></h2>


  <div id="tareas-container">
  <?php 
      include_partial('partial_tareas', 
          array('tareas' => $tareas)
      ); 
  ?>
  </div>
      
  <div class="clear"></div>

  <div id="comunicados-container">
  <?php 
      include_partial('partial_comunicados', 
          array('comunicados' => $comunicados, 
                'comunicados_gen' => $comunicados_gen
          )
      ); 
  ?>
  </div> 