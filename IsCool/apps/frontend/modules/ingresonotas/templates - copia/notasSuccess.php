<?php use_helper('Url'); ?>
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/default.css" />
<link href="/pags_portal/css/libretas.css" rel="stylesheet" type="text/css">

<div id="sf_admin_container">
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>
 
<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>
</div>

<br />




<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="700" height="40" valign="top"><table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="20" align="center" class="titulo">REPORTE DE CALIFICACIONES</td>
        </tr>
      <tr>
        <td height="20" colspan="20" bgcolor="#262626" class="subtitulos">DATOS INFORMATIVOS</td>
        </tr>
      <tr>
        <td height="10" colspan="20"><img src="/pags_portal/notas/imagenes/espacio.png" width="700" height="10"></td>
        </tr>
      <tr>
        <td height="20" colspan="4" class="subtitulos2">&nbsp;&nbsp;&nbsp;MATERIA:</td>
        <td height="20" colspan="10" class="eras1"><?php echo $materia->getMatNombre(); ?></td>
        <td height="20" colspan="3" class="subtitulos2">&nbsp;&nbsp; A&Ntilde;O LECTIVO:</td>
        <td height="20" colspan="3" class="eras1">2012/2013</td>
        </tr>
      <tr>
        <td height="20" colspan="4" class="subtitulos2">&nbsp;&nbsp; PROFESOR:</td>
        <td height="20" colspan="16" class="eras1">
<?php 
            
            if ($sf_user->hasCredential('admin')) {
                
                echo "Administrador";
            } else {
                
                echo $profesor->getProNombres().' '.$profesor->getProApellidos();
            }
?>
        </td>
        </tr>
      <tr>
        <td height="10" colspan="20"><img src="/pags_portal/notas/imagenes/espacio.png" width="700" height="10"></td>
        </tr>
      <tr>
        <td colspan="4" rowspan="3" align="center" valign="middle" bgcolor="#D9D9D9" class="asignaturas"><p><?php echo $grado->getGraNombre(); ?></p></td>
        <td height="20" colspan="6" bgcolor="#D9D9D9" class="quimestres" style="font-size: 12px; font-weight: bold; text-align: center;">I QUIMESTRE</td>
        <td height="20" colspan="6" bgcolor="#D9D9D9" class="quimestres" style="font-size: 12px; font-weight: bold; text-align: center;">II QUIMESTRE</td>
        <td rowspan="3" bgcolor="#FFFFFF" class="subtitulos3"><img src="/pags_portal/notas/imagenes/recuperacion.png" width="32" height="114"></td>
        <td rowspan="3" bgcolor="#FFFFFF" class="subtitulos3"><img src="/pags_portal/notas/imagenes/supletorio.png" width="32" height="114"></td>
        <td rowspan="3" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio3.png" width="32" height="114"></td>
        <td rowspan="3" bgcolor="#D9D9D9" class="equivalencia"><img src="/pags_portal/notas/imagenes/equivalencia2.png" width="32" height="114"></td>
        </tr>
      <tr>
        <td height="20" colspan="3" align="center" class="porcentaje" style="font-family: Calibri; font-weight: bold; font-size: 13px;">80%</td>
        <td height="20" align="center" class="porcentaje" style="font-size: 13px; font-family: Calibri;"><span style="font-family: Calibri; font-weight: bold; font-size: 13px;">20%</span></td>
        <td rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio.png" width="35" height="95"></td>
        <td rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/equivalencia.png" width="35" height="95"></td>
        <td height="20" colspan="3" align="center" class="porcentaje" style="font-family: Calibri; font-weight: bold; font-size: 13px;">80%</td>
        <td height="20" align="center" class="porcentaje" style="font-size: 13px; font-family: Calibri;"><span style="font-family: Calibri; font-weight: bold; font-size: 13px;">20%</span></td>
        <td rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio2.png" width="35" height="95"></td>
        <td rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/equivalencia.png" width="35" height="95"></td>
        </tr>
      <tr>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial1.png" width="32" height="76"></td>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial2.png" width="32" height="76"></td>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial3.png" width="32" height="76"></td>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/examen.png" width="32" height="76"></td>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial1.png" width="32" height="76"></td>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial2.png" width="32" height="76"></td>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial3.png" width="32" height="76"></td>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/examen.png" width="32" height="76"></td>
        </tr>
        
        
<?php 

	// Function returns literal equivalent to qualification
	function nota_to_literal($nota){
		
		if($nota > 0 && $nota <= 4){
		
			return('E');
		} elseif ($nota > 4 && $nota <= 6) {
		
			return('D');
		} elseif ($nota > 6 && $nota <= 8) {
		
			return('C');
		} elseif ($nota > 8 && $nota <= 9) {
		
			return('B');
		} elseif ($nota > 9) {
		
			return('A');
		} else {
			return('');
		}
	}
    
    // Each input is composed by two members like this pattern:
    // 'ID_ESTUDIANTE-NOT_CODIGO_PARCIAL'
    foreach($estudiantes AS $estudiante):
        
        $notas_estudiante = $estudiante->getNotasMateria($materia->getMatId());
