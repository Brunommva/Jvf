<?php require('../menu.php');

	require('../../conexao.php');


	$codigo = $_GET['codigo'];

	$delete_grupo = "DELETE FROM grupo WHERE codigo = $codigo";
	
	
		if (mysqli_query($conexao,$delete_grupo)) {

				mysqli_close($conexao);

				echo "<script> alert ('EXCLUÍDO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";
				
				mysqli_close($conexao);
			}
?>