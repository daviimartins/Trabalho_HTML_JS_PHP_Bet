<?php
$conexao = new mysqli(
    "localhost",
    "root",
    "",
    "imperium"
);
$sql = ("INSERT IGNORE INTO user (username, senha) VALUES ('admin', 'admin');");

$conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Imperium</title>
    <style>
        html {
            width: 100vw;
            height: 100vh;
        }

        nav {
            display: flex;
            align-content: center;
            justify-content: space-between;
            border-bottom: 1px solid #00a6ff;
            padding: 20px 20px;
            font-family: sans-serif, font-bold;

        }

        .header-content-left {
            display: flex;
            align-content: center;
            justify-content: center;
            gap: 20px;
        }

        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #0f1923;
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 30px;
            border: 2px solid #00a6ff;
            padding: 10px;
            border-radius: 10px;
        }

        #login-form {
            padding: 10px 20px;
            background-color: #00a6ff;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer
        }

        .layout-login {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px #00a6ff;
            background-color: white;
            padding: 40px 60px;
            border-radius: 30px;
        }

        .writing {
            display: flex;
            flex-direction: column;
            gap: 2px;
            font-family: sans-serif;
        }

        #imperium {
            color: #00a6ff;
            font-family: sans-serif;
            padding: 8px 8px;
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
<form method="post" action="login_valida.php"
      style="justify-content: center; align-items: center; display: flex; flex-grow: 1">
    <div>
        <div class="layout-login">
            <label class="writing">
                <span>Nome:</span>
                <input type="text" id="username" name="username" autofocus/>
            </label>

            <label class="writing">
                <span>Senha:</span>
                <input id="password" name="password" autofocus type="password"/>
            </label>

            <input type="submit" value="ENTRAR" id="login-form"/>


            <a href="cadastro.php" style="color: #00a6ff; padding: 10px;">
                Registrar novo usuário
            </a>
        </div>
    </div>
</form>
<script>
    document.getElementById("login-form")
        .addEventListener("click", () => {
            const username = document.getElementById("username").value;
            localStorage.setItem("username", username)
            localStorage.setItem("amount", "0");
            window.location.href = "index.php";
        })
</script>

</body>


</html>