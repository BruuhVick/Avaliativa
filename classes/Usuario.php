<?php
include('conexao/conexao.php');

$db = new Conexao();

class Usuario{
    private $conn;

    public function __construct($db){
            $this->conn = $db;
        
    }

    public function cadastrar($nome, $email, $senha, $confSenha)
    {
        if($senha === $confSenha){

        $nomeExistente = $this->verificarnomeExistente($nome);    
        $emailExistente = $this->verificarEmailExistente($email);
        if($emailExistente){
            print "<script> alert('Nome e/ou Email ja cadastrado')</script>";
            return false;
        }

        $senhaCriptografada = password_hash ($senha,PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario (nome_usuario, email, senha) VALUES (?, ?, ?)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindValue(1,$nome);
        $stmt -> bindValue(2,$email);
        $stmt -> bindValue(3,$senhaCriptografada);
        $result=$stmt->execute();

        return $result;
    }else{
        return false;
    }
}

private function verificarNomeExistente($nome){
    $sql= "SELECT COUNT(*) FROM usuario WHERE nome_usuario = ?";
    $stmt= $this->conn->prepare($sql);
    $stmt->bindValue(1, $nome);
    $stmt->execute();

    return $stmt->fetchColumn() > 0;
}


private function verificarEmailExistente ($email){
    $sql= "SELECT COUNT(*) FROM usuario WHERE email = ?";
    $stmt= $this->conn->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt->execute();

    return $stmt->fetchColumn() > 0;
}

public function logar($nome, $senha){
    $sql = "SELECT * FROM usuario WHERE nome_usuario = :nome";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($senha, $usuario['senha'])) {
            return true;
        } else {
            return false; 
        }
    } else {
        return false;
    }
}
}
?>

