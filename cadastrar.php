<?php
    require_once('classes/Usuario.php');
    require_once('conexao/conexao.php');

    $database = new Conexao();
    $db = $database->getConnection();
    $usuario = new Usuario($db);

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['confSenha'];

        if($usuario->cadastrar($nome, $email, $senha, $confSenha)){
            echo "Cadastro realizado com sucesso";
        }else{
            echo "Erro ao cadastrar!";
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
    <title>Tela de Cadastro</title>
</head>
<body>
    <form method="POST">
    
    <label for="">Nome de Usuario</label>
    <input type="text" name= "nome">
    
    <label for="">Email</label>
    <input type="email" name= "email">
    
    <label for="">Senha</label>
    <input type="password" name= "senha"  minlength="8">
    
    <label for="">Confirmar Senha</label>
    <input type="password" name= "confSenha">
    
    <button type="submit" name="cadastrar">Cadastrar</button>

</form>

<a href="index.php">Voltar para a pagina de Login </a>

</body>
</html>