<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>DEV CHESS ARENA</title>
	<? echo link_tag('css/style.css'); ?>	
	<? echo link_tag('css/bootstrap.css'); ?>
	<? echo link_tag('css/sticky-footer-navbar.css'); ?>
	
</head>
<body>

	<? $this->load->view('comps/header'); ?>
	<div class="wrapper">
		<? $this->load->view('pages/'.$page); ?>
	</div>
	<? $this->load->view('comps/footer'); ?>
	
</body>
</html>