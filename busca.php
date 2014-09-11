<?php
	




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Titulo</title>
	<link rel="stylesheet" href="">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" >
	function getStates(value){
		$.post("buscadorEnVivo.php",{valor:value},function(data){
			$("#results").html(data);
		});
	}

	</script>
</head>
<body>

<input type="text" onkeyup="getStates(this.value)"/>
<br/>
<div id="results">
	
</div>
</body>
</html>