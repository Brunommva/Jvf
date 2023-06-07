<?php require('../menu.php');

	require('../../conexao.php');


$codigo = $_GET['codigo'];

$select_veiculo = mysqli_query($conexao, "SELECT * FROM veiculo WHERE codigo = $codigo");
	
if (mysqli_num_rows($select_veiculo) > 0) {
    
    $dados_veiculo = mysqli_fetch_assoc($select_veiculo);
    
} else {
    
    echo "<script> alert ('NÃO EXISTEM AGENCIAS CADASTRADAS!');</script>";
        
    echo "<script> window.location.href='$url_admin/cadastro_veiculos.php';</script>";

}

//VERIFICANDO DADOS PARA ATUALIZAR
if (isset($_POST['codigo'])) {

	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$descricao = $_POST['descricao'];
	$ano = $_POST['ano'];
	$placa = $_POST['placa'];
	$fk_categoria_codigo = $_POST['fk_categoria_codigo'];
	$fk_grupo_codigo = $_POST['fk_grupo_codigo'];
		
	$update_veiculo = "UPDATE veiculo SET marca = '".$marca."', modelo = '".$modelo."', descricao = '".$descricao."', ano = '".$ano."', placa = '".$placa."', fk_categoria_codigo = '".$fk_categoria_codigo."', fk_grupo_codigo = '".$fk_grupo_codigo."' WHERE codigo = $codigo";

    if (mysqli_query($conexao,$update_veiculo)) {

        mysqli_close($conexao);

        echo "<script> alert ('AGENCIA ATUALIZADO COM SUCESSO!');</script>";

        echo "<script> window.location.href='$url_admin/cadastro_veiculos.php';</script>";
        
    } else {
    
        echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR.');</script>";

        echo "<script> window.location.href='$url_admin/cadastro_veiculos.php';</script>";
        
        mysqli_close($conexao);
    }
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

?>


<!DOCTYPE html>
<html lang="pt-br">

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

	<main>
		
		<form name="veiculo" class="cadastro" method="post">
			<h2> Cadastro de Veiculos </h2><br>	
		
			<div class="cadastro_div">

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
					<label>Código</label>
					<input class="cadastro_veiculos" type="text" name="codigo" value="<?php echo $dados_veiculo['codigo'];?>" readonly>>
				</div>


				<div>
					<label>Cadastre a marca</label>
					<input class="cadastro_veiculos" type="text" name="marca" value="<?php echo $dados_veiculo['marca'];?>" required autofocus>>
				</div>

				<div>
					<label>Cadastre o modelo</label>
					<input class="cadastro_veiculos" type="text" name="modelo" value="<?php echo $dados_veiculo['modelo'];?>" required autofocus>>
				</div>

				<div>
					<label>Cadastre o ano</label>
					<input class="cadastro_veiculos" type="text" name="ano" value="<?php echo $dados_veiculo['ano'];?>" required autofocus>>
				</div>

				<div>
					<label>Descrição do veiculo</label>
					<input class="cadastro_veiculos" type="text" name="descricao" value="<?php echo $dados_veiculo['descricao'];?>" required autofocus>>
				</div>

				<div>
					<label>Placa do veiculo</label>
					<input class="cadastro_veiculos" type="text" name="placa" value="<?php echo $dados_veiculo['placa'];?>" required autofocus>>
				</div>
			</div>

			<div class="botoes">
                <input class="botao" type="submit" id="btn_salvar" name="btn_salvar" value="Salvar">
            </div>
		</form>
	</main>
</body>
</html>