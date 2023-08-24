<?php
session_start();

require_once('classes/Usuario.php');
 require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);

if(isset($_POST['logar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

if ($usuario->logar($nome,$senha)){
    $_SESSION['nome'] = $nome;
    header("Location: dashboard.php");
    exit();
}else{
    print "<script>alert('Credenciais Inválidas')</script>";
}

}


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tela de Login</title>
</head>
<body>
<form method="POST" action="">
    
    <label for="nome">Nome</label>
    <input type="text" name= "nome" placeholder="Digite se nome">
    
    <label for="Senha">Senha</label>
    <input type="password" name= "senha" placeholder="Digite sua Senha">

    <button type="submit" name="logar">Logar</button>

</form>

    <a href="cadastrar.php"> Clique aqui para criar uma conta </a>

    
</body>
</html>
