<html>
<head>
<title>Compilatore e convertitore VTSystem</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="js/support/p5.js"></script>
    <script src="js/support/w3.js"></script>
    <script src="js/support/w3color.js"></script>
    <script scr="js/support/funzioni.js"></script>

</head>
<body>

<header class="w3-container">
    <h1>Compilatore</h1>
</header>

<div class="w3-container w3-center w3-margin-top">
    <h5>Testo di spiegazione</h5>
    <hr>
</div>

<div class="w3-container w3-center w3-margin-top">
    <button class="w3-button w3-border w3-border-green w3-hover-pale-green" onclick="moveBar(10)">Compila File</button>
    <hr>
    <div class="w3-border w3-border-black">
        <div id="bkBar" class="w3-container w3-text-white" style="background-image: linear-gradient(to right,red,orange,yellow,green,blue,indigo,violet)">0%</div>
    </div>
    <h5 id="percID">Compilazione file NON eseguita</h5>
</div>

<div class="w3-container w3-center w3-margin-top">
    <a href="file.xml" download>
        <button class="w3-button w3-border w3-border-green w3-hover-pale-green">Scarica File</button>
    </a>
</div>

<div class="w3-container w3-center w3-margin-top">
    <h3 id="help_1">Help 1</h3>
    <h3 id="help_2">Help 2</h3>
    <h3 id="help_3">Help 3</h3>
    <h3 id="help_4">Help 4</h3>
</div>


<?php

    $text = $_POST['text_CAN'];
    $string = "NR:";
    $num = 0;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mappaturecentraline";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $sql = "SELECT Funz_Veicolo, Gruppo, Descrizione, Connettore, Pin_RUx, Pin_VTS, Num_ID FROM centralina";
    $result = $conn->query($sql);
    $pin = "\n\n<DUT name=\"ACV\">\n\t<PinOUT>";
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $pin = $pin ."\n\t\t<Pin ID=\"". $row["Num_ID"] ."\">
            \t<Num>". $row["Num_ID"] ."</Num>
            \t<Conn>". $row["Connettore"] ."</Conn>
            \t<PinRUX>". $row["Pin_RUx"] ."</PinRUX>
            \t<PinVTS>". $row["Pin_VTS"] ."</PinVTS>
            \t<Grup>". $row["Gruppo"] ."</Grup>
            \t<Descr>". $row["Descrizione"] ."</Descr>
            \t<Funz>". $row["Funz_Veicolo"] ."</Funz>\n\t\t</Pin>";
        }
    } else {
        echo "<script> \n document.getElementById(\"help_1\").innerText = \"Errore nel caricamento dei dati da tabella RUC\";\n";
    }
    $pin = $pin ."\n\t</PinOUT>\n</DUT>\n</Documento>";
    $conn->close();
    echo "<script> \n document.getElementById(\"help_1\").innerText = \"Caricamento dei dati eseguito correttamente\";\n";

    if ($myfile = fopen("file.xml", "w+")){
        echo "\n document.getElementById(\"help_2\").innerText = \"Errore nella creazione del file\";\n";
    }
    echo "\n document.getElementById(\"help_2\").innerText = \"Creazione del file\";\n";

    if (!fwrite($myfile, $GLOBALS['text'])){
        echo "\n document.getElementById(\"help_3\").innerText = \"Errore nella scrittura sul file\";\n";
    } else{
        echo "\n document.getElementById(\"help_3\").innerText = \"Scrittura sul file\";\n";
    }

    if (!fwrite($myfile, $GLOBALS['pin'])){
        echo "\n document.getElementById(\"help_4\").innerText = \"Errore nella pulitura del file\";\n";
    } else{
        echo "\n document.getElementById(\"help_4\").innerText = \"Pulitura del file\";\n";
    }
    echo "</script>";

?>

    <script>
        function moveBar(num) {
            let elem = document.getElementById("bkBar");
            let perc = document.getElementById("percID");
            let id = setInterval(frame, 20);
            function frame() {
                for(let i = k; i <= k + num; i++){
                    elem.style.width = i  + '%';
                    elem.innerText = i + "%";
                    if (i >= 100){
                        elem.style.width = 100 + '%';
                        elem.innerText = 100 + "%";
                        perc.innerText = "Controllo del file terminato --> Procedete pure con il DOWNLOAD"; 
                        break;
                    }
                }
                k = k + num;
                clearInterval(id);
            }
        }
    </script>

</body>
</html>