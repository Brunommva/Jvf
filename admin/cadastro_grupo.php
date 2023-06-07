<?php require ('menu.php');

require('../conexao.php');
	
	//VERIFICANDO DADOS PARA ATUALIZAR
	if (isset($_POST['codigo'])) {

		$codigo = $_POST['codigo'];      
	
		$grupo = $_POST['grupo'];

		$update_grupo = "UPDATE grupo SET grupo = '".$grupo."'WHERE codigo = $codigo";
	}
	
	//INSERIR DADOS
	else if (isset($_POST['btn_salvar'])) {      
	
		$grupo = $_POST['grupo'];
		
		$insert_grupo = "INSERT INTO grupo (grupo) VALUES ('$grupo')";
	
		if (mysqli_query($conexao,$insert_grupo)) {

				mysqli_close($conexao);

				echo "<script> alert ('CADASTRADO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";
				
				mysqli_close($conexao);
			}
	} 

	//SELECIONAR DADOS
	$select_grupo = mysqli_query($conexao, "SELECT * FROM grupo ORDER BY codigo ASC");

	if (mysqli_num_rows($select_grupo) > 0) {
		
		$dados_grupo = mysqli_fetch_assoc($select_grupo);
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<script>
			function confirmar_exclusao(codigo) {
		    	var resposta = confirm("Deseja continuar com a exclusão?");
		    	if (resposta == true) { window.location.href = "comandos/excluir_grupo.php?codigo="+codigo;}
			}
		</script>
	</head>


<body>
	
	<form name="grupo" class="cadastro" method="post">

		<div>
			<legend>Cadastre o Grupo</legend>	
			<input class="cadastro_categoria" type="text" placeholder="grupo A, grupo B, grupo C " name="grupo" required autofocus>
		</div>
			
		<div>
			<input class="botao" type="submit" name="btn_salvar" value="inserir"></div>
		</div>
	</form>



		<table>
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Descrição</th>
					<th>Editar</th>
					<th>Apagar</th>
				</tr>
			</therd>
			<tbody>

				<?php do{
				
				?>

				<tr>
					<td><?php echo $dados_grupo['codigo'];?></td>
					<td><?php echo $dados_grupo['grupo'];?></td>
				
					<td>
						<a href="comandos/editar_grupo.php?codigo=<?php echo $dados_grupo['codigo'];?>">
						<img src="../img/editar.png" title="Editar"></a>
					</td>
					<td>
						<a href="javascript:func()" onclick="confirmar_exclusao('<?php echo $dados_grupo['codigo'];?>')">
						<img src="../img/lixeira.png" title="Excluir"></a>	
					</td>
				</tr>

				<?php }while ($dados_grupo = mysqli_fetch_assoc($select_grupo));?>
				
			</tbody>
		</table>





		
</body>
</html>