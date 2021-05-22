<?php

	$faltantes="";
	if( !isset($_POST["CPF"])){
		$faltantes.=" CPF,";
	}
	
	if( !isset($_POST["Nome"]) ){
		$faltantes.=" Nome,";
	}
	
	if( !isset($_POST["Cidade"]) ){
		$faltantes.=" Cidade,";
	}
	if( !isset($_POST["Logradouro"]) ){
		$faltantes.=" Logradouro, ";
	}
	if( !isset($_POST["Numero"]) ){
		$faltantes.=" Numero, ";
	}
	if( !isset($_POST["Complemento"]) ){
		$faltantes.=" Complemento, ";
	}
	if( !isset($_POST["dia"]) ){
		$faltantes.=" dia";
	}
	if( !empty($faltantes)){
		exit("Necessário informar: ".$faltantes);
	}
		
	$cpf = $_POST["CPF"];
	$nome= $_POST["Nome"];
	$cid= $_POST["Cidade"];
	$log= $_POST["Logradouro"];
	$nu= $_POST["Numero"];
	$comple= $_POST["Complemento"];
	$dia= $_POST["dia"];

	include "conectar.php";
	
	$sql = "UPDATE tb_cadastro SET Nome='$nome', Cidade='$cid', Logradouro='$log', Numero='$nu', Complemento='$comple', dia='$dia' WHERE CPF= $cpf ";
	mysqli_query($con, $sql);
	
	$qtd = mysqli_affected_rows($con);
	
	if($qtd > 0){
		echo "Alteracao efetuada com sucesso";
	}else{
		echo "Erro ao alterar: ".mysqli_error($con);
	}
	
	mysqli_close($con);
?>