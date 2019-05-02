
<div class="page_caption">Challenge</div>

<div class="challenge_col">
	<div class="col_title">challenges to you!</div>
	<? if ($challengs_to_you) foreach($challengs_to_you as $challenge) : ?>
	<div>
		<? echo $challenge['username']; ?> 
		<a href="<?echo site_url('play/'.$challenge['username']);?>">play</a>, 
		<a href="<?echo site_url('reject/'.$challenge['username']);?>">reject</a>
	</div>
	<? endforeach; ?>
</div>

<div class="challenge_col">
	<div class="col_title">challenge other players</div>
	<? if($players) foreach($players as $player) : ?>
	<div>
		<? echo $player['username']; ?> 
		<a href="<?echo site_url('challenge/'.$player['username']);?>">challenge</a>
	</div>
	<? endforeach; ?>
</div>

<div class="challenge_col">
	<div class="col_title">your panding challenges</div>
	<? if($challengs_from_you) foreach($challengs_from_you as $challenge) : ?>
	<div>
		<? echo $challenge['username']; ?> 
		<a href="<?echo site_url('cancel/'.$challenge['username']);?>">cancel</a>
	</div>
	<? endforeach; ?>
</div>

<div style="clear:both;"></div>