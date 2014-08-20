<link href="/pags_portal/css/libretas.css" rel="stylesheet" type="text/css" />

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
        <td height="20" colspan="4" class="subtitulos2">&nbsp;&nbsp; ESTUDIANTE:</td>
        <td height="20" colspan="10" class="eras1"><?php echo $estudiante->__toString() ?></td>
        <td height="20" colspan="3" class="subtitulos2">&nbsp;&nbsp; A&Ntilde;O LECTIVO:</td>
        <td height="20" colspan="3" class="eras1">2013/2014</td>
        </tr>
      <tr>
        <td height="20" colspan="4" class="subtitulos2">&nbsp;&nbsp; NIVEL:</td>
        <td height="20" colspan="16" class="eras1"><?php echo $estudiante->getGra()->__toString(); ?></td>
        </tr>
      <tr>
        <td height="10" colspan="20"><img src="/pags_portal/notas/imagenes/espacio.png" width="700" height="10"></td>
        </tr>
      <tr>
        <td colspan="4" rowspan="3" align="center" valign="middle" bgcolor="#D9D9D9" class="asignaturas">ASIGNATURAS</td>
        <td height="20" colspan="6" bgcolor="#D9D9D9" class="quimestres" style="font-size: 12px; font-weight: bold; text-align: center;">I QUIMESTRE</td>
        <td height="20" colspan="6" bgcolor="#D9D9D9" class="quimestres" style="font-size: 12px; font-weight: bold; text-align: center;">II QUIMESTRE</td>
        <td width="35" rowspan="3" bgcolor="#FFFFFF" class="subtitulos3"><img src="/pags_portal/notas/imagenes/recuperacion.png" width="32" height="114"></td>
        <td width="35" rowspan="3" bgcolor="#FFFFFF" class="subtitulos3"><img src="/pags_portal/notas/imagenes/supletorio.png" width="32" height="114"></td>
        <td width="35" rowspan="3" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio3.png" width="32" height="114"></td>
        <td width="35" rowspan="3" bgcolor="#D9D9D9" class="equivalencia"><img src="/pags_portal/notas/imagenes/equivalencia2.png" width="32" height="114"></td>
        </tr>
      <tr>
        <td height="20" colspan="3" align="center" class="porcentaje" style="font-family: Calibri; font-weight: bold; font-size: 13px;">80%</td>
        <td width="35" height="20" align="center" class="porcentaje" style="font-size: 13px; font-family: Calibri;"><span style="font-family: Calibri; font-weight: bold; font-size: 13px;">20%</span></td>
        <td width="35" rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio.png" width="35" height="95"></td>
        <td width="35" rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/equivalencia.png" width="35" height="95"></td>
        <td height="20" colspan="3" align="center" class="porcentaje" style="font-family: Calibri; font-weight: bold; font-size: 13px;">80%</td>
        <td width="35" height="20" align="center" class="porcentaje" style="font-size: 13px; font-family: Calibri;"><span style="font-family: Calibri; font-weight: bold; font-size: 13px;">20%</span></td>
        <td width="35" rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio2.png" width="35" height="95"></td>
        <td width="35" rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/equivalencia.png" width="35" height="95"></td>
        </tr>
      <tr>
        <td width="35" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial1.png" width="32" height="76"></td>
        <td width="35" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial2.png" width="32" height="76"></td>
        <td width="35" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial3.png" width="32" height="76"></td>
        <td height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/examen.png" width="32" height="76"></td>
        <td width="35" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial1.png" width="32" height="76"></td>
        <td width="35" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial2.png" width="32" height="76"></td>
        <td width="35" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial3.png" width="32" height="76"></td>
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
			return('&nbsp;');
		}
	}
	
    $num_materias = count($materias)-3;
    $sum_quimestral_I = 0;
    $sum_quimestral_II = 0;
    $contador = 0;

    foreach ($materias AS $materia):
        
        $notas_estudiante = $estudiante->getNotasMateria($materia->getMatId());
        
