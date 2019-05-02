 <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			
			<!--img src="<? echo site_url('images/logo/logo_100.png'); ?>" alt="" style="margin-top:8px;" /-->
			<!--div class="navbar-brand">
				
				
			</div-->
			<img class="navbar-brand navbar-brand-lg" src="<? echo site_url('images/logo/logo_100.png'); ?>" alt=""/>
			<p class="navbar-text navbar-text-sm" style="margin-left:-10px"><small>© 2015.</small></p>
			<!--a class="navbar-brand" href="#">Start Bootstrap</a-->

		</div>
		
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		
		
			<ul class="nav navbar-nav" style="margin: 12px 35px 0px 15px;">
				<a href="https://www.facebook.com/pages/Chess-Arena/124012450958242?ref=hl"><i id="social" class="fa fa-facebook-square fa-2x social-fb"></i></a>
				<a href="https://twitter.com/"><i id="social" class="fa fa-twitter-square fa-2x social-tw"></i></a>
				<a href="https://plus.google.com/"><i id="social" class="fa fa-google-plus-square fa-2x social-gp"></i></a>
				<a href="mailto:mail@gmail.com"><i id="social" class="fa fa-envelope-square fa-2x social-em"></i></a>
			</ul>
		
		
		
			<ul class="nav navbar-nav">
			<!--li>
			<a href="#">About</a>
			</li>
			<li>
			<a href="#">Services</a>
			</li>
			<li>
			<a href="#">Contact</a>
			</li-->
				<li>
					<a href="<?echo site_url();?>">News</a>
				</li>
				<li>
					<a href="<?echo site_url();?>">About us</a>
				</li>
				<li>
					<a href="<?echo site_url();?>">Contact</a>
				</li>				
				<!--li>
					<a href="<?echo site_url();?>">User Agreement</a>
				</li>
				<li>
					<a href="<?echo site_url();?>">Privacy Policy</a>
				</li-->	

				


			</ul>


			
			<ul class="nav navbar-nav navbar-right">

				<li title="Sign Up Now for Free!">
					<a href="<?echo site_url('signup');?>">
					<span class="glyphicon glyphicon-plus-sign"></span> Join</a>
				</li>
				<li title="Forgot password?">
					<a href="<?echo site_url('forgot');?>">
					<span class="glyphicon glyphicon-question-sign"></span></a>
				</li>
				<li>
					<a href="<?echo site_url();?>">
					<span class="glyphicon glyphicon-ok-sign"></span> Sign In</a>
				</li>

			</ul>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>