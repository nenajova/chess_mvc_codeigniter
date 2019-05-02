<? //var_dump($opponent_possible_moves);
	//var_dump($temp);
	$attacking_field = '';
	foreach($opponent_possible_moves as $fig => $moves) {
	
		//echo br(3).$fig.'='.$moves;
		$a = trim($moves, '["]');
		///echo br(1).'a='.$a;
		
		$b = explode('","', $a);
		//echo br(1).$fig.'b=';
		//var_dump($b);
		
		
		$c = str_replace('","','',$moves);
		//echo br(1).'c='.$c;
		
		$attacking_field .= trim($c, '["]');
		//echo br(2).$opp;
		//$a
		/*foreach($opp as $o) {
			echo $o;
		}*/
	}
	
	//echo br(7).'af:'.$attacking_field;
?>


<? //foreach ($possible_moves as $fig => $moves) : ?>

<? //echo $fig.'='.$moves;?>

<? //endforeach; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
	
	//alert(<? echo 'UC: '.$user_color.' OMC: '.$onmove_color; ?>);
	
	
		if(<? echo '"'.$user_color.'"!=="'.$onmove_color.'"'; ?>) {
			start_watch();
			//alert('a1++');
		}
	
		function start_watch() {
			
	
			var match_data = {
				id: <? echo $match_info->{'id'}; ?>//,
			};
			$.ajax({
				url: "<? echo site_url('match_move'); ?>",
				type: 'POST',
				data: match_data,
				success: function(result) {
					//alert(result);
					//$("#move_number").html(result);
					if (parseInt(result) > <? echo $match_info->{'moves'}; ?>)
						window.location = "<? echo site_url('match/'.$match_info->{'id'}); ?>";
				}
			});
			
			var t = setTimeout(function(){start_watch()},3000);
			
			
			
			//alert('b');
			
			/*$.get('match_move/<? echo $match_info->{'id'}; ?>', function (result) {
				//if (result > <? echo $match_info->{'moves'}; ?>)
				//window.location = "<? echo site_url('match/'.$match_info->{'id'}); ?>
			});*/
		}
	
	
		
	
		var pos_mov = [];
		//pos_mov['w_pawn1'] = ['a3', 'a4'];
		//pos_mov['w_pawn2'] = ['b3', 'b4'];
	
		<? foreach ($possible_moves as $fig => $moves) : ?>
		pos_mov['<? echo $fig; ?>'] = <? echo $moves; ?>;
		<? endforeach; ?>	
	
		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);
			//alert('p');
			/*document.getElementByID("d4").createAttribute("ondrop", "drop(event)");
			document.getElementByID("d4").createAttribute("ondragover", "allowDrop(event)");*/
			
			/*document.getElementById('d4').setAttribute("ondrop", "drop(event)");
			document.getElementById('d4').setAttribute("ondragover", "allowDrop(event)");*/
			//alert(pos_mov['w_pawn1'][0]);
			
			//var moves = pos_mov['w_pawn1'];
			var moves = pos_mov[ev.target.id];
			for	(i=0; i < moves.length; i++) {
				//text += fruits[i];
				document.getElementById(moves[i]).setAttribute("ondrop", "drop(event)");
				document.getElementById(moves[i]).setAttribute("ondragover", "allowDrop(event)");
			}
		}
		 
		function cancel_drag(ev) {
			//alert('a');
			//ev.dataTransfer.setData("text", ev.target.id);
			
			var moves = pos_mov[ev.target.id];
			for	(i=0; i < moves.length; i++) {
				document.getElementById(moves[i]).removeAttribute("ondrop");
				document.getElementById(moves[i]).removeAttribute("ondragover");
			}
		}		

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
			
			//alert(data.substr(2,2));
			//alert(data.substr(2,2)+'+'+ev.target.id+'='+ev.target.id.length);
			
			// remove ondrop and ondragover
			var moves = pos_mov[data];
			
			for	(i=0; i < moves.length; i++) {
				//text += fruits[i];
				document.getElementById(moves[i]).removeAttribute("ondrop");
				document.getElementById(moves[i]).removeAttribute("ondragover");
			}
			
			//var move = 'c2c3'; 
			
			
			var from, to;
			from = data.substr(2,2);
			to = ev.target.id;
			
			//alert(to);
			
			// ako jede onda ga prihvata figura a ne polje, figura ima 4 slova
			if (to.length == 4) to = to.substr(2,2);
			
			var move = from + to;
			//console.log('a:'+data.substr(2,2)+' b:'+ev.target.id+' c:'+move);
			//alert('a:'+from+' b:'+to+' c:'+move);
			//window.location = "<? echo site_url('move/'.$match_info->{'id'}.'/'.'a2a3'); ?>"
			window.location = "<? echo site_url('move/'.$match_info->{'id'}); ?>/" + move;
		}		
	</script>


