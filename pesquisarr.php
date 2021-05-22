<?php


include "conectar.php";
	$cpf = $_GET["CPF"];
	$sql = "SELECT * FROM tb_cadastro WHERE CPF LIKE '%$cpf%' ";
	$result = mysqli_query($con, $sql);
	
	$qtd = mysqli_num_rows($result);
	
	if($qtd < 1 ){
		echo "Nenhum registro foi encontrado";
	}else{
		echo "<table border=5>";
		echo "<tr>
			<th>CPF</th>
			<th>Nome</th>
			<th>Cidade</th>
			<th>Logradouro</th>
			<th>Numero</th>
			<th>Complemento</th>
			<th>Dia</th>
			<th>Excluir</th>
			<th>Alterar</th>
			</tr>";
		while($registro = mysqli_fetch_assoc($result) ){
			echo "<tr><td>{$registro["CPF"]}</td>";
			echo "<td>{$registro["Nome"]}</td>";
			echo "<td>{$registro["Cidade"]}</td>";
			echo "<td>{$registro["Logradouro"]}</td>";
			echo "<td>{$registro["Numero"]}</td>";
			echo "<td>{$registro["Complemento"]}</td>";
			echo "<td>{$registro["dia"]}</td>";
			echo "<td><a href='excluir.php?id={$registro["CPF"]}'> X </a></td>";
			echo "<td><a href='alterar.php?id={$registro["CPF"]}'> X </a></td>";
			echo "</tr>";
		}
		echo "</table>";
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
		<form action="pesquisarr.php" method="POST">
			<div>
				Nome: <input type="text" name="Nome" required/>
			</div>
			<br/>
			<input type="submit" value="Pesquisar"/>
		</form>
	</body>
</html> 