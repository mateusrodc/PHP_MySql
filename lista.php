<?php
$host='localhost';
$user='root';
$pass='';
$banco='meubanco';
$conexao= mysqli_connect($host,$user,$pass) or die(mysqli_error());
mysqli_select_db($conexao,$banco)or die(mysqli_error());

$sql = "SELECT * FROM usuarios";
$result = $conexao->query($sql);	
$conexao->close();		
?>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<title>Usuários</title>
</head>
<body>
	<div class="button_link"><a href="cadastrando.php">Cadastrar</a></div>
	<table class="tbl-qa">	
		<thead>
			 <tr>
				<th class="table-header" width="20%">Nome </th>
				<th class="table-header" width="20%"> Sobrenome </th>
				<th class="table-header" width="20%"> País </th>
				<th class="table-header" width="20%"> Estado </th>
				<th class="table-header" width="20%"> Cidade </th>
				<th class="table-header" width="20%"> E-mail </th>
				<th class="table-header" width="20%"> Senha </th>
				<th class="table-header" width="20%" colspan="2">Action</th>
			  </tr>
		</thead>
		<tbody>		
			<?php
				if ($result->num_rows > 0) {		
					while($row = $result->fetch_assoc()) {
			?>
			<tr class="table-row" id="row-<?php echo $row["id"]; ?>"> 
				<td class="table-row"><?php echo $row["nome"]; ?></td>
				<td class="table-row"><?php echo $row["sobrenome"]; ?></td>
				<td class="table-row"><?php echo $row["pais"]; ?></td>
				<td class="table-row"><?php echo $row["estado"]; ?></td>
				<td class="table-row"><?php echo $row["cidade"]; ?></td>
				<td class="table-row"><?php echo $row["email"]; ?></td>
				<td class="table-row"><?php echo $row["senha"]; ?></td>
				<!-- action -->
				<td class="table-row" colspan="2"><a href="editar.php?id=<?php echo $row["id"]; ?>" class="link"><img title="Editar" src="icon/edit.png"/></a> 
				<a href="delete.php?id=<?php echo $row["id"]; ?>" class="link"><img name="delete" id="delete" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir esse usuário?')" src="icon/delete.png"/></a></td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
</body>
</html>