?>    
        
        
      <tr>
        <td colspan="4" class="materias">  <?php echo $estudiante->__toString() ?> </td>
        
        <td class="numeros">
                <?php echo ( $notas_estudiante->offsetExists('1') && $notas_estudiante[1] > 0 ) ? $notas_estudiante[1] : ''; ?>
        </td>
        
        <td class="numeros">
                <?php echo ( $notas_estudiante->offsetExists('2') && $notas_estudiante[2] > 0 ) ? $notas_estudiante[2] : ''; ?>
        </td>
        
        <td class="numeros">
                <?php echo ( $notas_estudiante->offsetExists('3') && $notas_estudiante[3] > 0 ) ? $notas_estudiante[3] : ''; ?>
        </td>
        
        <td class="numeros">
                <?php echo ( $notas_estudiante->offsetExists('4') && $notas_estudiante[4] > 0 ) ? $notas_estudiante[4] : ''; ?>
        </td>
        
        <td bgcolor="#D9D9D9" class="promedio1">
	        <?php 
            if ( $notas_estudiante->offsetExists('1') && $notas_estudiante->offsetExists('2') && $notas_estudiante->offsetExists('3') && $notas_estudiante->offsetExists('4') ){
                
            	$parcial_80_porcent = ( ($notas_estudiante[1] + $notas_estudiante[2] + $notas_estudiante[3]) / 3 ) * 0.8;

            	$parcial_20_porcent = $notas_estudiante[4] * 0.2;
            	
            	$promedio_1 = round($parcial_80_porcent + $parcial_20_porcent, 1);
            	
                echo ( $promedio_1 > 0 ) ? $promedio_1 : '';
            } else {
                
                echo '';
            }
            ?>
        </td>
        
        <td bgcolor="#D9D9D9" class="promedio1" style="font-family: Candara">
        	<?php 
        	if ( $notas_estudiante->offsetExists('1') && $notas_estudiante->offsetExists('2') && $notas_estudiante->offsetExists('3') && $notas_estudiante->offsetExists('4') ){
        		echo(nota_to_literal($promedio_1));
        	}
        	?>
        </td>
        
        <td class="numeros">
                <?php echo ( $notas_estudiante->offsetExists('5') && $notas_estudiante[5] > 0 ) ? $notas_estudiante[5] : ''; ?>
        </td>
        
        <td class="numeros">
                <?php echo ( $notas_estudiante->offsetExists('6') && $notas_estudiante[6] > 0 ) ? $notas_estudiante[6] : ''; ?>
        </td>
        
        <td class="numeros">
                <?php echo ( $notas_estudiante->offsetExists('7') && $notas_estudiante[7] > 0 ) ? $notas_estudiante[7] : ''; ?>
        </td>
        
        <td class="numeros">
                <?php echo ( $notas_estudiante->offsetExists('8') && $notas_estudiante[8] > 0 ) ? $notas_estudiante[8] : ''; ?>
        </td>
        
        <td bgcolor="#D9D9D9" class="promedio1">
        	<?php 
            if ( $notas_estudiante->offsetExists('5') && $notas_estudiante->offsetExists('6') && $notas_estudiante->offsetExists('7') && $notas_estudiante->offsetExists('8') ) {
                
            	$parcial_80_porcent = ( ($notas_estudiante[5] + $notas_estudiante[6] + $notas_estudiante[7]) / 3 ) * 0.8;

            	$parcial_20_porcent = $notas_estudiante[8] * 0.2;
            	
            	$promedio_2 = round($parcial_80_porcent + $parcial_20_porcent, 1);
            	
                echo ( $promedio_2 > 0 ) ? $promedio_2 : '';
            } else {
                
                echo '';
            }
            ?>
        </td>
        
        <td bgcolor="#D9D9D9" class="promedio1" style="font-family: Candara">
        <?php 
        if ( $notas_estudiante->offsetExists('5') && $notas_estudiante->offsetExists('6') && $notas_estudiante->offsetExists('7') && $notas_estudiante->offsetExists('8') ) {
        	echo(nota_to_literal($promedio_2)); 
        }	
        ?>
        </td>
        
        
        <td bgcolor="#FFFFFF" class="promedio1">
                <?php echo ( $notas_estudiante->offsetExists('9') && $notas_estudiante[9] > 0 ) ? $notas_estudiante[9] : '-'; ?>
        </td>
        
        <td bgcolor="#FFFFFF" class="promedio1">
                <?php echo ( $notas_estudiante->offsetExists('10') && $notas_estudiante[10] > 0 ) ? $notas_estudiante[10] : '-'; ?>
        </td>
        
        <td bgcolor="#D9D9D9" class="promedio1">
                <?php echo ( $notas_estudiante->offsetExists('11') && $notas_estudiante[11] > 0 ) ? $notas_estudiante[11] : ''; ?>
        </td>
        <td bgcolor="#D9D9D9" class="equivalencia2" style="font-family: Candara; font-size: 15px;">
        	<?php 
        	if($notas_estudiante->offsetExists('11') ) {
        		echo(nota_to_literal($notas_estudiante[11]));
        	}
        	?>
        </td>
      </tr>
      
      
      
     

<?php  
        
    endforeach; 
?>    


    </table></td>
  </tr>
</table>
