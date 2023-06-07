<?php

		$servidor = "sql9.freemysqlhosting.net";
		$usuario = "sql9624166";
		$senha = "zLyPw8s3qz";
		$db_name = "sql9624166";

		$conexao = mysqli_connect($servidor, $usuario, $senha, $db_name) or die('banco de dados indisponivel.');

		date_default_timezone_set("America/Manaus");

		$host_ip = $_SERVER['HTTP_HOST'];

		$url = "http://".$host_ip."/";

		$url_admin = "http://".$host_ip."/admin";

		$url_login = "http://".$host_ip."/login.php";

		$url_login_gestao = "http://".$host_ip."/login.php";
?>
