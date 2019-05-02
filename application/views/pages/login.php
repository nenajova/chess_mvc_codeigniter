<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php echo link_tag('css/bootstrap.min.css'); ?>
	<?php echo link_tag('css/signin.css'); ?>
</head>
<body>

    <div class="container">

      <!--form action="login" class="form-signin" role="form" metod="post" accept-charset="utf-8">
        <h3 class="form-signin-heading">Animals Walls Login</h3>
        <input type="text" class="form-control" name="korisnik" placeholder="Username" required="" autofocus="">
        <input type="password" class="form-control" name="lozinka" placeholder="Password" required="">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form-->

		<?
			if (isset($account_created)) {
				echo $account_created;
			}
		?>

		<?php

		echo form_open('login', 'class="form-signin" role="form"');
		?>
		<h3 class="form-signin-heading">Chess Arena Login</h3>
		<?
		
		echo form_input('form_username', set_value('form_username', ''), 'class="form-control" placeholder="username"');
		echo form_password('form_password', set_value('form_username', ''), 'class="form-control" placeholder="password"');
		
		
		//echo form_label('????????:', 'lb_korisnik');
		/*echo form_input('korisnik', '', 
			'id="korisnik" placeholder="username" class="form-control" required="" autofocus=""');
		//echo form_label('???????:', 'lb_lozinka');
		echo form_password('lozinka', '', 
			'placeholder="password" class="form-control" required=""');
		//echo form_submit('submit', 'Login');
		// echo anchor('register', 'Create Account');*/
		
		?>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<a href="<? echo site_url('register'); ?>">Register</a>
		<?
		echo form_close();
		
		?>
		<div class="errors">
				<?php echo validation_errors(); ?>
		</div>


    </div> <!-- /container -->


	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<? echo site_url('js/bootstrap.min.js'); ?>"></script>
	
</body>
</html>







