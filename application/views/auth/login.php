<div class="center">
  <div style="text-align: center;">
    <br>
    <h1 style="color: black"><?php echo lang('login_heading');?></h1>
    <p><?php echo lang('login_subheading');?></p>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/login");?>

      <p>
        <?php echo lang('login_identity_label', 'identity');?><br>
        <input <?php echo form_input($identity);?>
      </p>

      <p>
        <?php echo lang('login_password_label', 'password');?><br>
        <?php echo form_input($password);?>
      </p>

      <p>
        <?php echo lang('login_remember_label', 'remember');?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
      </p>


      <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

    <?php echo form_close();?>

    <p><a href="auth/forgot_password"><?php echo lang('login_forgot_password');?></a></p>
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