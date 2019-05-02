<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<? echo link_tag('css/style.css'); ?>		
	<style type="text/css">
		.prvi {
			background: blue;
		}
		.drugi {
			background: green;
		}
		.treci {
			background: silver;
		}		
		.prvi, .drugi, .treci {
			height: 100px;
			width: 100px;		
		}
	</style>
	
	<script type="text/javascript">
		/*function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
		}*/		
		
		
		function func() {
			//alert('a');
			var elem = document.createElement('img');
			elem.setAttribute("height", "70");
			elem.setAttribute("width", "70");
			elem.src = '<? echo site_url('images/test/figure.png'); ?>';
			document.getElementById("H1").appendChild(elem);
		}
		
		function func1() {

			var elem = document.createElement('div');
			elem.setAttribute("class", "w_pawn");
			document.getElementById("H1").appendChild(elem);
		}
		
	</script>
	
</head>
<body>
	<div>
		<!--div class="prvi" ondrop="drop(event)" ondragover="allowDrop(event)">
		</div>
		<div class="drugi" ondrop="drop(event)" ondragover="allowDrop(event)">
			<img id="drag1" src="<? echo site_url('images/test/figure.png'); ?>" alt="" draggable="true" ondragstart="drag(event)"/>
		</div>
		<div class="treci" ondrop="drop(event)" ondragover="allowDrop(event)">
		</div-->
		
		<div class="prvi">
		</div>
		<div class="drugi">
			<img id="drag1" src="<? echo site_url('images/test/figure.png'); ?>" alt=""/>
		</div>
		<div class="treci">
		</div>		
		
	</div>
	
	<button onclick="func1()">dodaj</button>
	
	
	<? $this->load->view('comps/test/chess_table');  ?>
	
	
	
</body>
</html>