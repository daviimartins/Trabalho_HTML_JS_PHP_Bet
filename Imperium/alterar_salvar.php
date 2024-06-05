<?php

$id = $_POST["id"];
$username = @$_POST['username'];
$identity = @$_POST['identity'];
$senha = @$_POST['senha'];
$age = @$_POST['age'];

$con = new mysqli("127.0.0.1",
    "root",
    "",
    "imperium");

$sql = "SELECT COUNT(1) as total FROM user WHERE id=$id";
$rs = $con->query($sql);
$total = $rs->fetch_assoc();

if ($total["total"] == 0) {
    echo "Id não existe";
    exit;
}

$sql = "UPDATE user
               SET username = '$username',
                   identity = '$identity',
                   senha = '$senha',
                   age = '$age'
               
              WHERE id = $id";

$con->query($sql);
header("location: administracao.php");


?>