<div id="chess_table" onload="position_pieces();">
	<div id="table_background"></div>

	<?
	if (isset($match_info->{'table_color'}) && 
				$match_info->{'table_color'} == 'white') {
	?>
	
	
	<div class="top_marks">
		<div class="table_mark">A</div>	
		<div class="table_mark">B</div>
		<div class="table_mark">C</div>
		<div class="table_mark">D</div>
		<div class="table_mark">E</div>
		<div class="table_mark">F</div>
		<div class="table_mark">G</div>
		<div class="table_mark">H</div>		
	</div>
	<div class="bottom_marks">
		<div class="table_mark">A</div>	
		<div class="table_mark">B</div>
		<div class="table_mark">C</div>
		<div class="table_mark">D</div>
		<div class="table_mark">E</div>
		<div class="table_mark">F</div>
		<div class="table_mark">G</div>
		<div class="table_mark">H</div>
	</div>
	
	
	<div class="left_marks">
		<div class="table_num">8</div>	
		<div class="table_num">7</div>
		<div class="table_num">6</div>
		<div class="table_num">5</div>
		<div class="table_num">4</div>
		<div class="table_num">3</div>
		<div class="table_num">2</div>
		<div class="table_num">1</div>
	</div>
	<div class="right_marks">
		<div class="table_num">8</div>	
		<div class="table_num">7</div>
		<div class="table_num">6</div>
		<div class="table_num">5</div>
		<div class="table_num">4</div>
		<div class="table_num">3</div>
		<div class="table_num">2</div>
		<div class="table_num">1</div>	
	</div>
	
	<? }  else { ?>
	
	<div class="top_marks">	
		<div class="table_mark">H</div>
		<div class="table_mark">G</div>
		<div class="table_mark">F</div>
		<div class="table_mark">E</div>
		<div class="table_mark">D</div>
		<div class="table_mark">C</div>
		<div class="table_mark">B</div>
		<div class="table_mark">A</div>		
	</div>
	
	<div class="bottom_marks">
		<div class="table_mark">H</div>
		<div class="table_mark">G</div>
		<div class="table_mark">F</div>
		<div class="table_mark">E</div>
		<div class="table_mark">D</div>
		<div class="table_mark">C</div>
		<div class="table_mark">B</div>
		<div class="table_mark">A</div>
	</div>
	
	<div class="left_marks">
		<div class="table_num">1</div>	
		<div class="table_num">2</div>
		<div class="table_num">3</div>
		<div class="table_num">4</div>
		<div class="table_num">5</div>
		<div class="table_num">6</div>
		<div class="table_num">7</div>
		<div class="table_num">8</div>
	</div>
	<div class="right_marks">
		<div class="table_num">1</div>	
		<div class="table_num">2</div>
		<div class="table_num">3</div>
		<div class="table_num">4</div>
		<div class="table_num">5</div>
		<div class="table_num">6</div>
		<div class="table_num">7</div>
		<div class="table_num">8</div>	
	</div>
	
	
	
	
	
	
	
	<? } ?>
	
	<div id="fields">
		<?
			$slovo = array('a','b','c','d','e','f','g','h');
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
					//echo "'>". $slovo[$i%8] . (9-$red) ."</div>";
					
					
					echo "'></div>";
					/*echo "'";
					echo " ondrop='drop(event)' ondragover='allowDrop(event)'";
					echo "></div>";	*/				
				}
			
			} else {
			
				for ($i=0; $i<=63; $i++) {
					if($i%8 == 0) $red ++;
					echo "<div id='". $slovo[7-$i%8] . ($red) ."' class='field";
					//echo "<div id='". $slovo[7-$i%8] . "_" . ($red) ."' class='field";
					if ($red%2 == 0)
						if ($i%2 != 0) echo " white"; else echo " black";
					else 
						if ($i%2 == 0) echo " white"; else echo " black";				
					//echo "'>". $slovo[7-$i%8] . ($red) ."</div>";
					
					echo "'></div>";					
					
					/*echo "'";
					echo " ondrop='drop(event)' ondragover='allowDrop(event)'";
					echo "></div>";*/
				}			
			
			}
			
			
		?>
	</div>
