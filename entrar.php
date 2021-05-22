<?php

if( isset($_POST["Buttonok"])){

	$faltantes="";
	if( !isset($_POST["Senha"])){
		$faltantes.=" Senha,";
	}
	
	if( !empty($faltantes)){
		exit("Necessário informar: ". $faltantes);
	}else{
		
	$Senha = $_POST["Senha"];

	include "conectar.php";
	
	$sql = "select * from  tb_cadastro where Senha = md5('$Senha') ";

	$r = mysqli_query($con, $sql);
	
	$qtd = mysqli_num_rows($r);
	
	if($qtd > 0){
			header("location:include.php");
				}else{
		echo "loguin invalido";
				}
	
	mysqli_close($con);
	}
}
?>

<!DOCTYPE html>
<html>
	
	<head>	
		<title>AquiOvo - Cadastro</title>

		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		
	</head>

	<body>
		
		<div id="navegacao">
			<div id="area">
				<h1 id="logo"><span class="azul">Aqui</span>Ovo</h1>
				<div id="menu">

					<a href="empresa.html">Sobre Empresa</a>
				</div>
			</div>
		</div>

		
		<div id="area-principal">
			
		<div id="postagem">
				<h2>Entrar</h2>

						<fieldset>
 <form action="include.php" method="POST">

		<div>
			<div>Senha</div>
			
			<input for="complement" type="text" placeholder="Complemento" name="Complemento" required/>
		</div>
		
 <p></p>
    <button type="submit"  value="cadastrar" name="Buttonok">Enviar</button>
 <p></p>
      		
</form>
</fieldset>

			</div>
		
		</div>
	
	</body>