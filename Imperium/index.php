<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imperium</title>
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
        }

        nav {
            display: flex;
            align-content: center;
            justify-content: space-between;
            border-bottom: 1px solid #00a6ff;
            padding: 20px 20px;
            font-family: sans-serif;
        }

        .header-content-left {
            display: flex;
            align-content: center;
            justify-content: center;
            gap: 20px;

            button {
                border: 2px solid #00a6ff;
                border-radius: 4px;
                background-color: #0f1923;
                color: white;
                cursor: pointer;
                height: 32px;
            }
        }

        .header-content-right {
            display: flex;
            align-content: center;
            justify-content: center;
            gap: 10px;

            button {
                border: 2px solid #00a6ff;
                border-radius: 4px;
                background-color: #0f1923;
                color: white;
                cursor: pointer;
                height: 32px;
            }
        }

        #imperium {
            color: #00a6ff;
            font-family: sans-serif;
            padding: 8px 8px;
        }

        .shadow {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 20px #00a6ff;
            background-color: white;
            width: 400px;
            height: 400px;
            border-radius: 30px;
            margin-top: 100px;
            margin-left: 780px;
            margin-right: 0;
        }

        #play {
            border: none;
            border-radius: 4px;
            background-color: #00a6ff;
            color: black;
            cursor: pointer;
            height: 130px;
            width: 130px;
            margin-left: 537px;
        }

        #take-winnings {
            border: none;
            border-radius: 4px;
            background-color: #00a6ff;
            color: black;
            cursor: pointer;
            height: 130px;
            width: 130px;
            margin-left: 537px;
        }

        #bet {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #0f1923;
            margin-bottom: 30px;
            border: 2px solid #00a6ff;
            padding: 10px;
            border-radius: 5px;
            margin-left: 537px;
            margin-top: -300px;
        }

        #winnings {
            color: green;
            margin-left: 550px;
        }

        #losing {
            color: red;
        }

    </style>
</head>
<body>
<nav>
    <div class="header-content-left">
        <span id="imperium">
            Imperium
        </span>

        <button style="display: none">
            Usuário: <span id="username"></span>
        </button>
    </div>
    <div class="header-content-right">
        <button>
            Saldo: <span id="amount"></span
        </button>
        <button id="deposit">
            Depositar
        </button>

        <button id="logout">
            Sair
        </button>
    </div>
</nav>
<div id="game" class="shadow p-3 mb-5 bg-body rounded">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
         class="bi bi-airplane-engines" viewBox="0 0 16 16">
        <path
                d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0ZM7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1c.213 0 .458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7V3Z"/>
    </svg>
    <span id="crashPoint"></span>
</div>
<input style="color: white" type="text" id="bet" aria-label="Amount (to the nearest dollar)" placeholder="Quantia R$">
<button onclick="startGame()" id="play">
    <b>Começar Jogo</b></button>
<button onclick="takeWinnings()" id="take-winnings" style="display: none"><strong>Retirar</strong></button>

<span id="winnings"></span>
<span id="losing"></span>

<script>
    const username = localStorage.getItem("username");

    if (username) {
        let elementById = document.getElementById("username");
        elementById.textContent = username;
        elementById.parentElement.style.display = "unset";
    }

    let depositElement = document.getElementById("deposit");

    depositElement.addEventListener("click", () => {
        window.location.href = "deposito.html";
    });

    let logoutElement = document.getElementById("logout");

    logoutElement.addEventListener("click", () => {
        localStorage.removeItem("username");
        localStorage.removeItem("amount");

        window.location.href = "login.php";
    });

    if (!username) {
        document.getElementById("amount").parentElement.style.display = "none";
        depositElement.style.display = "none";
        logoutElement.textContent = "Entrar";
    }

    reloadAmount();

    function reloadAmount() {
        document.getElementById("amount").textContent = `${formatNumber(Number(localStorage.getItem("amount") ?? 0).toFixed(2))}`;
    }

    function formatNumber(value) {
        return new Intl.NumberFormat("pt-BR", {style: "currency", currency: "BRL"}).format(value);
    }
</script>

<script>
    // Function to determine the crash point
    function getCrashPoint() {
        e = 2 ** 32;
        h = crypto.getRandomValues(new Uint32Array(1))[0];
        // if h % (100 / desired_precentage) is 0 then the game will crash immediately
        if (h % 33 == 0) return 1;
        return Math.min(Math.floor((100 * e - h) / (e - h)) / 100, 3);
    }

    // Function to start the game
    function startGame() {
        let bet = Number(document.getElementById("bet").value);

        const balance = Number(localStorage.getItem("amount") ?? 0);
        if (balance < bet) {
            alert("Saldo insuficiente");
            return;
        }

        localStorage.setItem("amount", (balance - bet).toString());
        reloadAmount();

        document.getElementById("play").style.display = "none";
        document.getElementById("take-winnings").style.display = "unset";
        document.getElementById("bet").disabled = true;
        // Clear the crash point and winnings
        document.getElementById("winnings").innerHTML = "";
        document.getElementById("losing").innerHTML = "";
        // Get the bet value from the input field
        // Calculate the crash point
        let crashPoint = getCrashPoint();

        // Display a countdown from 0 to the crash point
        var countdown = 1.00;
        let interval = setInterval(function () {
            document.getElementById("crashPoint").innerHTML = countdown.toFixed(2);
            if (countdown.toFixed(2) == crashPoint) {
                clearInterval(interval);
                document.getElementById("play").style.display = "unset";
                document.getElementById("take-winnings").style.display = "none";
                document.getElementById("take-winnings").disabled = false;
                document.getElementById("bet").disabled = false;
                if (document.getElementById("winnings").innerHTML == "") {
                    calculateWinnings();
                }

            }
            countdown = countdown + 0.01;

        }, 65);

    }

    // takeWinnings()
    // Function to take the winnings
    function takeWinnings() {
        let bet = document.getElementById("bet").value;
        let crashPoint = document.getElementById("crashPoint").innerHTML;
        if (parseFloat(crashPoint) < getCrashPoint() && document.getElementById("losing").innerHTML == "") {
            let winnings = bet * crashPoint;
            document.getElementById("winnings").innerHTML = `Você Ganhou ${formatNumber(winnings.toFixed(2))}!`;

            document.getElementById("take-winnings").disabled = true;

            const balance = Number(localStorage.getItem("amount") ?? 0);
            localStorage.setItem("amount", (balance + winnings).toString());
            reloadAmount();
        }
    }

    F

    // Function to calculate the player's winnings
    function calculateWinnings() {
        let bet = document.getElementById("bet").value;
        let crashPoint = document.getElementById("crashPoint").innerHTML;
        let winnings = bet * crashPoint;
        // alert(`The game crashed at ${crashPoint} and you won ${winnings.toFixed(2)}!`);
        document.getElementById("losing").innerHTML = `O jogo parou em ${crashPoint} e você perdeu`;
    }
</script>
</body>
</html>
