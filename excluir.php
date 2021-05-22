<?php

	if( !isset($_GET["CPF"])){
		exit("Necessário informar o CPF");
	}
			
	$cpf = $_GET["CPF"];
	
	include "conectar.php";
	
	$sql = "DELETE FROM tb_cadastro WHERE CPF = $cpf ";
	mysqli_query($con, $sql);
	
	$qtd = mysqli_affected_rows($con);
	
	if($qtd > 0){
		echo "Remocao efetuada com sucesso";
	}else{
		echo "Erro ao excluir: ".mysqli_error($con);
	}
	
	mysqli_close($con);
?>