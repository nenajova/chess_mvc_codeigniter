<? $uri = $this->uri->segment(1); ?>
<nav class="navbar navbar-inverse">
	<div class="wrapper">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<? echo site_url(); ?>">
	  
		<img src="<? echo site_url('images/logo/logo_100.png'); ?>" alt="" style="margin-top:-7px;" />
	  
	  </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--li class="active"><a href="#">Play</a></li-->
        <li <? if($uri == 'play') echo "class='active'"; ?>>
			<a href="<? echo site_url('play'); ?>"><span class="glyphicon glyphicon-play"></span> Play</a>
		</li>
		<li <? if($uri == 'challenge') echo "class='active'"; ?>><a href="<? echo site_url('challenge'); ?>">
			<span class="glyphicon glyphicon-link"></span> Challenge</a></li>
        <li <? if($uri == 'matches') echo "class='active'"; ?>><a href="<? echo site_url('matches'); ?>">
			<span class="glyphicon glyphicon-list"></span> Matches</a></li>
        <li <? if($uri == 'rating') echo "class='active'"; ?>><a href="<? echo site_url('rating'); ?>">
			<span class="glyphicon glyphicon-stats"></span> Rating</a></li>
        <!--li><a href="#">Link1</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li-->
      </ul>
      <!--form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form-->
      <ul class="nav navbar-nav navbar-right">
        <li <? if($uri == 'profile') echo "class='active'"; ?>><a title="Profile" href="<? echo site_url('profile'); ?>">
		<!--span class="glyphicon glyphicon-user"></span> <? echo $this->session->userdata('username');?></a></li-->
		<span class="glyphicon glyphicon-user"></span></a></li>
        <!--li><a href="<? echo site_url('logoff'); ?>"><span class="glyphicon glyphicon-off"></span> Sign out</a></li-->
        <li><a title="Sign out" href="<? echo site_url('logoff'); ?>"><span class="glyphicon glyphicon-off"></span></a></li>
        <!--li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>