?>   
      <tr>
        <td colspan="4" class="materias"><?php echo $materia->getMat()->__toString(); ?></td>
        <td class="numeros"><?php echo ( $notas_estudiante->offsetExists('1') && $notas_estudiante[1] > 0 ) ? $notas_estudiante[1] : '&nbsp;'; ?></td>
        <td class="numeros"><?php echo ( $notas_estudiante->offsetExists('2') && $notas_estudiante[2] > 0 ) ? $notas_estudiante[2] : '&nbsp;'; ?></td>
        <td class="numeros"><?php echo ( $notas_estudiante->offsetExists('3') && $notas_estudiante[3] > 0 ) ? $notas_estudiante[3] : '&nbsp;'; ?></td>
        <td class="numeros"><?php echo ( $notas_estudiante->offsetExists('4') && $notas_estudiante[4] > 0 ) ? $notas_estudiante[4] : '&nbsp;'; ?></td>
        <td bgcolor="#D9D9D9" class="promedio1">
        <?php 
            if ( $notas_estudiante->offsetExists('1') && $notas_estudiante->offsetExists('2') && $notas_estudiante->offsetExists('3') && $notas_estudiante->offsetExists('4') ){
                
            	$parcial_80_porcent = ( ($notas_estudiante[1] + $notas_estudiante[2] + $notas_estudiante[3]) / 3 ) * 0.8;
            	$parcial_20_porcent = $notas_estudiante[4] * 0.2;
            	$promedio_1 = round($parcial_80_porcent + $parcial_20_porcent, 1);
            	
                echo ( $promedio_1 > 0 ) ? $promedio_1 : '&nbsp;';
                $sum_quimestral_I += $promedio_1;
                
            } else {
                
                echo '&nbsp;';
            }
        ?>
        </td>
        <td bgcolor="#D9D9D9" class="promedio1" style="font-family: Candara">
			<?php 
        	if ( $notas_estudiante->offsetExists('1') && $notas_estudiante->offsetExists('2') && $notas_estudiante->offsetExists('3') && $notas_estudiante->offsetExists('4') ){
        		echo(nota_to_literal($promedio_1));
        	} else {
	        	echo '&nbsp;';
	        } 
        	?>
        </td>

        
        <td class="numeros"><?php echo ( $notas_estudiante->offsetExists('5') && $notas_estudiante[5] > 0 ) ? $notas_estudiante[5] : '&nbsp;'; ?></td>
        <td class="numeros"><?php echo ( $notas_estudiante->offsetExists('6') && $notas_estudiante[6] > 0 ) ? $notas_estudiante[6] : '&nbsp;'; ?></td>
        <td class="numeros"><?php echo ( $notas_estudiante->offsetExists('7') && $notas_estudiante[7] > 0 ) ? $notas_estudiante[7] : '&nbsp;'; ?></td>
        <td class="numeros"><?php echo ( $notas_estudiante->offsetExists('8') && $notas_estudiante[8] > 0 ) ? $notas_estudiante[8] : '&nbsp;'; ?></td>
        <td bgcolor="#D9D9D9" class="promedio1">
        <?php 
	        if ( $notas_estudiante->offsetExists('5') && $notas_estudiante->offsetExists('6') && $notas_estudiante->offsetExists('7') && $notas_estudiante->offsetExists('8') ){
                
            	$parcial_80_porcent = ( ($notas_estudiante[5] + $notas_estudiante[6] + $notas_estudiante[7]) / 3 ) * 0.8;
            	$parcial_20_porcent = $notas_estudiante[8] * 0.2;
            	$promedio_2 = round($parcial_80_porcent + $parcial_20_porcent, 1);
            	
                echo ( $promedio_2 > 0 ) ? $promedio_2 : '&nbsp;';
                $sum_quimestral_II += $promedio_2;
            } else {
                
                echo '&nbsp;';
            }
        ?>
        </td>
        <td bgcolor="#D9D9D9" class="promedio1" style="font-family: Candara">
        	<?php 
        	if ( $notas_estudiante->offsetExists('5') && $notas_estudiante->offsetExists('6') && $notas_estudiante->offsetExists('7') && $notas_estudiante->offsetExists('8') ){
        		echo(nota_to_literal($promedio_2));
        	} else {
	        		echo '&nbsp;';
	        } 
        	?>
        </td>
        <td bgcolor="#FFFFFF" class="promedio1"><?php echo ( $notas_estudiante->offsetExists('9') && $notas_estudiante[9] > 0 ) ? $notas_estudiante[9] : '-'; ?></td>
        <td bgcolor="#FFFFFF" class="promedio1"><?php echo ( $notas_estudiante->offsetExists('10') && $notas_estudiante[10] > 0 ) ? $notas_estudiante[10] : '-'; ?></td>
        <td bgcolor="#D9D9D9" class="promedio1"><?php echo ( $notas_estudiante->offsetExists('11') && $notas_estudiante[11] > 0 ) ? $notas_estudiante[11] : '&nbsp;'; ?></td>
        <td bgcolor="#D9D9D9" class="equivalencia2" style="font-family: Candara; font-size: 15px;">
			<?php 
	        	if($notas_estudiante->offsetExists('11') ) {
	        		echo(nota_to_literal($notas_estudiante[11]));
	        	} else {
	        		echo '&nbsp;';
	        	}   
	        ?>
        </td>
        </tr>
<?php         

        
        if( ++$contador == $num_materias) {
           //$promedio_trimestral = asdasdasdsad / $num_materias;
            break;
        }
        
    endforeach; 
