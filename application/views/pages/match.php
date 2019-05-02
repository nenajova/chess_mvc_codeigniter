

<div id="table">
	<? 
		//$d['table_color'] = 'white1';
		$this->load->view('comps/chess_table'); 
	?>
</div>

<div id="match_info">
	<div id="match_players">
		<div id="white_player" align="center"><? echo $match_info->{'white'}; ?></div>
		<div id="match_move" align="center">move no:<br>
			<strong><? echo $match_info->{'moves'}; ?></strong>
		</div>
		<div id="black_player" align="center"><? echo $match_info->{'black'}; ?></div>
	</div>
	<div id="match_other_info">
		start time: <? echo $match_info->{'start_time'}; ?>
	</div>


	on move: 
	<? 
		if($match_info->{'moves'}%2 == 0) 
		{
			if ($match_info->{'white'} == $this->session->userdata('username'))
				echo "<span class='you'>YOU!</span>";
			else echo $match_info->{'white'}; 
		}
		else 
		{
			if ($match_info->{'black'} == $this->session->userdata('username'))
				echo "<span class='you'>YOU!</span>";
			else 
			echo $match_info->{'black'};
		}
	?>
	<? //var_dump($match_info);?>
	<? //var_dump($moves);?>
	<br>
	MOVES:
	<div id="match_moves">
		<? $i=$match_info->{'moves'}+1; if($moves) foreach ($moves as $move) : $i--; ?>
		<div class="move_row">
				<? //echo ' '; ?>
				<div class="move_nomber">
					<? echo $i.". "; ?>
				</div>
				
				<div class="move_figure">
					
					<? 
						if ($move['figure'] != 0) {
							//echo "-a";
							switch($move['figure']) {
								case 1 : if($i%2 != 0) echo "<div class='w_pawn_sm'></div>"; 
									else  echo "<div class='b_pawn_sm'></div>";
								break;
								case 2 : if($i%2 != 0) echo "<div class='w_rook_sm'></div>"; 
									else  echo "<div class='b_rook_sm'></div>"; 
								break;
								case 3 : if($i%2 != 0) echo "<div class='w_knight_sm'></div>"; 
									else  echo "<div class='b_knight_sm'></div>"; 
								break;
								case 4 : if($i%2 != 0) echo "<div class='w_bishop_sm'></div>"; 
									else  echo "<div class='b_bishop_sm'></div>";
								break;
								case 5 : if($i%2 != 0) echo "<div class='w_queen_sm'></div>"; 
									else  echo "<div class='b_queen_sm'></div>";
								break;
								case 6 : if($i%2 != 0) echo "<div class='w_king_sm'></div>"; 
									else  echo "<div class='b_king_sm'></div>";
								break;
							}
						}
					?>

				</div>
				


			
			<div class="eat_figure">
			<? 
				if ($move['eat'] != 0) {
					//echo "-a";
					switch($move['eat']) {
						case 1 : if($i%2 == 0) echo "<div class='w_pawn_sm'></div>"; 
							else  echo "<div class='b_pawn_sm'></div>";
						break;
						case 2 : if($i%2 == 0) echo "<div class='w_rook_sm'></div>"; 
							else  echo "<div class='b_rook_sm'></div>"; 
						break;
						case 3 : if($i%2 == 0) echo "<div class='w_knight_sm'></div>"; 
							else  echo "<div class='b_knight_sm'></div>"; 
						break;
						case 4 : if($i%2 == 0) echo "<div class='w_bishop_sm'></div>"; 
							else  echo "<div class='b_bishop_sm'></div>";
						break;
						case 5 : if($i%2 == 0) echo "<div class='w_queen_sm'></div>"; 
							else  echo "<div class='b_queen_sm'></div>";
						break;
						case 6 : if($i%2 == 0) echo "<div class='w_king_sm'></div>"; 
							else  echo "<div class='b_king_sm'></div>";
						break;
					}
				
				}
			?>
			</div>
			
			
			<div class="move_field <? 
				if ($move['eat'] == 0) echo 'white'; else echo 'black';
			?>"><? echo $move['start_field'] . '.' . $move['end_field']; ?></div>
			


		</div>
		<? endforeach; ?>
	</div>
</div>

<div style="clear:both;"></div>