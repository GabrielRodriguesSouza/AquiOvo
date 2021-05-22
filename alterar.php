<?php

	if( !isset($_GET["CPF"])){
		exit("Necessário informar CPF");
	}
	
	$cpf = $_GET["CPF"];
	
	include "conectar.php";
	
	$sql = "SELECT * FROM tb_cadastro WHERE CPF = $cpf ";
	$result = mysqli_query($con, $sql);
	
	$qtd = mysqli_num_rows($result);
	
	if($qtd < 1 ){
		echo "Nenhum registro foi encontrado";
	}else{
		$registro = mysqli_fetch_assoc($result);
	}
	
	mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>	
		<title>AquiOvo</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		
	</head>
	<body>
		<form action="confirmar_alteracao.php" method="POST">
			<input type="hidden" name="CPF" value="<?php echo $registro["CPF"]?>"/>

			<label for="Nome">Nome</label>
				<input type="text" name="Nome" value="<?php echo $registro["Nome"]?>" required/><br/>

			<label for="Logradouro">Nome Rua</label>
				
			<input type="text" name="Logradouro" value="<?php echo $registro["Logradouro"]?>" required/><br/>

			<label for="Cidade">Cidade</label>
			<select name="Cidade" required>
					<option value="">Selecione</option>

					<option value="Curitiba" <?=$registro["Cidade"]=="Curitiba"? "SELECTED" : ""?>>Curitiba</option>

					<option value="Campo Largo" <?=$registro["Cidade"]=="Campo Largo"? "SELECTED" : ""?>>Campo Largo</option>

					<option value="Balsa Nova" <?=$registro["Cidade"]=="Balsa Nova"? "SELECTED" : ""?>>Balsa Nova</option>

					<option value="São Luiz do Purunã" <?=$registro["Cidade"]=="São Luiz do Purunã"? "SELECTED" : ""?>>São Luiz do Purunã</option>

			</select>
			<br/>
			<input type="submit" value="Alterar"/>
		</form>
	</body>
</html> 
