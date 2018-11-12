<html>
    <head>
        <meta charset="utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" />
        <title>Cadastro</title>
        <style>
        .tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
        </style>
    </head>
    <body>
        <div>
            <form name='signup' method='post' action=''>
            <div class="button_link"><a href="lista.php"> Voltar </a></div>
            <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
                <thead>
		            <tr>
			            <th colspan="2" class="table-header">Cadastrar um novo Usuário</th>
		            </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
			            <td><label>Nome</label></td>
			            <td><input type="text" name="nome" class="txtField" required></td>
		            </tr>
                    <tr class="table-row">
			            <td><label>Sobrenome</label></td>
			            <td><input type="text" name="sobrenome" class="txtField" required></td>
		            </tr>
                    <tr class="table-row">
			            <td><label>País</label></td>
			            <td><input type="text" name="pais" class="txtField" required></td>
		            </tr>
                    <tr class="table-row">
			            <td><label>Estado</label></td>
			            <td><input type="text" name="estado" class="txtField" required></td>
		            </tr>
                    <tr class="table-row">
			            <td><label>Cidade</label></td>
			            <td><input type="text" name="cidade" class="txtField" required></td>
		            </tr>
                    <tr class="table-row">
			            <td><label>E-mail</label></td>
			            <td><input type="text" name="email" class="txtField" required></td>
		            </tr>
                    <tr class="table-row">
			            <td><label>Senha</label></td>
			            <td><input type="password" name="senha" class="txtField" required></td>
                    </tr>
                    <tr class="table-row">
			            <td colspan="2"><input type="submit" name="salvar" value="Salvar" class="demo-form-submit"></td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    </body>
</html>
<?php
    $host='localhost';
    $user='root';
    $pass='';
    $banco='meubanco';
    $conexao= mysqli_connect($host,$user,$pass) or die(mysqli_error());
    mysqli_select_db($conexao,$banco)or die(mysqli_error());
?>
<?php
    $nome=isset($_POST["nome"])? $_POST["nome"]:"";
    $sobrenome= isset($_POST["sobrenome"])? $_POST["sobrenome"]:"";
    $pais= isset($_POST["pais"])? $_POST["pais"]:"";
    $estado= isset($_POST["estado"])? $_POST["estado"]:"";
    $cidade= isset($_POST["cidade"])? $_POST["cidade"]:"";
    $email= isset($_POST["email"])? $_POST["email"]:"";
    $senha= isset($_POST["senha"])? $_POST["senha"]:"";
    if (isset($_POST['salvar'])){
        $sql= mysqli_query($conexao,"INSERT INTO usuarios(nome,sobrenome,pais,estado,cidade,email,senha) VALUES
        ('$nome','$sobrenome','$pais','$estado','$cidade','$email','$senha')");
        echo "<center><h1>Cadastro Realizado</h1></center>";
        mysqli_close($conexao);
    }

    
?>