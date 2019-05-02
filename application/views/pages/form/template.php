<!DOCTYPE HTML>
<html lang="en-US" class="full">
<head>
	<meta charset="UTF-8">
	<?
		$t = 'Sign In';
		//$t = $this->uri->segment(1);
		
		switch ($this->uri->segment(1)) {
			case 'register' : $t = 'Sign Up';
		}
	?>
	<title><?echo $t;?> | ChessArena</title>
	<?php echo link_tag('css/bootstrap.min.css'); ?>
	<?php echo link_tag('css/signin.css'); ?>
	<?php //echo link_tag('css/form.css'); ?>
	<link rel="shortcut icon" href="<? echo site_url('images'); ?>/sah.ico">
	
	
	
	<!--link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

	<? $this->load->view('pages/form/comps/footer'); ?>





    <? $this->load->view('pages/form/comps/'.$page); ?>





	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<? echo site_url('js/bootstrap.min.js'); ?>"></script>
	
</body>
</html>







