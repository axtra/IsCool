<?php use_helper('Url'); ?>
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/global.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/sfDoctrinePlugin/css/default.css" />
<link href="/pags_portal/css/libretas.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
input.tipograf {
    color: #000;
    font: bold 13px Verdana,Geneva,sans-serif;
    width: 35px;
    text-align: center;
}
-->
</style>

<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>
 
<?php if ($sf_user->hasFlash('error')): ?>
  <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>


<br />

<script type="text/javascript">
<!--
	// copyright 1999 Idocs, Inc. http://www.idocs.com
	// Distribute this script freely but keep this notice in place
	function numbersonly(myfield, e, dec) {
	    var key;
	    var keychar;
	
	    if (window.event)
	       key = window.event.keyCode;
	    else if (e)
	       key = e.which;
	    else
	       return true;
	    keychar = String.fromCharCode(key);
	
	    // control keys
	    if ((key==null) || (key==0) || (key==8) || 
	        (key==9) || (key==13) || (key==27) )
	       return true;
	
	    // numbers
	    else if ((("0123456789.").indexOf(keychar) > -1))
	       return true;
	
	    // decimal point jump
	    else if (keychar == ",")
	       {
		   alert('Use el punto (.) como divisor decimal');
	       return false;
	       }
	    else
	       return false;
	}

    function validaNota(nota){
        if (nota > 10) {
            alert('La nota solo puede ser de 0 a 10');
        }
    }
//-->
</script>



<?php echo form_tag('ingresonotas/procesar', array('name' => 'NotasForm', 'multipart' => true)); ?> 
<input type="hidden" name="mat" value="<?php echo $mat_id ?>" />
<input type="hidden" name="gra" value="<?php echo $gra_id ?>" />
    
    
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="690" height="40" valign="top"><table width="691" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="17" align="center" class="titulo">REPORTE DE CALIFICACIONES</td>
        </tr>
      <tr>
        <td height="20" colspan="17" bgcolor="#262626" class="subtitulos">DATOS INFORMATIVOS</td>
        </tr>
      <tr>
        <td height="10" colspan="17"><img src="/pags_portal/notas/imagenes/espacio.png" width="500" height="10"></td>
        </tr>
      <tr>
        <td height="20" colspan="4" class="subtitulos2">&nbsp;&nbsp;&nbsp;MATERIA:</td>
        <td height="20" colspan="9" class="eras1"><?php echo $materia->getMatNombre(); ?></td>
        <td height="20" colspan="2" class="subtitulos2">&nbsp;&nbsp; A&Ntilde;O LECTIVO:</td>
        <td height="20" colspan="2" class="eras1">2013/2014</td>
        </tr>
      <tr>
        <td height="20" colspan="4" class="subtitulos2">&nbsp;&nbsp; PROFESOR:</td>
        <td height="20" colspan="13" class="eras1">
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
        <td height="10" colspan="17"><img src="/pags_portal/notas/imagenes/espacio.png" width="500" height="10"></td>
        </tr>
      <tr>
        <td colspan="4" rowspan="3" align="center" valign="middle" bgcolor="#D9D9D9" class="asignaturas"><p><?php echo $grado->getGraNombre(); ?></p></td>
        <td height="20" colspan="5" bgcolor="#D9D9D9" class="quimestres" style="font-size: 12px; font-weight: bold; text-align: center;">I QUIMESTRE</td>
        <td height="20" colspan="5" bgcolor="#D9D9D9" class="quimestres" style="font-size: 12px; font-weight: bold; text-align: center;">II QUIMESTRE</td>
        <td width="40" rowspan="3" bgcolor="#FFFFFF" class="subtitulos3"><img src="/pags_portal/notas/imagenes/recuperacion.png" width="32" height="114"></td>
        <td width="40" rowspan="3" bgcolor="#FFFFFF" class="subtitulos3"><img src="/pags_portal/notas/imagenes/supletorio.png" width="32" height="114"></td>
        <td width="40" rowspan="3" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio3.png" width="32" height="114"></td>
        </tr>
      <tr>
        <td height="20" colspan="3" align="center" class="porcentaje" style="font-family: Calibri; font-weight: bold; font-size: 13px;">80%</td>
        <td width="40" height="20" align="center" class="porcentaje" style="font-size: 13px; font-family: Calibri;"><span style="font-family: Calibri; font-weight: bold; font-size: 13px;">20%</span></td>
        <td width="40" rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio.png" width="35" height="95"></td>
        <td height="20" colspan="3" align="center" class="porcentaje" style="font-family: Calibri; font-weight: bold; font-size: 13px;">80%</td>
        <td width="40" height="20" align="center" class="porcentaje" style="font-size: 13px; font-family: Calibri;"><span style="font-family: Calibri; font-weight: bold; font-size: 13px;">20%</span></td>
        <td width="40" rowspan="2" bgcolor="#D9D9D9" class="subtitulos3"><img src="/pags_portal/notas/imagenes/promedio2.png" width="35" height="95"></td>
        </tr>
      <tr>
        <td width="40" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial1.png" width="32" height="76"></td>
        <td width="40" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial2.png" width="32" height="76"></td>
        <td width="40" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial3.png" width="32" height="76"></td>
        <td width="40" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/examen.png" width="32" height="76"></td>
        <td width="40" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial1.png" width="32" height="76"></td>
        <td width="40" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial2.png" width="32" height="76"></td>
        <td width="40" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/parcial3.png" width="32" height="76"></td>
        <td width="40" height="80" class="subtitulos3"><img src="/pags_portal/notas/imagenes/examen.png" width="32" height="76"></td>
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
        
        $input_id = $estudiante->getEstId().'-';
        $notas_estudiante = $estudiante->getNotasMateria($materia->getMatId());
