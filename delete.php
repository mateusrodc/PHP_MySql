<?php
$host='localhost';
$user='root';
$pass='';
$banco='meubanco';
$conexao= mysqli_connect($host,$user,$pass) or die(mysqli_error());
mysqli_select_db($conexao,$banco)or die(mysqli_error());
?>
<?php
	$sql = $conexao->prepare("DELETE  FROM usuarios WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]);
	$sql->execute();
	$sql->close(); 
	$conexao->close();
	header('location:lista.php');		
?>