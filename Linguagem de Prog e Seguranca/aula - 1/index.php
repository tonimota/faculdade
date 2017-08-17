<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<title>Teste</title>
	<style type="text/css">
		section {
			width: 100vw;
			height: 100vh;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#send").click(function(){
				var number = $("#number").val();
				if(number > 42) {
					alert("Errou");
				}
			});

		});
	</script>
	<?php 
		$link = mysqli_connect("localhost", "administrador", "6yHEjdACyCpVBYx4","toni_mota");
		mysql_select_db("toni_mota");
		if (!$link) {
		    die('Não foi possível conectar: ' . mysql_error());
		}
		echo 'Conexão bem sucedida'."<br>";

		$sql = ('SELECT * from agenda');

		$result = mysqli_query($link,$sql);

	
		// $text = mysqli_fetch_assoc($result); 

		// echo $text['nome'];


		while ($text = mysqli_fetch_assoc($result)) {
			echo $text['nome']."<br>"; // Exibe o valor da coluna `nome`
		}



		// foreach ($text as $key) {
		// 	echo $key;
		// }

		// mysql_close($link);
	?>
</head>
<body>
<section>
	<div>
		<label>Número</label>
		<input type="number" name="number" id="number">
		<button type="submit" id="send">Enviar</button>
	</div>
</section>

</body>
</html>