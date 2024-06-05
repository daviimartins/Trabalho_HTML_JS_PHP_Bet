<?php

$username = $_POST["username"];
$identity = $_POST["identity"];
$age = $_POST["age"];
$password = $_POST["password"];

$conexao = new mysqli(
    "127.0.0.1",    //Servidor hospedagem
    "root",         //usuario
    "",             // senha
    "imperium"        //Nome do banco
);

$sql = "
    INSERT INTO user (username, identity, age, senha) 
    VALUES ('$username','$identity','$age', '$password')
    ";

try {
    $rs = $conexao->query($sql);

    header("location: login.php");
} catch (Exception $error) {
    echo "Login já existente";
}