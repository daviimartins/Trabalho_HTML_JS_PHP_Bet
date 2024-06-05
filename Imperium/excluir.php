<?php

$id = $_GET["id"];

$con = new mysqli("127.0.0.1",
    "root",
    "",
    "imperium");

$sql = "DELETE FROM user WHERE id=$id";
$con->query($sql);
header("Location: administracao.php");

?>
