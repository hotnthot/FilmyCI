<div class="center">
      <div style="text-align: center;">
<h1 style="color: black">Registrace</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>
      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>
      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>
</div>
</div>
<footer class="py-4 bg-dark text-white-50">
	    <div class="container text-center">
	    <small>
	      <center> <a>  <i>Michal Jurák</i> </a> </br> <a>Kontakt:  <i>jurak_michal@oauh.cz</i></a>  </center>
	    </small>
	    </div>
	</footer>
  </body>
</html>