?>
      
        
      <tr>
        <td width="140" colspan="4" bgcolor="#D9D9D9" class="materias" style="font-size: 12px; font-weight: bold;">PROMEDIO QUIMESTRAL</td>
        <td colspan="4" align="center" bgcolor="#D9D9D9" class="materias" style="font-family: Calibri; font-weight: bold; font-size: 16px;">
        	<?php
        		$promedio_quimestral_I = $sum_quimestral_I / $num_materias;
        		echo  ($promedio_quimestral_I > 0) ? number_format( $promedio_quimestral_I , 2) : '&nbsp;';
        	?>
        <span style="text-align: center"></span></td>
        <td colspan="2" align="center" bgcolor="#D9D9D9" class="materias" style="font-size: 16px"><?php  echo(nota_to_literal($promedio_quimestral_I)); ?></td>
        <td colspan="4" align="center" bgcolor="#D9D9D9" class="materias" style="font-family: Calibri; font-size: 16px;">
        	<?php 
        		$promedio_quimestral_II = $sum_quimestral_II / $num_materias;
        		echo  ($promedio_quimestral_II > 0) ? number_format( $promedio_quimestral_II , 2) : '&nbsp;'; 
        	?>
        </td>
        <td colspan="2" bgcolor="#D9D9D9" class="equivalencia2"><?php echo(nota_to_literal($promedio_quimestral_II)); ?></td>
        <td colspan="4">&nbsp;</td>
        </tr>
      <tr>
        <td height="10" colspan="20"><img src="/pags_portal/notas/imagenes/espacio.png" width="700" height="10"></td>
        </tr>
      <tr>
        <td colspan="20" class="subtitulos">EVALUACI&Oacute;N DEL COMPORTAMIENTO</td>
        </tr>
      <tr>
        <td height="10" colspan="20"><img src="/pags_portal/notas/imagenes/espacio.png" width="700" height="10"></td>
        </tr>
