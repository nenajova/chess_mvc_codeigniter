
	<div class="col_title">your matches</div>
	
	
	
	
<table class="table table-striped table-bordered table-hover">	
<thead>
	<th>Opponent</th>
	<th>Your Color</th>
	<th>Moves</th>
	<th></th>
</thead>
<tbody>
	<? if ($matches) foreach($matches as $match) : ?>
	
		<tr>
			<td><a href="<?echo site_url('profile/'.$match->{'opponent'});?>"><? echo $match->{'opponent'}; ?></a></td>
			<td><? echo $match->{'color'}; ?></td>
			<td><? echo $match->{'moves'}; ?></td>
			<td>
			
				<a href="<? echo site_url('match/'.$match->{'id'}); ?>">
					<?
						if($match->{'color'} == 'white' && ($match->{'moves'})%2 == 0
						|| $match->{'color'} == 'black' && ($match->{'moves'})%2 != 0)
							echo 'play'; else echo 'view';
					?>
				</a>
			
			</td>
		</tr>
	

	<? endforeach; ?>
</tbody>
</table>
