<?php

if( isset($_POST["Button"])){

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
	
	$sql = "INSERT INTO tb_cadastro VALUES ($cpf, '$nome', '$cid', '$log', '$nu', '$comple', '$dia') ";

	mysqli_query($con, $sql);
	
	$qtd = mysqli_affected_rows($con);
	
	if($qtd > 0){
		echo "Cadastro efetuado com sucesso";
	}else{
		echo "Erro ao cadastrar: ".mysqli_error($con);
	}
	
	mysqli_close($con);
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
					<a href="index.html">Home</a>
					<a href="nutrição.html">Valor Nutricional</a>
					<a href="empresa.html">Sobre Empresa</a>
					<a href="entrar.php">Sobre cliente</a>

				</div>
			</div>
		</div>

		
		<div id="area-principal">
			
			<div id="postagem">
				<h2>Cadastro</h2>
		<div align="right"> 
			<a href="pesquisarr.html">Pesquisar</a>
		</div>
				<fieldset>
 <form action="include.php" method="POST">

        <div>
            <label for="CPF">CPF:</label>
        </div>
            <input type="text" name="CPF" class="mask" placeholder=" 000.000.000-00" required/> 
        
		<div>
            <label for=" Nome"> Nome:</label>
        </div>
            <input type="text" id=" Nome" name=" Nome" placeholder="Nome" size="20"  required=/> 
        
        <p></p>

        <div class="odd" align="left">Cidade
<select name="Cidade" id="Cidade" class="tooltip2" title="Selecione" required/>
	<option value="0"></option>
	<option value="1">Curitiba</option>
	<option value="2">Campo Largo</option>
	<option value="3">Balsa Nova</option>
	<option value="4">São Luiz do Purunã</option>
</select>
		</div>
<p></p>

<div>
	<div>Logradouro:</div>	
	<input type="text" name="Logradouro" placeholder="R.Tenente Coronel" required/>
</div>

<div>
	<label for="numero">Número</label>
</div>
		<input id="Numero" type="text" name="Numero" required/>
		<div>
			<div>Complemento</div>
			
			<input for="complement" type="text" placeholder="Complemento" name="Complemento" required/>
		</div>
		<p></p>
		    <label for="date">Dia preferido para entrega:</label>
            <input type="date" id="dia" name="dia" size="26"placeholder="aaaa/mm/dd" required/>
           
    
 <p></p>
    <button type="submit"  value="cadastrar" name="Button">Enviar</button>
 <p></p>
      		
</form>
</fieldset>

			</div>
		
		</div>
	
	</body>
</html>