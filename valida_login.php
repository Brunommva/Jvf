<?php session_start();

	require('conexao.php');


	if (isset($_POST['usuario'])) {      
	
		$usuario = $_POST['usuario'];
		$senha = md5($_POST['senha']);
	
		$sql_valida_login = mysqli_query($conexao,"SELECT * FROM login_gestao WHERE usuario = '".$usuario."' AND senha = '".$senha."'");
		
		if(mysqli_num_rows($sql_valida_login) > 0){
	
			$registros_login = mysqli_fetch_assoc($sql_valida_login);
				 
			$_SESSION['nome'] = $registros_login['nome'];
			$_SESSION['usuario'] = $registros_login['usuario'];
			$_SESSION['tipo'] = $registros_login['tipo'];


			$_SESSION['url'] = $url;
			$_SESSION['url_admin'] = $url_admin;
			$_SESSION['url'] = $url;
					
			
				if($_SESSION['tipo'] == 0){

					/*echo "<script> alert('Administrador [LOGADO]');</script>";*/

					echo "<script> window.location.href='$url_admin';</script>";	




				}else{

					/*echo "<script> alert('Aluno [LOGADO]');</script>";*/

					echo "<script> window.location.href='$url';</script>";

				}
			
		} else {

			echo "<script> alert('Erro ao fazer login. Tente novamente ou fale com o Administrador.');</script>";

			echo "<script> window.location.href='$url_login_gestao';</script>";
			
		}

	}

?> 