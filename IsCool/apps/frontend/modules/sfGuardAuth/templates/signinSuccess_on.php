<table width="918" border="0" align="center" cellpadding="0" cellspacing="0">







  

  

  <tr>

    <td width="60" rowspan="2" align="left" valign="top">&nbsp;</td>

    <td width="870" height="74" align="center" valign="bottom">



<?php if ($form->hasErrors()): ?>

        <div class="tipograf" id="apDiv1">

            &nbsp;&nbsp;&nbsp;&nbsp; <br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

            Nombre de usuario&nbsp; o contrase&ntilde;a incorrectos

        </div>

<?php endif; ?>



   

   

   </td>

    <td width="60" rowspan="2" align="right" valign="top">&nbsp;</td>

  </tr>





  <tr>

    <td align="center"><h1 class="tipograf"><span class="titulos1" style="font-size: 20px">El acceso al sistema ha sido desactivado.</span></h1>

      <h1 class="tipograf"><span class="titulos1" style="font-size: 20px">Estamos poniendo todo a punto.<br />

        Gracias por la comprensión!</span>

      </h1>

      <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">

        <table>

          <tbody>

            <tr>

              <th class="tipograf"><label for="signin_username">Usuario:</label></th>

              <td> <?php echo $form['username'] ?></td>

            </tr>

            <tr>

              <th class="tipograf"><label for="signin_password">Contrase&ntilde;a:</label></th>

              <td><?php echo $form['password'] ?></td>

            </tr>

            <tr>

              <th class="tipograf"><label for="signin_remember">Recordarme</label></th>

              <td>

                  <?php echo $form['remember']->render() ?>

                  <input type="hidden" name="signin[_csrf_token]" id="signin__csrf_token" value="<?php echo $form->getCSRFToken(); ?>" />

              </td>

            </tr>

          </tbody>

          <tfoot>

            <tr>

              <td colspan="2" align="center"><input name="Boton" type="button" class="tipograf" value="INGRESAR"></td>

            </tr>

          </tfoot>

        </table>

    </form>

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    </td>

  </tr>

</table>