</div>

<? //var_dump($temp); ?>
<!--br />
<? //var_dump($match_info->{'positions'}); ?>
<br /><br /><br />
<? //var_dump($possible_moves); ?>

<div class="error">
	wk: <? //var_dump($possible_moves['wke1']); ?><br>
	bk: <? //var_dump($possible_moves['bke8']); ?>
</div-->



<script>

//var positions = 'wpa2_wpb2_wpc2_wpd2_wpe2_wpf2_wpg2_wph2';
//var positions = 'wpa2_wpb2';
//var positions = 'wph1_wpg1';
var positions = '<? echo $match_info->{'positions'}; ?>';
var pos = positions.split('_');
//var elem;
var wp=0, bp=0, wr=0, br=0, ws=0, bs=0, wb=0, bb=0;
for (var i=0; i < pos.length; i++) {
	//alert(pos[i].substr(0,1));
	//alert(pos[i].substr(2,3));
	var elem = document.createElement('div');
	
	var piece;
	switch(pos[i].substr(1,1)) {
    case 'p': piece = 'pawn'; break;
    case 'r': piece = 'rook'; break;
    case 's': piece = 'knight'; break;
    case 'b': piece = 'bishop'; break;
    case 'q': piece = 'queen'; break;
    case 'k': piece = 'king'; break;
    /*default:
        default code block*/
	}
	
	piece = piece = pos[i].substr(0,1) + "_" + piece;
	
	elem.setAttribute("class", piece);
	
	if (pos[i].substr(0,1) == '<? echo $user_color; ?>'
		&& pos[i].substr(0,1) == '<? echo $onmove_color; ?>') {
		elem.setAttribute("draggable", "true");
		elem.setAttribute("ondragstart", "drag(event)");
		elem.setAttribute("ondragend", "cancel_drag(event)");
	}
	
	/*if (pos[i].substr(0,1) == 'w') {
		switch(pos[i].substr(1,1)) {
			case 'p': wp++; piece = piece + wp; break;
			case 'r': wr++; piece = piece + wr; break;
			case 's': ws++; piece = piece + ws; break;
			case 'b': wb++; piece = piece + wb; break;
		}
	} else {
		switch(pos[i].substr(1,1)) {
			case 'p': bp++; piece = piece + bp; break;
			case 'r': br++; piece = piece + br; break;
			case 's': bs++; piece = piece + bs; break;
			case 'b': bb++; piece = piece + bb; break;
		}	 = 
	}*/
	piece = pos[i];
	elem.setAttribute("id", piece);
	
	document.getElementById(pos[i].substr(2,3)).appendChild(elem);
}

</script>