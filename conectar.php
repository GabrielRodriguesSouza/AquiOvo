<?php
$con = mysqli_connect("localhost", "root", "", "atividade");
	
if( mysqli_connect_errno() ){
	echo "Erro na conexão:".( mysqli_connect_error() );
}

?>
