<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	
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
		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			ev.dataTransfer.setData("text", ev.target.id);
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
		}		
	</script>
	
</head>
<body>
	<div>
		<div class="prvi" ondrop="drop(event)" ondragover="allowDrop(event)">
		</div>
		<div class="drugi" ondrop="drop(event)" ondragover="allowDrop(event)">
			<img id="drag1" src="<? echo site_url('images/test/figure.png'); ?>" alt="" draggable="true" ondragstart="drag(event)"/>
		</div>
		<div class="treci" ondrop="drop(event)" ondragover="allowDrop(event)">
		</div>
		
	</div>
</body>
</html>