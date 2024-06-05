<?php

$username = $_POST["username"];
$password = $_POST["password"];

$conexao = new mysqli(
    "localhost",
    "root",
    "",
    "imperium"
);
$sql = ("SELECT * FROM user 
         WHERE username = '$username' AND senha = '$password'"
);
$resultado = $conexao->query($sql);
$tabela = $resultado->fetch_assoc();

if ($tabela == null){
    echo "Login ou/e senha inválidos!";
}
else{
    if($username == "admin"){
        header("Location: administracao.php");
        return;
    }
    header("Location: index.php");
}
