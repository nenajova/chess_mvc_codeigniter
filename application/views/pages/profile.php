<?
	/*$d1 = date_create($user->{'login_time'});
	$d2 = date_create($user->{'move_time'});*/
	/*$d1 = date_create("2013-01-01 10:20:35");
	$d2 = date_create("2014-01-09 10:20:30");
	$diff = date_diff($d1,$d2); 
	
	echo $d1->format('s').'<br>'.$d2->format('s').'<br>'.$diff->format('%m').'<br>';
	
	echo br(5);*/
	
	//var_dump($time_ago);
	

?>




<img src="<?echo site_url('images/other/user_icon.png');?>" alt="" width="150px" style="float:left; margin-right: 30px;"/>




<div style="float:right">
	<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> join date: <? echo date_format(date_create($user->{'join_time'}), "d.m.Y."); ?>
		(<?echo $time_ago['join'];?>)<br>
	<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> last login: <? echo $time_ago['login']; ?><br>
	<span class="glyphicon glyphicon-time" aria-hidden="true"></span> last move: <? echo $time_ago['move']; ?><br>
</div>


<h2><? echo $user->{'username'}; ?></h2>


<!--div style="clear:both">
	matches: <? echo $user->{'start_match'}; ?><br>
	<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> winner: <? echo $user->{'win'}; ?><br>
	<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> lose: <? echo $user->{'lose'}; ?><br>
	<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> move: <? echo $user->{'move'}; ?><br>
</div-->

<div class="matches_stat">

	<ul class="matches_stat_list">
		<li>
			<span class="stat_num"><? echo $user->{'start_match'}; ?></span>
			<span class="stat_text">Start match</span>
			<span class="glyphicon glyphicon-tower stat_glyph" aria-hidden="true"></span>	
		</li>
		<li>
			<span class="stat_num"><? echo $user->{'win'}; ?></span>
			<span class="stat_text">Winner</span>
			<span class="glyphicon glyphicon-thumbs-up stat_glyph" aria-hidden="true"></span>			
		</li>
		<li>
			<span class="stat_num"><? echo $user->{'lose'}; ?></span>
			<span class="stat_text">Lose</span>
			<span class="glyphicon glyphicon-thumbs-down stat_glyph" aria-hidden="true"></span>	
		</li>
		<li>
			<span class="stat_num"><? echo $user->{'draw'}; ?></span>
			<span class="stat_text">Remi/Draw</span>		
		</li>
		<li>
			<span class="stat_num">
			<?
				$b = $user->{'start_match'} - $user->{'win'} - $user->{'lose'} - $user->{'draw'};
				echo $b;
			?>
			</span>
			<span class="stat_text">Playing</span>		
		</li>
	</ul>
	
</div>


<div style="clear:both"></div>


<div class="move_figure_stat">
	<ul class="move_figure_stat_list">
		<li>
			<span class="stat_num"><? echo $user->{'move'}; ?></span>
			<span class="stat_text">Move</span>
			<span class="glyphicon glyphicon-share-alt stat_glyph" aria-hidden="true"></span>			
		</li>
		<li>
			<span class="stat_num">
				<? echo $user->{'piece_eat'}; ?>/<? echo $user->{'piece_lost'}; ?>
			</span>
			<span class="stat_text">Figure</span>
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>			
		</li>
		<li>
			<span class="stat_num">
				<? echo $user->{'queen_eat'}; ?>/<? echo $user->{'queen_lost'}; ?>
			</span>
			<span class="stat_text">Queen</span>
			<span class="glyphicon glyphicon-queen stat_glyph" aria-hidden="true"></span>		
		</li>		
		<li>
			<span class="stat_num">
				<? echo $user->{'bishop_eat'}; ?>/<? echo $user->{'bishop_lost'}; ?>
			</span>
			<span class="stat_text">Bishop</span>
			<span class="glyphicon glyphicon-bishop stat_glyph" aria-hidden="true"></span>		
		</li>		
		<li>
			<span class="stat_num">
				<? echo $user->{'knight_eat'}; ?>/<? echo $user->{'knight_lost'}; ?>
			</span>
			<span class="stat_text">Knight</span>
			<span class="glyphicon glyphicon-knight stat_glyph" aria-hidden="true"></span>		
		</li>
		<li>
			<span class="stat_num">
				<? echo $user->{'rook_eat'}; ?>/<? echo $user->{'rook_lost'}; ?>
			</span>
			<span class="stat_text">Rook</span>
			<span class="glyphicon glyphicon-tower stat_glyph" aria-hidden="true"></span>		
		</li>
		<li>
			<span class="stat_num">
				<? echo $user->{'pawn_eat'}; ?>/<? echo $user->{'pawn_lost'}; ?>
			</span>
			<span class="stat_text">Pawn</span>
			<span class="glyphicon glyphicon-pawn stat_glyph" aria-hidden="true"></span>		
		</li>
	</ul>
</div>


	
