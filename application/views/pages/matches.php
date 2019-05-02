matches

<? //var_dump($matches); ?>

<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>White</th>
			<th>Black</th>
			<th>Start time</th>
			<th>Moves</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($matches as $match) : ?>
		<tr>
			<td><a href="<?echo site_url('profile/'.$match->{'white'});?>"><? echo $match->{'white'}; ?></a></td>
			<td><a href="<?echo site_url('profile/'.$match->{'black'});?>"><? echo $match->{'black'}; ?></a></td>
			<td><? echo $match->{'start_time'}; ?></td>
			<td><? echo $match->{'moves'}; ?></td>
			<td><a href="<? echo site_url('match/'.$match->{'id'}); ?>">view</a></td>
		</tr>
		<? endforeach; ?>
	</tbody>
</table>