?>    
        
        
      <tr>
        <td colspan="4" class="materias">  <?php echo $estudiante->__toString() ?> </td>
        
        <td class="numeros">
        	<?php if( $notas_habilitadas->offsetExists('0') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'1' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'1' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('1') && $notas_estudiante[1] > 0 ) ? $notas_estudiante[1] : ''; ?>" />
                
                
                
                
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('1') && $notas_estudiante[1] > 0 ) ? $notas_estudiante[1] : ''; ?>
            <?php endif; ?>
        </td>
        
        <td class="numeros">
			<?php if( $notas_habilitadas->offsetExists('1') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'2' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'2' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('2') && $notas_estudiante[2] > 0 ) ? $notas_estudiante[2] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('2') && $notas_estudiante[2] > 0 ) ? $notas_estudiante[2] : ''; ?>
            <?php endif; ?>
        </td>
        
        <td class="numeros">
			<?php if( $notas_habilitadas->offsetExists('2') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'3' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'3' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('3') && $notas_estudiante[3] > 0 ) ? $notas_estudiante[3] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('3') && $notas_estudiante[3] > 0 ) ? $notas_estudiante[3] : ''; ?>
            <?php endif; ?>
        </td>
        
        <td class="numeros">
        	<?php if( $notas_habilitadas->offsetExists('3') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'4' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'4' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('4') && $notas_estudiante[4] > 0 ) ? $notas_estudiante[4] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('4') && $notas_estudiante[4] > 0 ) ? $notas_estudiante[4] : ''; ?>
            <?php endif; ?>
        </td>
        
        <td bgcolor="#D9D9D9" class="promedio1">
	        <?php 
            if ( $notas_estudiante->offsetExists('1') && $notas_estudiante->offsetExists('2') && $notas_estudiante->offsetExists('3') && $notas_estudiante->offsetExists('4') ){
                
            	$parcial_80_porcent = ( ($notas_estudiante[1] + $notas_estudiante[2] + $notas_estudiante[3]) / 3 ) * 0.8;

            	$parcial_20_porcent = $notas_estudiante[4] * 0.2;
            	
            	$promedio_1 = round($parcial_80_porcent + $parcial_20_porcent, 1);
            	
                echo ( $promedio_1 );
            } else {
                
                echo '';
            }
            ?>
        </td>
        
        <td class="numeros">
        	<?php if( $notas_habilitadas->offsetExists('4') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'5' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'5' ?>" size="3" maxlength="3" value="<?php echo  ( $notas_estudiante->offsetExists('5') && $notas_estudiante[5] > 0 ) ? $notas_estudiante[5] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('5') && $notas_estudiante[5] > 0 ) ? $notas_estudiante[5] : ''; ?>
            <?php endif; ?>
        </td>
        
        <td class="numeros">
			<?php if( $notas_habilitadas->offsetExists('5') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'6' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'6' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('6') && $notas_estudiante[6] > 0 ) ? $notas_estudiante[6] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('6') && $notas_estudiante[6] > 0 ) ? $notas_estudiante[6] : ''; ?>
            <?php endif; ?>
        </td>
        
        <td class="numeros">
        	<?php if( $notas_habilitadas->offsetExists('6') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'7' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'7' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('7') && $notas_estudiante[7] > 0 ) ? $notas_estudiante[7] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('7') && $notas_estudiante[7] > 0 ) ? $notas_estudiante[7] : ''; ?>
            <?php endif; ?>
        </td>
        
        <td class="numeros">
        	<?php if( $notas_habilitadas->offsetExists('7') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'8' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'8' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('8') && $notas_estudiante[8] > 0 ) ? $notas_estudiante[8] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('8') && $notas_estudiante[8] > 0 ) ? $notas_estudiante[8] : ''; ?>
            <?php endif; ?>
        </td>
        
        <td bgcolor="#D9D9D9" class="promedio1">
        	<?php 
            if ( $notas_estudiante->offsetExists('5') && $notas_estudiante->offsetExists('6') && $notas_estudiante->offsetExists('7') && $notas_estudiante->offsetExists('8') ) {
                
            	$parcial_80_porcent = ( ($notas_estudiante[5] + $notas_estudiante[6] + $notas_estudiante[7]) / 3 ) * 0.8;

            	$parcial_20_porcent = $notas_estudiante[8] * 0.2;
            	
            	$promedio_2 = round($parcial_80_porcent + $parcial_20_porcent, 1);
            	
                echo ( $promedio_2 );
            } else {
                
                echo '';
            }
            ?>
        </td>
        
        <td bgcolor="#FFFFFF" class="promedio1">
        	<?php if( $notas_habilitadas->offsetExists('9') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'9' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'9' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('9') && $notas_estudiante[9] > 0 ) ? $notas_estudiante[9] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('9') && $notas_estudiante[9] > 0 ) ? $notas_estudiante[9] : '-'; ?>
            <?php endif; ?>
        </td>
        
        <td bgcolor="#FFFFFF" class="promedio1">
        	<?php if( $notas_habilitadas->offsetExists('10') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'10' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'10' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('10') && $notas_estudiante[10] > 0 ) ? $notas_estudiante[10] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('10') && $notas_estudiante[10] > 0 ) ? $notas_estudiante[10] : '-'; ?>
            <?php endif; ?>
        </td>
        
        <td bgcolor="#D9D9D9" class="promedio1">
        	<?php if( $notas_habilitadas->offsetExists('11') ): ?>
                <input onblur="validaNota(this.value)" onKeyPress="return numbersonly(this, event)" name="notainput[<?php echo $input_id.'11' ?>]" type="text" class="tipograf" id="<?php echo $input_id.'11' ?>" size="3" maxlength="3" value="<?php echo ( $notas_estudiante->offsetExists('11') && $notas_estudiante[11] > 0 ) ? $notas_estudiante[11] : ''; ?>" />
            <?php else: ?>
                <?php echo ( $notas_estudiante->offsetExists('11') && $notas_estudiante[11] > 0 ) ? $notas_estudiante[11] : ''; ?>
            <?php endif; ?>
        </td>
        </tr>
      
      
      
     

<?php  
        
    endforeach; 
?>    


    </table></td>
  </tr>
</table>
  
    
    
    
      <p>
        <input type="submit" name="envia" id="envia" value="   SUBIR NOTAS AL SISTEMA   ">
      </p>    
</form>
