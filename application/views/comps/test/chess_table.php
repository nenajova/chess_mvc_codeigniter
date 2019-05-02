<div id="chess_table">
	<div id="fields">
		<?
			$slovo = array('A','B','C','D','E','F','G','H');
			$red = 0;
			
			if (isset($match_info->{'table_color'}) && 
				$match_info->{'table_color'} == 'white') {
			
				for ($i=0; $i<=63; $i++) {
					if($i%8 == 0) $red ++;
					echo "<div id='". $slovo[$i%8] . (9-$red) ."' class='field";
					if ($red%2 == 0)
						if ($i%2 != 0) echo " white"; else echo " black";
					else 
						if ($i%2 == 0) echo " white"; else echo " black";				
					echo "'>". $slovo[$i%8] . (9-$red) ."</div>";
				}
			
			} else {
			
				for ($i=0; $i<=63; $i++) {
					if($i%8 == 0) $red ++;
					echo "<div id='". $slovo[7-$i%8] . ($red) ."' class='field";
					if ($red%2 == 0)
						if ($i%2 != 0) echo " white"; else echo " black";
					else 
						if ($i%2 == 0) echo " white"; else echo " black";				
					echo "'></div>";
				}			
			
			}
			
			
		?>
	</div>
</div>


<? //echo $match_info->{'positions'}; ?>