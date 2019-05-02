<table class="table table-striped table-bordered table-hover">
<thead>
	<th>Player name</th>
	<th>Start/Finish match</th>
	<th>Moves</th>
	<th>Piece eat</th>
	<th>Piece lost</th>
</thead>
<tbody>
<? foreach ($players as $player) : ?>
<tr>
	<td><a href="<?echo site_url('profile/'.$player['username']);?>"><? echo $player['username']; ?></a></td>
	<td><? echo $player['start_match'] . '/' . $player['finish']; ?></td>
	<td><? echo $player['move']; ?></td>
	<td><? echo $player['piece_eat']; ?></td>
	<td><? echo $player['piece_lost']; ?></td>
</tr>
<? endforeach; ?>
</tbody>
</table>

<? //var_dump($players); ?>