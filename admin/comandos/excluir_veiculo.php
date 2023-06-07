<?php require('../menu.php');

	require('../../conexao.php');


	$codigo = $_GET['codigo'];

	$delete_veiculo = "DELETE FROM veiculo WHERE codigo = $codigo";
	
	
		if (mysqli_query($conexao,$delete_veiculo)) {

				mysqli_close($conexao);

				echo "<script> alert ('EXCLUÍDO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_veiculos.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_veiculos.php';</script>";
				
				mysqli_close($conexao);
			}
?>