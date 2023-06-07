<?php require('../menu.php');

	require('../../conexao.php');


	
	$codigo = $_GET['codigo'];

	$select_grupo = mysqli_query($conexao, "SELECT * FROM grupo WHERE codigo = $codigo");
	
		if (mysqli_num_rows($select_grupo) > 0) {
			
			$dados_grupo = mysqli_fetch_assoc($select_grupo);
			
		} else {
			
			echo "<script> alert ('NÃO EXISTEM CATEGORIAS CADASTRADAS!');</script>";
				
			echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";

		}


	//VERIFICANDO DADOS PARA ATUALIZAR
	if (isset($_POST['codigo'])) {

		$codigo = $_POST['codigo'];      
	
		$grupo = $_POST['grupo'];

		$update_grupo = "UPDATE grupo SET grupo = '".$grupo."' WHERE codigo = $codigo";
	
       
        if (mysqli_query($conexao,$update_grupo)) {

            mysqli_close($conexao);

            echo "<script> alert ('CATEGORIA ATUALIZADO COM SUCESSO!');</script>";

            echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";
            
        } else {
        
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR.');</script>";

            echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";
            
            mysqli_close($conexao);
        }
    
    
    }
	
	//INSERIR DADOS
	else if (isset($_POST['btn_salvar'])) {      
	
		$grupo = $_POST['grupo'];
		
		$insert_grupo = "INSERT INTO grupo (grupo) VALUES ('$grupo')";
	
		if (mysqli_query($conexao,$insert_grupo)) {

				mysqli_close($conexao);

				echo "<script> alert ('CADASTRADO COM SUCESSO!');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";
		} 
            else {
			
				echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR.');</script>";

				echo "<script> window.location.href='$url_admin/cadastro_grupo.php';</script>";
				
				mysqli_close($conexao);
		    }
	} 
?>


<!DOCTYPE html>
<html lang="pt-br">
	
<body>
	
    <main>
		<form name="grupo" class="cadastro" method="post">
			<h2> Cadastro de Grupo </h2><br>
			<div class="cadastro_div">
				
				<div>
					<label>Código</label>
					<input class="cadastro_categoria" type="number" name="codigo" value="<?php echo $dados_grupo["codigo"];?>" readonly>>
				</div>
				
				<div>
					<label>Tipo de Categoria</label>
					<input class="cadastro_categoria" type="text" name="grupo" value="<?php echo $dados_grupo['grupo'];?>" required autofocus>>
				</div>

			</div>
				<div class="botoes">
                    <input class="botao" type="submit" name="btn_salvar" value="Salvar">
            	</div>
		</form>
	</main>
</body>
</html>