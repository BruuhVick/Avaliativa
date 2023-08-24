<?php
session_start();

if(!isset($_SESSION['nome'])){
    header ("Location: index.php");
    exit();
}

$nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
             font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: #6495ED;
            height:98vh;
            background-image: url("img/5Tz.gif");
            background-repeat: no-repeat;
            background-position: right center;
            margin: 50;
            padding: 50;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #323232;
            text-align: left;

        }
        p {
            font-size: 30px;
            margin-bottom: 20px;
            text-align: left;

        }
        a {
            display: block;
            text-align: left;
            color: #00008B;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>
    <h1>Painel de Controle</h1>
    <p> Olá,Seja bem-vindo(a) <?php echo $_SESSION['nome']; ?> </p>

    <a href="logout.php">Sair</a>
</body>
</html>
