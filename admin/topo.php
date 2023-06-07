
<?php require('menu.php');?>



<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/portal.css">
		<title>JVF VEÍCULOS</title>
	</head>
<body>
		
	<main class="conteudo">
		<div>
			<center>
				<p> JVF VEÍCULOS</p>
			</center>
			
			<img src="../img/frota.png" class="carro_home">

		</div>


		<label><?php echo "Seja bem-vindo, ". $_SESSION['nome'];?><br>Data: <?php echo date('d/m/Y à\s H:i:s');?></label>
	</main>
	
		
</body>
</html>