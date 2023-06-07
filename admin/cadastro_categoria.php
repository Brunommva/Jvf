<?php require ('menu.php');

require('../conexao.php');
	
	//VERIFICANDO DADOS PARA ATUALIZAR
	if (isset($_POST['codigo'])) {

		$codigo = $_POST['codigo'];      
	
		$categoria = $_POST['categoria'];

		$update_categoria = "UPDATE categoria SET categoria = '".$categoria."'WHERE codigo = $codigo";
	}
	
	//INSERIR DADOS
	else if (isset($_POST['btn_salvar'])) {      
	
		$categoria = $_POST['categoria'];
		
		$insert_categoria = "INSERT INTO categoria (categoria) VALUES ('$categoria')";
	
		if (mysqli_query($conexao,$insert_categoria)) {

				mysqli_close($conexao);

				echo "<script> alert ('CADASTRADO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_categoria.php';</script>";
				
			} else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_categoria.php';</script>";
				
				mysqli_close($conexao);
			}
	} 

	//SELECIONAR DADOS
	$select_categoria = mysqli_query($conexao, "SELECT * FROM categoria ORDER BY codigo ASC");

	if (mysqli_num_rows($select_categoria) > 0) {
		
		$dados_categoria = mysqli_fetch_assoc($select_categoria);
	}

?>




<!DOCTYPE html>
<html lang="pt-br">
	
	<head>
		<script>
			function confirmar_exclusao(codigo) {
		    	var resposta = confirm("Deseja continuar com a exclusão?");
		    	if (resposta == true) { window.location.href = "comandos/excluir_categoria.php?codigo="+codigo;}
			}
		</script>
	</head>

<body>
		
	<form name="categoria" class="cadastro" method="post">

		<div>
			<legend>Cadastre a Categoria</legend>	
			<input class="cadastro_categoria" type="text" placeholder="Carro, Moto, Caminhão" name="categoria" required autofocus>
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
					<td><?php echo $dados_categoria['codigo'];?></td>
					<td><?php echo $dados_categoria['categoria'];?></td>
				
					<td>
						<a href="comandos/editar_categoria.php?codigo=<?php echo $dados_categoria['codigo'];?>">
						<img src="../img/editar.png" title="Editar"></a>
					</td>
					<td>
						<a href="javascript:func()" onclick="confirmar_exclusao('<?php echo $dados_categoria['codigo'];?>')">
						<img src="../img/lixeira.png" title="Excluir"></a>	
					</td>
				</tr>

				<?php }while ($dados_categoria = mysqli_fetch_assoc($select_categoria));?>
				
			</tbody>
	</table>



	
		
</body>
</html>