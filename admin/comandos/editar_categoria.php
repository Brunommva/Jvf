<?php require('../menu.php');

	require('../../conexao.php');


	
	$codigo = $_GET['codigo'];

	$select_categoria = mysqli_query($conexao, "SELECT * FROM categoria WHERE codigo = $codigo");
	
		if (mysqli_num_rows($select_categoria) > 0) {
			
			$dados_categoria = mysqli_fetch_assoc($select_categoria);
			
		} else {
			
			echo "<script> alert ('NÃO EXISTEM CATEGORIAS CADASTRADAS!');</script>";
				
			echo "<script> window.location.href='$url_admin/cadastro_categoria.php';</script>";

		}


	//VERIFICANDO DADOS PARA ATUALIZAR
	if (isset($_POST['codigo'])) {

		$codigo = $_POST['codigo'];      
	
		$categoria = $_POST['categoria'];

		$update_categoria = "UPDATE categoria SET categoria = '".$categoria."' WHERE codigo = $codigo";
	
       
        if (mysqli_query($conexao,$update_categoria)) {

            mysqli_close($conexao);

            echo "<script> alert ('CATEGORIA ATUALIZADO COM SUCESSO!');</script>";

            echo "<script> window.location.href='$url_admin/cadastro_categoria.php';</script>";
            
        } else {
        
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR.');</script>";

            echo "<script> window.location.href='$url_admin/cadastro_categoria.php';</script>";
            
            mysqli_close($conexao);
        }
    
    
    }
	
	//INSERIR DADOS
	else if (isset($_POST['btn_salvar'])) {      
	
		$categoria = $_POST['categoria'];
		
		$insert_categoria = "INSERT INTO categoria (categoria) VALUES ('$categoria')";
	
		if (mysqli_query($conexao,$insert_categoria)) {

				mysqli_close($conexao);

				echo "<script> alert ('CADASTRADO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_categoria.php';</script>";
		} 
            else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_categoria.php';</script>";
				
				mysqli_close($conexao);
		    }
	} 
?>


<!DOCTYPE html>
<html lang="pt-br">
	
<body>
	
    <main>
		<form name="categoria" class="cadastro" method="post">
			<h2> Cadastro de Categoria </h2><br>
			<div class="cadastro_div">
				
				<div>
					<label>Código</label>
					<input class="cadastro_categoria" type="number" name="codigo" value="<?php echo $dados_categoria["codigo"];?>" readonly>>
				</div>
				
				<div>
					<label>Tipo de Categoria</label>
					<input class="cadastro_categoria" type="text" name="categoria" value="<?php echo $dados_categoria['categoria'];?>" required autofocus>>
				</div>

			</div>
				<div class="botoes">
                    <input class="botao" type="submit" name="btn_salvar" value="Salvar">
            	</div>
		</form>
	</main>
</body>
</html>