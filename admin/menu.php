<?php session_start();

    
	if (!isset($_SESSION['usuario'])) {	
	    
	    session_destroy();
	 
	    unset ($_SESSION['usuario']);
	    unset ($_SESSION['tipo']);

		echo "<script> alert ('ERRO: É NECESSÁRIO FAZER LOGIN');</script>";
		
		echo "<script> window.location.href='$url_admin';</script>";

	}	

	if ($_SESSION['tipo'] <> 0) {

		echo "<script> alert('ERRO: VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA!');</script>";					
		session_destroy();
	 
		unset ($_SESSION['nome']);
		unset ($_SESSION['usuario']);
		unset ($_SESSION['tipo']);

		unset ($_SESSION['url']);
		unset ($_SESSION['url_admin']);
		unset ($_SESSION['url_aluno']);

		echo "<script> window.location.href='$url';</script>";				
	} 
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['url']."/css/portal.css";?>">
		<title>JVF VEÍCULOS</title>
	</head>


<body>
	<header>
		<nav class="menu_h">
			<ul>
				<li>
					<a href="<?php echo $_SESSION['url']."/admin/topo.php"?>">Home</a>
				</li>


				<li>
					<a href="<?php echo $_SESSION['url']."/admin/cadastro_categoria.php"?>">Cadastro de Categoria</a>
				</li>
				<li>
					<a href="<?php echo $_SESSION['url']."/admin/cadastro_grupo.php"?>">Cadastre o Grupo</a>
				</li>
				<li>
					<a href="<?php echo $_SESSION['url']."/admin/cadastro_veiculos.php"?>">Cadastro de Veiculos</a>
				</li>
				<li>
					<a href="<?php echo $_SESSION['url']."/sair.php"?>">Sair</a>
				</li>
			</ul>
		</nav>
	</header>