<?php 

    $num_materias = count($materias)-3;
    $contador = 0;

    foreach ($materias AS $materia):
        
        if( !(++$contador <= $num_materias) ) {
            
            $notas_estudiante = $estudiante->getNotasMateria($materia->getMatId());
            
            if($contador < $num_materias + 3) { // Para imprimir solo las dos primeras filas de las dos ultimas materias
?>

      <tr>
        <td colspan="4" class="disciplina"><?php echo $materia->getMat()->__toString(); ?></td>
        <td class="nuemeros2"><?php echo ( $notas_estudiante->offsetExists('1') && $notas_estudiante[1] > 0 ) ? $notas_estudiante[1] : '&nbsp;'; ?></td>
        <td class="nuemeros2"><?php echo ( $notas_estudiante->offsetExists('2') && $notas_estudiante[2] > 0 ) ? $notas_estudiante[2] : '&nbsp;'; ?></td>
        <td class="nuemeros2"><?php echo ( $notas_estudiante->offsetExists('3') && $notas_estudiante[3] > 0 ) ? $notas_estudiante[3] : '&nbsp;'; ?></td>
        <td class="nuemeros2"><?php echo ( $notas_estudiante->offsetExists('4') && $notas_estudiante[4] > 0 ) ? $notas_estudiante[4] : '&nbsp;'; ?></td>
        <td bgcolor="#D9D9D9" class="nuemeros2" style="font-weight: bold; font-size: 14px;">
        <?php 
            if ( $notas_estudiante->offsetExists('1') && $notas_estudiante->offsetExists('2') && $notas_estudiante->offsetExists('3') && $notas_estudiante->offsetExists('4') ){
                
            	$promedio_1 = round(($notas_estudiante[1] + $notas_estudiante[2] + $notas_estudiante[3] + $notas_estudiante[4]) / 4, 1);
                echo ( $promedio_1 > 0 ) ? $promedio_1 : '&nbsp;';
                
            } else {
                
                echo '&nbsp;';
            }
        ?>
        </td>
        <td bgcolor="#D9D9D9" class="nuemeros2" style="font-weight: bold; font-size: 14px; font-family: Candara;">
        <?php 
        	if ( $notas_estudiante->offsetExists('1') && $notas_estudiante->offsetExists('2') && $notas_estudiante->offsetExists('3') && $notas_estudiante->offsetExists('4') ){
        		echo(nota_to_literal($promedio_1));
        	} else {
	        		echo '&nbsp;';
	        } 
       	?>
        </td>
        <td class="nuemeros2"><?php echo ( $notas_estudiante->offsetExists('5') && $notas_estudiante[5] > 0 ) ? $notas_estudiante[5] : '&nbsp;'; ?></td>
        <td class="nuemeros2"><?php echo ( $notas_estudiante->offsetExists('6') && $notas_estudiante[6] > 0 ) ? $notas_estudiante[6] : '&nbsp;'; ?></td>
        <td class="nuemeros2"><?php echo ( $notas_estudiante->offsetExists('7') && $notas_estudiante[7] > 0 ) ? $notas_estudiante[7] : '&nbsp;'; ?></td>
        <td class="nuemeros2"><?php echo ( $notas_estudiante->offsetExists('8') && $notas_estudiante[8] > 0 ) ? $notas_estudiante[8] : '&nbsp;'; ?></td>
        <td bgcolor="#D9D9D9" class="nuemeros2">
        <?php 
            if ( $notas_estudiante->offsetExists('5') && $notas_estudiante->offsetExists('6') && $notas_estudiante->offsetExists('7') && $notas_estudiante->offsetExists('8') ){
                
            	$promedio_2 = round(($notas_estudiante[5] + $notas_estudiante[6] + $notas_estudiante[7] + $notas_estudiante[8]) / 4, 1);
                echo ( $promedio_2 > 0 ) ? $promedio_2 : '&nbsp;';
                
            } else {
                
                echo '&nbsp;';
            }
        ?>
        </td>
        <td bgcolor="#D9D9D9" class="equivalencia" style="text-align: center; font-weight: bold; font-size: 15px;">
        <?php 
	        if ( $notas_estudiante->offsetExists('5') && $notas_estudiante->offsetExists('6') && $notas_estudiante->offsetExists('7') && $notas_estudiante->offsetExists('8') ){
        		echo(nota_to_literal($promedio_2));
        	} else {
	        		echo '&nbsp;';
	        } 
       	?>
        </td>
        
	</tr>

<?php 

			} else { // Para imprimir la ultima materia que es DISCIPLINA
?>
      <tr>
        <td colspan="4" bgcolor="#D9D9D9" class="materias" style="font-size: 16px">&nbsp; <?php echo $materia->getMat()->__toString(); ?></td>
        <td colspan="4" align="center" bgcolor="#D9D9D9" class="materias" style="font-size: 16px; font-family: Calibri;"><?php echo $notas_estudiante->offsetExists('1') ? nota_to_literal($notas_estudiante[1]) : '&nbsp;'; ?><span style="text-align: center"></span></td>
        <td colspan="2" align="center" bgcolor="#D9D9D9" class="materias" style="font-size: 16px">
        <?php 
	        if ( $notas_estudiante->offsetExists('1') ) {
        		echo(nota_to_literal($notas_estudiante[1]));
        	} else {
	        		echo '&nbsp;';
	        } 
       	?>
        </td>
        <td colspan="4" align="center" bgcolor="#D9D9D9" class="materias" style="font-size: 16px; font-family: Calibri;"><?php echo $notas_estudiante->offsetExists('2') ? nota_to_literal($notas_estudiante[2]) : '&nbsp;'; ?><span style="text-align: center"></span></td>
        <td colspan="2" bgcolor="#D9D9D9" class="equivalencia2">
        <?php 
        if ( $notas_estudiante->offsetExists('2') ) {
        		echo(nota_to_literal($notas_estudiante[2]));
        } else {
	        		echo '&nbsp;';
	    } 	
       	?>
        </td>
      </tr>
<?php 
			}
        }
        
    endforeach; 
?>
      <tr>
        <td height="10" colspan="20"><img src="/pags_portal/notas/imagenes/espacio.png" width="700" height="10"></td>
        </tr>
      <tr>
        <td colspan="4" class="letras">A = Muy satisfactorio</td>
        <td align="center">-</td>
        <td colspan="15" class="letras">Lidera el cumplimiento de los compromisos establecidos para la sana convivencia social</td>
        </tr>
      <tr>
        <td colspan="4" class="letras">B = Satisfactorio</td>
        <td align="center">-</td>
        <td colspan="15" class="letras">Cumple los compromisos establecidos para la sana convivencia social</td>
        </tr>
      <tr>
        <td colspan="4" class="letras">C = Poco satisfactorio</td>
        <td align="center">-</td>
        <td colspan="15" class="letras">Falla ocasionalmente en el cumplimiento de los compromisos establecidos para la sana convivencia social </td>
        </tr>
      <tr>
        <td colspan="4" class="letras">D = Mejorable</td>
        <td align="center">-</td>
        <td colspan="15" class="letras">Falta reiteradamente en el cumplimiento de los compromisos establecidos para la sana convivencia social</td>
        </tr>
      <tr>
        <td colspan="4" class="letras">E = Insatisfactorio</td>
        <td align="center">-</td>
        <td colspan="15" class="letras">No cumple con los compromisos establecidos para la sana convivencia social</td>
        </tr>
      <tr>
        <td height="10" colspan="20"><img src="/pags_portal/notas/imagenes/espacio.png" width="700" height="10"></td>
      </tr>
    </table></td>
  </tr>
</table>
