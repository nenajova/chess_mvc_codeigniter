<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	





	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
	$('button').click(function(){
		//$('#move_number').html = '3';
	}); 
	
	function promeni() 
	{
		
		//$('#move_number').html = '2';
		//alert('a');
		//$("#move_number").html("aaa");
		//alert('b');
		
		//var msg='aaa2';

		/*var send_data = {
			match_id: 12,
			moves_no: 10
		};
		$.ajax ({
			url: "<? echo site_url('move/check'); ?>",
			type: 'POST',
			data: send_data,
			success: function(m) {
				//$("#move_number").html(msg);
				alert('msg:'+m+'end');
			}
		});*/
		//var result = 'aaa';
		
		
		
		/*$.get('move/check', function (result) {
			//$("#move_number").html(result);
			start_a();
			//alert(result);
		});*/
		
	}
	
	function start_a() {
		//var i = $("#move_number").val();
		//$("#move_number").html(parseInt(i)+1);
		var t = setTimeout(function(){start_a()},3000);
		//alert(i);
	}
	
	
	function broj_poteza() 
	{
		//$("#move_number").html(5);
		
		
		var match_data = {
			id: <? echo '14'; ?>//,
			//user_ip: 5
		};
		$.ajax({
			url: "<? echo site_url('match_move1'); ?>",
			type: 'POST',
			data: match_data,
			success: function(result) {
				$("#move_number").html(result);
				/*if(result>0) {
					/*if($("#vote_count").html() != ":)") {
						var vc = $("#vote_count").html();
						$("#vote_count").html(parseInt(vc)-1);
					}
				} else {
					//$("#vote_count").html(":)");
				}*/
			}
		});
		
		//return false;
		
		
		var t = setTimeout(function(){broj_poteza()},3000);
		
	}
	
	
	
	
	
</script>


<div id="move_number">0</div>
<button onclick="broj_poteza()">promeni</button>
	
	
	
	
	
	
	
	
	
</body>
</html>