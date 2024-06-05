<?php
//Banco V
//Buscar todos os usuarios
//Adicionar eles na TABLE

$con = new mysqli("127.0.0.1",
    "root",
    "",
    "imperium");

if (isset($_GET["localizar"])) {
    $loc = $_GET["localizar"];
    $sql = "SELECT * FROM user WHERE username LIKE '%$loc%' OR identity LIKE '%$loc%' OR senha LIKE '%$loc%' OR age LIKE '%$loc%' ";
} else {
    $sql = "SELECT * FROM user";
}

$rs = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #0f1923;
        }
        nav {
            display: flex;
            align-content: center;
            justify-content: space-between;
            border-bottom: 1px solid #00a6ff;
            padding: 20px 20px;
            font-family: sans-serif, font-bold;

        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            padding: 20px;

        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 20px;
            text-align: center;
        }
        th {
            background-color: #00a6ff;
            color: #fff;
        }
        tr {
            background-color: #f2f2f2;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-success {
            padding: 10px 20px;
            background-color: #00a6ff;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer
        }
        .btn:hover {
            opacity: 0.8;
        }
        .form-control{
            margin-bottom: 30px;
            border: 2px solid #00a6ff;
            padding: 10px;
            border-radius: 10px;
        }
        .input-group-text{
            padding: 10px 20px;
            background-color: #00a6ff;
            border: none;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer
        }
        #imperium {
            color: #00a6ff;
            font-family: sans-serif;
            padding: 8px 8px;
        }
       h2{
           display: flex;
           justify-content: center;
           align-items: center;
           color: #00a6ff;
       }
        .header-content-left {
            display: flex;
            align-content: center;
            justify-content: center;
            gap: 20px;
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
        <div class="col-6">
            <div class="input-group mb-3">
                <form method="" action="">
                    <input type="text" class="form-control"
                           name="localizar"
                           placeholder="Digite até 3 letras para procurar"
                           value="<?php echo isset($_GET["localizar"]) ? $_GET["localizar"] : '' ?>"
                    />
                    <input type="submit" class="input-group-text"
                           value="BUSCAR"/>
                </form>
            </div>
            <a style="text-decoration: none" href="cadastro.php" class="btn btn-success">NOVO</a>
        </div>
        <div class="col-12">
            <h2>Listagem de usuários</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>CPF</th>
                    <th>Senha</th>
                    <th>Idade</th>
                    <th>Opções</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($linha = $rs->fetch_assoc()) {
                    echo "            <tr>
                                            <td>" . $linha["id"] . "</td>
                                            <td>" . $linha["username"] . "</td>
                                            <td>" . $linha["identity"] . "</td>
                                            <td>" . $linha["senha"] . "</td>
                                            <td>" . $linha["age"] . "</td>
                                            <td>
                                                <a href='alterar.php?id=" . $linha["id"] . "' class='btn-primary' style='text-decoration: none; border-radius: 5px; padding 10px 10px;'>✏️</a>
                                                <a href='excluir.php?id=" . $linha["id"] . "' class='btn btn-danger' style='text-decoration: none; border-radius: 5px; padding 10px 10px;'>🗑️</a>
                                            </td>
                                        </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
