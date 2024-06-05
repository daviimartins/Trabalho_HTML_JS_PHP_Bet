<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
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
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #0f1923;
            display: flex;
            flex-direction: column;
        }
        .header-content-left {
            display: flex;
            align-content: center;
            justify-content: center;
            gap: 20px;
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

        .form-label {
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
        .container{
            justify-content: center;
            align-items: center;
            display: flex;
            flex-grow: 1;
            flex-direction: column;
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

    </style>
</head>
<nav>
    <div class="header-content-left">
        <span id="imperium">
            Imperium
        </span>
    </div>
</nav>
<div class="container">
    <div class="row" >
        <form method="post" action="cadastro_salvar.php">
            <label class="form-label">Usuário:</label>
            <input type="text" name="username" class="form-control" required/>

            <br/>

            <label class="form-label">CPF:</label>
            <input type="text" name="identity" class="form-control" required/>

            <br/>

            <label class="form-label">Idade:</label>
            <input type="text" name="age" class="form-control" required/

            <br/>

            <label class="form-label">Senha:</label>
            <input type="password" name="password" class="form-control" required/>

            <input type="submit" value="SALVAR"
                   class="switch" />
        </form>
    </div>
</div>
<body>

</body>
</html>
