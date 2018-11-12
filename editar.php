<?php
	$host='localhost';
	$user='root';
	$pass='';
	$banco='meubanco';
	$conexao= mysqli_connect($host,$user,$pass) or die(mysqli_error());
	mysqli_select_db($conexao,$banco)or die(mysqli_error());
	if (isset($_POST['salvar'])) {		
		$sql = $conexao->prepare("UPDATE usuarios SET nome=? , sobrenome=? , pais=? , estado=?,
		cidade=? , email=? , senha=?  WHERE id=?");
		$nome=$_POST['nome'];
		$sobrenome= $_POST['sobrenome'];
        $pais= $_POST['pais'];
        $estado= $_POST['estado'];
        $cidade= $_POST['cidade'];
        $email= $_POST['email'];
        $senha= $_POST['senha'];
		$sql->bind_param($nome, $sobrenome, $pais,$estado,$cidade,$email,$senha,$_GET["id"]);

	}
	$sql = $conexao->prepare("SELECT * FROM usuarios WHERE id=?");
	$sql->bind_param("i",$_GET["id"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conexao->close();
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
<title>Editar </title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div class="button_link"><a href="lista.php" >Voltar </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Editar</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>Nome</label></td>
			<td><input type="text" name="nome" class="txtField" value="<?php echo $row["nome"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Sobrenome</label></td>
			<td><input type="text" name="sobrenome" class="txtField" value="<?php echo $row["sobrenome"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Pais</label></td>
			<td><input type="text" name="pais" class="txtField" value="<?php echo $row["pais"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Estado</label></td>
			<td><input type="text" name="estado" class="txtField" value="<?php echo $row["estado"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Cidade</label></td>
			<td><input type="text" name="cidade" class="txtField" value="<?php echo $row["cidade"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>E-mail</label></td>
			<td><input type="text" name="email" class="txtField" value="<?php echo $row["email"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Senha</label></td>
			<td><input type="text" name="senha" class="txtField" value="<?php echo $row["senha"]?>"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="salvar" value="Salvar" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>