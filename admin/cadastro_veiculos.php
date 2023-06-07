<?php require ('menu.php');

require('../conexao.php');

//VERIFICANDO DADOS PARA ATUALIZAR
if (isset($_POST['codigo'])) {

	$codigo = $_POST['codigo'];      
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$descricao = $_POST['descricao'];
	$ano = $_POST['ano'];
	$placa = $_POST['placa'];
	$fk_categoria_codigo = $_POST['fk_categoria_codigo'];
	$fk_grupo_codigo = $_POST['fk_grupo_codigo'];

	$update_veiculo = "UPDATE veiculo SET marca = '".$marca."', modelo = '".$modelo."', descricao = '".$descricao."', ano = '".$ano."', placa = '".$placa."', fk_categoria_codigo = '".$fk_categoria_codigo."', fk_grupo_codigo = '".$fk_grupo_codigo."' WHERE codigo = $codigo";
}

//INSERIR DADOS
else if (isset($_POST['btn_salvar'])) {      

	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$descricao = $_POST['descricao'];
	$ano = $_POST['ano'];
	$placa = $_POST['placa'];
	$fk_categoria_codigo = $_POST['fk_categoria_codigo'];
	$fk_grupo_codigo = $_POST['fk_grupo_codigo'];

	$insert_veiculo = "INSERT INTO veiculo (marca, modelo, descricao, ano, placa, fk_categoria_codigo, fk_grupo_codigo) VALUES ('$marca','$modelo','$descricao','$ano','$placa','$fk_categoria_codigo','$fk_grupo_codigo')";

	if (mysqli_query($conexao,$insert_veiculo)) {

			mysqli_close($conexao);

			echo "<script> alert ('CADASTRADO COM SUCESSO!');</script>";

			echo "<script> window.location.href='$url_admin/cadastro_veiculos.php';</script>";
			
		} else {
		
			echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";

			echo "<script> window.location.href='$url_admin/cadastro_veiculos.php';</script>";
			
			mysqli_close($conexao);
		}
} 

//SELECIONAR DADOS
$select_veiculo = mysqli_query($conexao, "SELECT * FROM veiculo ORDER BY codigo ASC");

if (mysqli_num_rows($select_veiculo) > 0) {
	
	$dados_veiculo = mysqli_fetch_assoc($select_veiculo);
}

?>






<!DOCTYPE html>
<html lang="pt-br">
	
	<head>
		<script>
			function confirmar_exclusao(codigo) {
		    	var resposta = confirm("Deseja continuar com a exclusão?");
		       	if (resposta == true) { window.location.href = "comandos/excluir_veiculo.php?codigo="+codigo;}
			}
		</script>
	</head>	


<body>

<?php
	//SELECIONAR DADOS TABELA ESTRANGEIRA (CATEGORIA)
		$select_categoria = mysqli_query($conexao, "SELECT * FROM categoria");

		if (mysqli_num_rows($select_categoria) > 0) {
	
		$dados_categoria = mysqli_fetch_assoc($select_categoria);
	}

	//SELECIONAR DADOS TABELA ESTRANGEIRA (AGENCIA)
		$select_grupo = mysqli_query($conexao, "SELECT * FROM grupo");

		if (mysqli_num_rows($select_grupo) > 0) {

		$dados_grupo = mysqli_fetch_assoc($select_grupo);
	}

	?>



	<form name="veiculo" class="cadastro" method="post">

				<div>
					<label>Selecione a categoria</label>
					<select class="cadastro_veiculos" name="fk_categoria_codigo">
						<?php do{
						?>
						<option value="<?php echo $dados_categoria['codigo'];?>"><?php echo $dados_categoria['categoria'];?></option>
						
						<?php }while ($dados_categoria = mysqli_fetch_assoc($select_categoria));?>
					</select>
				</div>

				<div>
					<label>Selecione o grupo</label>
					<select class="cadastro_veiculos" name="fk_grupo_codigo">
						<?php do{
						?>
						<option value="<?php echo $dados_grupo['codigo'];?>"><?php echo $dados_grupo['grupo'];?></option>
						
						<?php }while ($dados_grupo = mysqli_fetch_assoc($select_grupo));?>
					</select>
				</div>


		<div>
			<legend>Cadastre a Marca</legend>	
			<input class="cadastro_veiculos" type="text" placeholder="Ford, volkswagen, Fiat" name="marca" required autofocus>
		</div>

		<div>
			<legend>Cadastre o Modelo do veículo</legend>	
			<input class="cadastro_veiculos" type="text" placeholder="Gol, Palio, Touro" name="modelo" required autofocus>
		</div>

		<div>
			<legend>Ano do veículo</legend>	
			<input class="cadastro_veiculos" type="text" placeholder="00000000" name="ano" required autofocus>
		</div>

		<div>
			<legend>Descrição do Veículo</legend>	
			<input class="cadastro_veiculos" type="text" placeholder="Vermelho, Azul" name="descricao" required autofocus>
		</div>
		
		<div>
			<legend>Placa do Veículo</legend>	
			<input class="cadastro_veiculos" type="text" placeholder="000-0000" name="placa" required autofocus>
		</div>


		<div>
			<input class="botao" type="submit" name="btn_salvar" value="inserir"></div>
		</div>

	</form>


	<table>
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Categoria</th>
				<th>Grupo</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Descrição</th>
				<th>Ano</th>
				<th>Placa</th>
			</tr>
		</therd>
		<tbody>

			<?php do{
				
			?>

			<tr>
				<td><?php echo $dados_veiculo['codigo'];?></td>
				<td><?php echo $dados_veiculo['fk_categoria_codigo'];?></td>
				<td><?php echo $dados_veiculo['fk_grupo_codigo'];?></td>
				<td><?php echo $dados_veiculo['marca'];?></td>
				<td><?php echo $dados_veiculo['modelo'];?></td>
				<td><?php echo $dados_veiculo['descricao'];?></td>
				<td><?php echo $dados_veiculo['ano'];?></td>
				<td><?php echo $dados_veiculo['placa'];?></td>

				<td>
					<a href="comandos/editar_veiculo.php?codigo=<?php echo $dados_veiculo['codigo'];?>">
					<img src="../img/editar.png" title="Editar"></a>
				</td>
				
				<td>
					<a href="javascript:func()" onclick="confirmar_exclusao('<?php echo $dados_veiculo['codigo'];?>')">
					<img src="../img/lixeira.png" title="Excluir"></a>
				</td>
			</tr>
				
				<?php }while ($dados_veiculo = mysqli_fetch_assoc($select_veiculo));?>
			
		</tbody>
	</table>


		
</body>
</html>