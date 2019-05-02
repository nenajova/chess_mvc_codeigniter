      <!--form action="login" class="form-signin" role="form" metod="post" accept-charset="utf-8">
        <h3 class="form-signin-heading">Animals Walls Login</h3>
        <input type="text" class="form-control" name="korisnik" placeholder="Username" required="" autofocus="">
        <input type="password" class="form-control" name="lozinka" placeholder="Password" required="">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form-->


		<?php echo form_open('signup', 'class="form-signin" role="form"'); ?>
		
		<div class="form_logo">
			<img src="<? echo site_url('images/logo/logo_200.png'); ?>" alt=""/>
		</div>
		<!--h3 class="form-signin-heading">Chess Arena Register</h3-->
		
		<div class="input-group">
			<span class="input-group-addon">@</span>
			<? echo form_input('form_email', set_value('form_email', ''), 'class="form-control" placeholder="email"'); ?>
		</div>
		
		
		
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		<? echo form_input('form_username', set_value('form_username', ''), 'class="form-control" placeholder="username"'); ?>
		</div>		
		
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		<? echo form_password('form_password', set_value('form_username', ''), 'class="form-control" placeholder="password"'); ?>
		</div>		
		
		
		
		
<?
		//echo form_label('????????:', 'lb_korisnik');
		//echo form_input('form_username', '', 
		//	'id="username" placeholder="username" class="form-control" required="" autofocus=""');
		//echo form_label('???????:', 'lb_lozinka');
		/*echo form_password('form_password', '', 
			'placeholder="password" class="form-control" required=""');
		echo form_input('form_email', '', 
			'placeholder="email" class="form-control" required=""');*/
		//echo form_submit('submit', 'Login');
		// echo anchor('register', 'Create Account');
		
		?>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
		
		
		
		<div class="form_bottom">
			Have you a account? back to <a href="<? echo site_url(); ?>">Sign In</a>
		</div>
		<?
		echo form_close();
		
		?>
		<div class="errors">
				<?php echo validation_errors(); ?>
		</div>