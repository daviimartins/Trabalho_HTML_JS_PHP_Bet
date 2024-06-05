<?php

$id = $_GET["id"];

$con = new mysqli("127.0.0.1",
    "root",
    "",
    "imperium");

$sql = "SELECT * FROM user WHERE id=$id";

$rs = $con->query($sql);
$dados = $rs->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cadastro</title>
    <style>
        html {
            width: 100vw;
            height: 100vh;
        }
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #0f1923;
            display: flex;
            flex-direction: column;
        }

        nav {
            display: flex;
            align-content: center;
            justify-content: space-between;
            border-bottom: 1px solid #00a6ff;
            padding: 20px 20px;
            font-family: sans-serif, font-bold;

        }

        #imperium {
            color: #00a6ff;
            font-family: sans-serif;
            padding: 8px 8px;
        }

        .header-content-left {
            display: flex;
            align-content: center;
            justify-content: center;
            gap: 20px;
        }
        .container{
            justify-content: center;
            align-items: center;
            display: flex;
            flex-grow: 1;
            flex-direction: column;
        }
        .row {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px #00a6ff;
            background-color: white;
            border-radius: 30px;
            padding: 40px 60px;
        }
        input {
            margin-bottom: 30px;
            border: 2px solid #00a6ff;
            padding: 10px;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .form-label {
            display: flex;
            flex-direction: column;
            gap: 2px;
            font-family: sans-serif;
        }
        .switch{
            display: flex;
            flex-direction: column;
            padding: 10px 20px;
            background-color: #00a6ff;
            border: none;
            color: #ffffff;
            border-radius: 10px;
            cursor: pointer
        }
        h2{
            display: flex;
            justify-content: center;
            align-items: center;
            color: #00a6ff;
        }

    </style>
</head>
<body>
<nav>
    <div class="header-content-left">
        <span id="imperium">
            Imperium
        </span>
    </div>
</nav>
<div class="container">
    <div class="row">
        <form method="POST" action="alterar_salvar.php">
            <h2>Alterar Cadastro</h2>
            <label class="form-label">ID:</label>
            <input type="text" name="id"
                   value="<?php echo $dados["id"]; ?>">


            <label class="form-label">Usuário:</label>
            <input type="text" name="username"
                   value="<?php echo $dados["username"]; ?>">


            <label class="form-label">CPF:</label>
            <input type="text" name="identity"
                   value="<?php echo $dados["identity"]; ?>">


            <label class="form-label">Senha:</label>
            <input type="text" name="senha"
                   value="<?php echo $dados["senha"]; ?>">


            <label class="form-label">Idade:</label>
            <input type="text" name="age"
                   value="<?php echo $dados["age"]; ?>">


            <input class="switch" type="submit" value="SALVAR">
        </form>
    </div>
</div>

</body>
</html>
