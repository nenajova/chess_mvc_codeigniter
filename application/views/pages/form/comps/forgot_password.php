<? echo form_open('forgot', 'class="form-signin" role="form"'); ?>
		
		
		<div class="form_logo">
			<img src="<? echo site_url('images/logo/logo_200.png'); ?>" alt=""/>
		</div>



<h3>Forgot your password?</h3>
Not to worry. Just enter your email address below and we'll send you an instruction email for recovery.

		<div class="input-group" style="margin-top: 10px">
			<span class="input-group-addon">@</span>
			<? echo form_input('form_email', set_value('form_email', ''), 'class="form-control" placeholder="email"'); ?>
		</div>

		
		
<button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
		
		
<? echo form_close(); ?>