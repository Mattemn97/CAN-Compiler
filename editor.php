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
    <script scr="js/funzioni.js"></script>

</head>
<body>
<h6 id="account">12345</h6>
    <?php
        $login_username = $_POST['login_user'];
        $login_password = $_POST['login_pass'];
        $query = "SELECT id FROM users WHERE username='".$login_username ."' AND pass='". $login_password ."'";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $result = $conn->query($query);
        
		if($result->num_rows==1){
			$row = $result->fetch_assoc();
            $login_iduser = $row['id'];
            $_SESSION['id_logged'] = $login_iduser;
            $_SESSION['username_logged'] = $login_username;
            echo "<script> \n
            let txt = \"Accesso eseguito come " . $_SESSION['username_logged'] . " alle" . $TIME.";
            document.getElementById('account').innerHTML = txt;\n
            </script>";
            $conn->close();

            $conn = new mysqli($servername, $username, $password, $dbname);
            $query = "UPDATE users SET last_log = NOW() WHERE username = \'".$login_username. "'";
            $report = $conn->query($query);
            $conn->close();
		} else {
            echo "<script> \n
            console.log(\"script letto\");
            alert(\"Dati del login sbagliati!\");
            location.href=\"http://127.0.0.1/WEB/index.php\";\n
            </script>";
            $conn->close();
        }
    ?>
    
    <div class="w3-container w3-row w3-margin" id="tutto" name="tutto">
        <div class="w3-half w3-row">
        
            <div id="Intro" class="w3-row w3-border w3-border-blue">
                <div class="w3-row">
                    <h4 class="w3-blue w3-threequarter">Informazioni di Intro</h4>
                    <h4><a href="guida.html#Intro" target="_blank" class="w3-quarter"><button class="w3-blue w3-hover-pale-blue">Help <i class="material-icons">sentiment_dissatisfied</i></button></a></h4>
                </div>
                <div class="w3-row w3-half">
                    <div class="w3-half">
                        <h5 class="w3-margin-top">Scopo:</h5>
                        <h5 class="w3-margin-top">Descrizione/Cambimenti Versione:</h5>
                        <h5 class="w3-margin-top">Veicolo:</h5>
                        <h5 class="w3-margin-top">Versione Software:</h5>
                    </div>
                    <div class="w3-half">
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-text w3-margin-top w3-pale-blue" id="Scopo">
                        </div>
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-text w3-margin-top w3-pale-blue" id="DescrizioneVer">
                        </div>
                        <br>
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-text w3-margin-top w3-pale-blue" id="Veicolo">
                        </div>
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-text w3-margin-top w3-pale-blue" id="Versione">
                        </div>
                    </div>
                </div>
                <div class="w3-row w3-half">
                    <div class="w3-half">
                        <h5 class="w3-margin-top">Autore:</h5>
                        <h5 class="w3-margin-top">Data:</h5>
                        <h5 class="w3-margin-top">Descrizione Sistema:</h5>
                    </div>
                    <div class="w3-half">
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-pale-blue w3-text w3-margin-top" id="Autore">
                        </div>
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-pale-blue w3-text w3-margin-top" id="Data">
                        </div>
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-pale-blue w3-text w3-margin-top" id="DescrizioneSys">
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="StepTest" class="w3-row w3-border w3-border-green">
                <div class="w3-row">
                    <h4 class="w3-green w3-threequarter">Gestione STEP & TEST</h4>
                    <h4><a href="guida.html#StepTest" target="_blank" class="w3-quarter"><button class="w3-green w3-hover-pale-green">Help <i class="material-icons">sentiment_dissatisfied</i></button></a></h4>
                </div>
                <div class="w3-row w3-half">
                    <div class="w3-half">
                        <h5 class="w3-margin-top">Commento TEST:</h5>
                        <h5 class="w3-margin-top">Commento STEP:</h5>
                        <button class="w3-margin-top w3-border w3-border-green w3-hover-pale-green"
                                onclick="btnAggiungiSTEP()">Aggiungi STEP
                        </button>
                    </div>
                    <div class="w3-half">
                        <div class="w3-row w3-center ">
                            <input type="text" class="w3-text w3-margin-top w3-pale-green" id="commentoTEST">
                        </div>
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-text w3-margin-top w3-pale-green" id="commentoSTEP">
                        </div>
                        <br>
                        <button class="w3-border w3-border-green w3-hover-pale-green"
                                onclick="btnAggiungiTEST()">Aggiungi TEST
                        </button>
                    </div>
                </div>
                <div class="w3-row w3-half">
                    <div class="w3-half w3-center">
                        <h5 class="w3-margin-top">Requisito in test:</h5>
                        <h5 class="w3-margin-top">Titolo del TEST:</h5>
                        <button class="w3-margin-top w3-border w3-border-green w3-hover-pale-green"
                                onclick="btnChiudiSTEP()">Chiudi STEP
                        </button>
                    </div>
                    <div class="w3-half w3-center">
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-text w3-margin-top w3-pale-green" id="requisitoTEST">
                        </div>
                        <div class="w3-row w3-center">
                            <input type="text" class="w3-text w3-margin-top w3-pale-green" id="headTEST">
                        </div>
                        <br>
                        <button class="w3-margin-bottom w3-border w3-border-green w3-hover-pale-green"
                                onclick="btnChiudiTEST()">Chiudi TEST
                        </button>
                    </div>
                </div>
            </div>

            <div id="QualeSegnale" style="height: 275px" class="w3-row w3-border w3-border-red">
                <div class="w3-row">
                    <h4 class="w3-red w3-threequarter">Quale Segnale</h4>
                    <h4><a href="guida.html#QualeSegnale" target="_blank" class="w3-quarter"><button class="w3-red w3-hover-pale-red">Help <i class="material-icons">sentiment_dissatisfied</i></button></a></h4>
                </div>
                <div class="w3-row w3-half">
                    <div class="w3-half">
                        <h5>Segnale da implementare</h5>
                        <br>
                        <h5>Durata Await &rArr;</h5>
                    </div>
                    <div class="w3-half">
                        <div class="w3-row w3-center">
                            <div id="input" class="w3-half w3-row">
                                <?php
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

                                $sql = "SELECT * FROM `ruc` ORDER BY `Funz_Veicolo` ASC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<select id=\"selectNomeSegnale\" class=\"w3-margin-top w3-border w3-border-red w3-pale-red\" style=\"width: -webkit-fill-available\" name=\"nome_Segnale\" onclick=\"changeLabelSegnale(this)\">";
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=" . $row["Funz_Veicolo"] . "-A-"
                                            . $row["Sub_System"] . "-B-"
                                            . $row["Note"] . "-C-"
                                            . $row["Connettore"] . "-D-"
                                            . $row["Pin_VTSystem"] . "-E-"
                                            . $row["Gruppo"] . "-F-"
                                            . $row["Configurazione"] . "-G-"
                                            . $row["Spec_Electrical"] . "-H-"
                                            . $row["Pull_Up_Down"] . "-I-"
                                            . $row["Pin_Rux"] . ">" . $row["Funz_Veicolo"] . "</option>";
                                    }
                                    echo "</select>";
                                } else {
                                    echo "Errore nel caricamento dei dati da tabella RUC";
                                }
                                $conn->close();
                                ?>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="w3-half">
                            <input type="number" id="durataAwait" name="val_Await" class="w3-pale-red" onclick="changeAwait(this)">
                        </div>
                    </div>
                </div>
                <div class="w3-row w3-half">
                    <div class="w3-half w3-center">
                        <h5>Valore atteso / da assegnare:</h5>
                        <h5>Range atteso:</h5>
                        <h6 id="labelSlide">+/-:0%</h6>
                    </div>
                    <div class="w3-half w3-center w3-margin-top">
                        <input type="number" id="textValoreAtteso" name="val_Atteso" class="w3-pale-red" onchange="changeValue(this)">
                        <br>
                        <br>
                        <br>
                        <input type="range" min="0" max="5" id="slideRangeValoreAtteso" class="slider w3-pale-red" onclick="changeLabelSlide(this)">

                    </div>
                </div>
                <div class="w3-row w3-margin">
                    <code id="anteprimaHuman">Anteprima Human</code>
                </div>
            </div>

            <div id="ComeUsarlo" style="height: 200px" class="w3-row w3-border w3-border-yellow">
                <div class="w3-row">
                    <h4 class="w3-yellow w3-threequarter">Come Usarlo</h4>
                    <h4><a href="guida.html#ComeUsarlo" target="_blank" class="w3-quarter"><button class="w3-yellow w3-hover-pale-yellow">Help <i class="material-icons">sentiment_dissatisfied</i></button></a></h4>
                </div>
                <div class="w3-row w3-half">
                    <div class="w3-half">
                        <h5>Funzione da implementare</h5>
                        <h5>Anteprima codice:</h5>
                    </div>
                    <div class="w3-half">
                        <div class="w3-row w3-center">
                            <div id="input" class="w3-half w3-row">
                                <?php
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

                                $sql = "SELECT Nome_Funz, Raw_Funz FROM funzioni ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    echo "<select id=\"selectNomeSegnale\" class=\"w3-margin-top w3-border-yellow w3-pale-yellow\" name=\"nome_Segnale\" onclick=\"changeLabelFunzione(this)\">";
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=" . $row["Nome_Funz"] . "-A-"
                                            . $row["Raw_Funz"] . ">" . $row["Nome_Funz"] . "</option>";
                                    }
                                    echo "</select>";
                                } else {
                                    echo "Errore nel caricamento dei dati da tabella RUC";
                                }
                                $conn->close();
                                ?>
                            </div>
                        </div>
                        <br>
                        <div class="w3-row w3-margin">
                            <code id="anteprimaCode">Anteprima Codice</code>
                        </div>
                    </div>
                </div>
                <div class="w3-row w3-half">
                    <div class="w3-half w3-center w3-margin w3-container">
                    <button class="w3-margin-top w3-border w3-border-yellow w3-hover-pale-yellow" 
                        onclick="btnAggiungiCmd()">Aggiungi al XML
                    </button>
                    <button class="w3-margin-top w3-border w3-border-yellow w3-hover-pale-yellow" 
                        onclick="btnAggiungiInfo()">Apri .XML
                    </button>
                    </div>
                    <div class="w3-half w3-center  w3-margin w3-container">
                        <button class="w3-margin-top w3-border w3-border-yellow w3-hover-pale-yellow"
                            onclick="btnRimuoviCmd()">Rimuovi dal .XML
                        </button>
                        <button class="w3-margin-top w3-border w3-border-yellow w3-hover-pale-yellow" 
                            onclick="btnChiudiXML()">Chiudi .XML
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div id="CodiceCAN" class="w3-half w3-border w3-border-grey">
            <form action="compilatore.php" method="post">
                <div class="w3-row">
                    <h4 class="w3-grey w3-half">Codice .XML</h4>
                    <h4><a href="guida.html#GuidaHT" target="_blank" class="w3-quarter"><button class="w3-grey w3-hover-light-grey">Guida <i class="material-icons">sentiment_dissatisfied</i></button></a></h4>
                    <h4><button class="w3-grey w3-hover-light-grey w3-quarter">Convalida file .XML<i class="material-icons">forward</i></button></h4>
                </div>
                <textarea name="text_CAN" cols="30" rows="30" id="text_CAN" style="width: 925px; height: 880px"></textarea>
            </form>
        </div>
    </div>

    <script>
        let last_CAN = [];
        let nome_Funz, val_Att = 0, range = 0, val_Await = 0;
        let step=0, test=0, last_step = 0, k = 0;


        function changeLabelSegnale(ele) {
            let label = document.getElementById("anteprimaHuman");
            let funz = ele.value.substring(-1, ele.value.indexOf("-A-"));
            let sub = ele.value.substring(ele.value.indexOf("-A-") + 3, ele.value.indexOf("-B-"));
            let note = ele.value.substring(ele.value.indexOf("-B-") + 3, ele.value.indexOf("-C-"));
            let conn = ele.value.substring(ele.value.indexOf("-C-") + 3, ele.value.indexOf("-D-"));
            let vts = ele.value.substring(ele.value.indexOf("-D-") + 3, ele.value.indexOf("-E-"));
            let grup = ele.value.substring(ele.value.indexOf("-E-") + 3, ele.value.indexOf("-F-"));
            let conf = ele.value.substring(ele.value.indexOf("-F-") + 3, ele.value.indexOf("-G-"));
            let spec = ele.value.substring(ele.value.indexOf("-G-") + 3, ele.value.indexOf("-H-"));
            let pull = ele.value.substring(ele.value.indexOf("-H-") + 3, ele.value.indexOf("-I-"));
            let rux = ele.value.substring(ele.value.indexOf("-I-") + 3, ele.value.length);

            nome_Funz = funz;

            label.innerText = "Funzione: " + funz + " " +
                "--Sub_System: " + sub + " " +
                "--Note: " + note + " " +
                "--Connettore: " + conn + " " +
                "--Pin_RUx: " + rux + " " +
                "--Gruppo: " + grup + " " +
                "--Configurazione: " + conf + " " +
                "--Spec_Elettriche: " + spec + " " +
                "--Pull_Up_Down: " + pull + " " +
                "--Pin_VTSystem: " + vts;
        }

        function changeLabelSlide(ele) {
            let label = document.getElementById("labelSlide");
            label.innerText = "+/-:" + ele.value + "%";
            range = ele.value;
        }

        function changeAwait(ele){
            val_Await = ele.value;
        }

        function changeLabelFunzione(ele) {
            let label_Code = document.getElementById("anteprimaCode");
            let nome = ele.value.substring(-1, ele.value.indexOf("-A-"));
            let raw = ele.value.substring(ele.value.indexOf("-A-") + 3, ele.value.length);

            raw = changeString(raw, "_", " ");

            while (raw.indexOf("NOME FUNZIONE") !== -1) {
                raw = raw.replace("NOME FUNZIONE", nome_Funz);
            }

            while (raw.indexOf("VALORE ASSEGNATO") !== -1) {
                raw = raw.replace("VALORE ASSEGNATO", val_Att);
            }

            while (raw.indexOf("TEMPO AWAIT") !== -1) {
                raw = raw.replace("TEMPO AWAIT", val_Await);
            }

            while (raw.indexOf("#") !== -1) {
                raw = raw.replace("#", ">");
            }

            while (raw.indexOf("!") !== -1) {
                raw = raw.replace("!", "\t");
            }

            label_Code.innerText = raw + "\n";
        }

        function changeString(raw,older,newer){
            while (raw.indexOf(older) !== -1) {
                raw = raw.replace(older, newer);
            }
            return raw;
        }

        function btnAggiungiCmd() {
            let comando = "NR:" + setNumeroRiga(last_CAN.length) + "\t" + "\t\t" + document.getElementById("anteprimaCode").innerText;
            last_CAN.push(comando);
            visualizzaCode(last_CAN.length, "null");
        }

        function btnRimuoviCmd() {
            let last = last_CAN.pop();
            if (last.indexOf("step ID=") !== -1) {
                //elimino uno step
                step--;
            } else if (last.indexOf("test ID=") !== -1) {
                //elimino un test
                test--;
            } else if (last.indexOf("/test") !== -1) {
                //riapro un test e quindi continuo col conteggio degli step precedenti
                step = last_step;
            }
            visualizzaCode(last_CAN.length, "null");
        }

        function btnAggiungiSTEP() {
            let commento = document.getElementById("commentoSTEP").value;
            let text = "NR:" + setNumeroRiga(last_CAN.length) + "\t" + "\t" + "<step ID=\"" + step + "\"><COMMENT>" + commento + "</COMMENT>" + "\n";
            last_CAN.push(text);
            visualizzaCode(last_CAN.length, "null");
        }

        function btnChiudiSTEP() {
            let text = "NR:" + setNumeroRiga(last_CAN.length) + "\t" + "\t" + "</step>" + "\n";
            step++;
            last_CAN.push(text);
            visualizzaCode(last_CAN.length, "null");
        }

        function btnAggiungiTEST() {
            let commento = document.getElementById("commentoTEST").value;
            let requisito = document.getElementById("requisitoTEST").value;
            let head = document.getElementById("headTEST").value;
            last_step = step;
            step = 1;
            let text = "NR:" + setNumeroRiga(last_CAN.length) + "\t" + "<test ID=\"" + test + "\" tipo=\"Operativo\">"+ "\n";
            last_CAN.push(text);
            text = "NR:" + setNumeroRiga(last_CAN.length) + "\t\t" + "<REQUISITO>" + requisito + "</REQUISITO>" + "\n";
            last_CAN.push(text); 
            text = "NR:" + setNumeroRiga(last_CAN.length) + "\t\t" + "<HEAD>" + head + "</HEAD>" + "\n";
            last_CAN.push(text);
            text = "NR:" + setNumeroRiga(last_CAN.length) + "\t\t" + "<COMMENT>" + commento + "</COMMENT>" + "\n";
            last_CAN.push(text);
            visualizzaCode(last_CAN.length, "null");

        }

        function btnChiudiTEST() {
            let text = "NR:" + setNumeroRiga(last_CAN.length) + "\t" + "</test>" + "\n";
            test++;
            last_CAN.push(text);
            visualizzaCode(last_CAN.length, "null");
        }

        function btnChiudiXML(){    
            for(let h = 0; h < last_CAN.length; h++){
                last_CAN[h] = last_CAN[h].replace("NR:" + setNumeroRiga(h), "");
            }
            last_CAN.push("</SequenzaTest> \n");

            visualizzaCode(last_CAN.length, "null");
            localStorage.setItem('testoXML',last_CAN);
        }   

        function btnAggiungiInfo(){
            let autore = document.getElementById("Autore").value;
            let versione = document.getElementById("Versione").value;
            let data = document.getElementById("Data").value;
            let descrizioneVer = document.getElementById("DescrizioneVer").value;
            let veicolo = document.getElementById("Veicolo").value;
            let scopo = document.getElementById("Scopo").value;
            let descrizioneSys = document.getElementById("DescrizioneSys").value;

            let text = "\<\?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"\?\>" + "\n"; 
            last_CAN.push(text);
            text = "\<\?xml-stylesheet type=\"text/xsl\" href=\"Conversione-1.1.xsl\"\?\>" + "\n";
            last_CAN.push(text);
            text = "<Documento>" + "\n";
            last_CAN.push(text);
            text = "<Intro>" + "\n";
            last_CAN.push(text);
            text = "<CronologiaRevisioni>" + "\n";
            last_CAN.push(text);
            text = "\t<autore ID=\"" + autore + "\">" + "\n"; 
            last_CAN.push(text);
            text = "\t\t<versione>" + versione + "</versione>" + "\n"; 
            last_CAN.push(text);
            text = "\t\t<data>" + data + "</data>" + "\n"; 
            last_CAN.push(text);
            text = "\t\t<descrizione>" + descrizioneVer + "</descrizione>" + "\n"; 
            last_CAN.push(text);
            text = "\t</autore>" + "\n";
            last_CAN.push(text);
            text = "</CronologiaRevisioni>" + "\n";
            last_CAN.push(text);
            text = "<veicolo>" + veicolo + "</veicolo>" + "\n";
            last_CAN.push(text);
            text = "<scopo>" + scopo + "</scopo>" + "\n";
            last_CAN.push(text);
            text = "<descrizioneSistema>" + descrizioneSys + "</descrizioneSistema>" + "\n";
            last_CAN.push(text);
            text = "</Intro>" + "\n" + "\n" + "<SequenzaTest>" + "\n";
            last_CAN.push(text);
            visualizzaCode(last_CAN.length, "null");
        }

        function visualizzaCode(num, text) {
            let text_CAN = document.getElementById("text_CAN");
            if (text === "null"){
                text_CAN.value = "";
            }else{
                text_CAN.value = text;
            }
            for (let k = 0; k < num; k++) {
                text_CAN.value = text_CAN.value + last_CAN[k];
            }
        }

        function setNumeroRiga(num) {
            if (num < 10) {
                return ("00" + num);
            } else if (num < 100) {
                return ("0" + num);
            } else {
                return num;
            }
        }

        function changeValue(ele){
            val_Att = document.getElementById("textValoreAtteso").value;
        }
        
    </script>
</body>
</html>
