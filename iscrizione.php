<html>
<?php
include 'Connection.php';
 ?>
<head>
  <link rel="shortcut icon" href="favicon.ico" />
  <title>Elaborato progetto Protezione Civile</title>
  <style>

  @import url(https://fonts.googleapis.com/css?family=PT+Sans:400,700);

  form {
    max-width: 450px;
    margin: 0 auto;
    position: relative;
    top:15vh;
  }
  form > div {
    position: relative;
    background: #7dbd07;
    border-bottom: 1px solid #ccc
  }
  form > div > label {
    opacity: 0.3;
    font-weight: bold;
    position: absolute;
    top: 22px;
    left: 20px;
  }
  form > div > input[type=text],
  form > div > input[type=email],
  form > div > input[type=password] {
    width: 100%;
    border: 0;
    padding: 20px 20px 20px 50px;
    background: #7dbd07;
  }
  form > div > input[type=text]:focus,
  form > div > input[type=email]:focus,
  form > div > input[type=password]:focus {
    outline: 0;
    background: #b7db25;
  }
  form > div > input[type=text]:focus + label,
  form > div > input[type=email]:focus + label,
  form > div > input[type=password]:focus + label {
    opacity: 0;
  }
  form > div > input[type=text]:valid,
  form > div > input[type=email]:valid,
  form > div > input[type=password]:valid {

    background-size: 20px;
    background-repeat: no-repeat;
    background-position: 20px 20px;
  }
  form > div > input[type=text]:valid + label,
  form > div > input[type=email]:valid + label,
  form > div > input[type=password]:valid + label {
    opacity: 0;

    //input quando il campo inserito e' invalido o vuoto viene visualizzato il placeholder
  }


  form > div > input[type=text]:invalid:not(:focus):not(:placeholder-shown),
  form > div > input[type=email]:invalid:not(:focus):not(:placeholder-shown),
  form > div > input[type=password]:invalid:not(:focus):not(:placeholder-shown) {
    background: rgb(184, 47, 56);
  }

  form > div > input[type=text]:invalid:not(:focus):not(:placeholder-shown) + label,
  form > div > input[type=email]:invalid:not(:focus):not(:placeholder-shown) + label,
  form > div > input[type=password]:invalid:not(:focus):not(:placeholder-shown) + label {
    opacity: 0;
  }


  form > div > input[type=text]:invalid:focus:not(:placeholder-shown) ~ .requirements,
  form > div > input[type=email]:invalid:focus:not(:placeholder-shown) ~ .requirements,
  form > div > input[type=password]:invalid:focus:not(:placeholder-shown) ~ .requirements {
    background: #b7db25;
    max-height: 200px;
    padding: 0 30px 20px 50px;
  }

  form > div .requirements {
    color: #999;
    max-height: 0;
    transition: 0.28s;
    overflow: hidden;
    color: red;
    font-style: italic;
  }

  form input[type=submit] {
    display: block;
    width: 100%;
    margin: 20px 0;
    background: #589507;
    color: white;
    border: 0;
    padding: 20px;
    font-size: 1.2rem;
  }

  body {
    background: #396f04;
    font-family: "PT Sans", sans-serif;
    padding: 20px;
  }

 #txtHint{
   background: #b7db25;
   position: relative;
   color:red;
   display: block;
   font-style: italic;
   text-align:justify;
 }

 #txtHint2{
   background: #b7db25;
   position: relative;
   color:red;
   display: block;
   font-style: italic;
   text-align:justify;
 }


  </style>

</head>

<body>

<div id="logo" style="position: absolute; left:88vh; top:0vh;">
  <img style="width:25vh; height:20vh;" src="logo.png">
</div>

<form name="crea_account"  action="Insert.php"   method="post"  onsubmit="validateForm()" autocomplete="off">

<!-- SCELTA NICKNAME  -->

  <script>
  function showHint3(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "gethint3.php?q=" + str, true);
      xmlhttp.send();
    }
  }
  </script>

  <div>
    <input type="text"  onkeyup="showHint3(this.value)" id="nickname" name="nickname" required placeholder=" " />
    <label for="nickname">Nickname</label>
    <span id="txtHint"></span>
  </div>

<!-- SCELTA SESSO -->

  <div>
    <select label="sesso" style="width: 100%;border: 0; padding: 20px 20px 20px 50px;background: #7dbd07; display: block;" name="sesso" id="sesso" required placeholder=" ">
      <optgroup label="sesso">
        <option value="sel" disabled="" selected=""> Scegli il sesso </option>
        <option value="s">Non specificato</option>
        <option value="m">Maschio</option>
        <option value="f">Femmina</option>
      </optgroup>
    </select>
  </div>

  <div>
    <input style="width: 100%;border: 0; padding: 20px 20px 20px 50px;background: #7dbd07; display: block;"
    type="date" id="ddn" name="ddn" required placeholder=" " />
  </div>

<!-- SCELTA REGIONE,PROVINCIA,COMUNE  -->

  <script>
  function showHint(str) {
    if (str.length == 0) {

    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          let selectProvince = document.getElementById("provincia");
          console.log(this.responseText);
          let province = JSON.parse(this.responseText);
          console.log(province);
          province.forEach((provincia) => {
              var option = document.createElement("option");
              option.text = provincia;
              selectProvince.add(option);
          });

        }
      };
      xmlhttp.open("GET", "gethint.php?q=" + str, true);
      xmlhttp.send();
    }
  }
  </script>

  <div>
    <select  name="regione" id="regione" onchange="showHint(this.value)" label="regione" style="width: 100%;border: 0; padding: 20px 20px 20px 50px;background: #7dbd07;">
      <optgroup label="regione">
        <option value="sel" disabled="" selected=""> Seleziona regione</option>
        <option value="Abruzzo">Abruzzo</option>
        <option value="Basilicata">Basilicata</option>
        <option value="Calabria">Calabria</option>
        <option value="Campania">Campania</option>
        <option value="Emilia-Romagna">Emilia-Romagna</option>
        <option value="Friuli Venezia Giulia">Friuli Venezia Giulia</option>
        <option value="Lazio">Lazio</option>
        <option value="Liguria">Liguria</option>
        <option value="Lombardia">Lombardia</option>
        <option value="Marche">Marche</option>
        <option value="Molise">Molise</option>
        <option value="Piemonte">Piemonte</option>
        <option value="Puglia">Puglia</option>
        <option value="Sardegna">Sardegna</option>
        <option value="Sicilia">Sicilia</option>
        <option value="Toscana">Toscana</option>
        <option value="Trentino">Trentino-Alto-Adige</option>
        <option value="Umbria">Umbria</option>
        <option value="Valle d'Aosta">Valle d'Aosta</option>
        <option value="Veneto">Veneto</option>
      </optgroup>
    </select>
  </div>

  <script>
  function showHint2(str) {
    if (str.length == 0) {

    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          let selectComuni = document.getElementById("comune");
          console.log(this.responseText);
          let comuni = JSON.parse(this.responseText);
          console.log(comuni);
          comuni.forEach((comune) => {
              var option = document.createElement("option");
              option.text = comune;
              selectComuni.add(option);
          });

        }
      };
      xmlhttp.open("GET", "gethint2.php?q=" + str, true);
      xmlhttp.send();
    }
  }
  </script>

<div>
  <select onchange="showHint2(this.value)" name="provincia" id="provincia" label="provincia"
  style="width: 100%;border: 0; padding: 20px 20px 20px 50px;background: #7dbd07;">
    <optgroup label="provincia">
      <option value="sel" disabled="" selected="">Seleziona provincia</option>
    </optgroup>
  </select>
</div>

<div>
  <select name="comune" id="comune" label="comune"
  style="width: 100%;border: 0; padding: 20px 20px 20px 50px;background: #7dbd07;">
    <optgroup label="comune">
      <option value="sel" disabled="" selected="">Seleziona comune</option>
    </optgroup>
  </select>
</div>

<!-- EMAIL -->

<script>
function showHint4(str) {
  if (str.length == 0) {
    document.getElementById("txtHint2").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();

    //dobbiamo andare a mettere a confronto il valore passato con l'email inserita e se concidono far uscire la scritta di cambiare email
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint2").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint4.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

<div>
  <input type="email" onkeyup="showHint4(this.value)" id="email" name="email" required placeholder=" " />
  <label for="email">Indirizzo email</label>
  <span id="txtHint2"></span>

  <div class="requirements">
    Indirizzo email non valido.
  </div>
</div>

<!-- PASSWORD -->

<div>
  <input type="password" id="password" name="password" required placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" />
  <label for="password">Password</label>
  <div class="requirements">
    La tua password deve contenere almeno 6 caratteri, una maiuscola, una minuscola e un numero.
  </div>
</div>

<input type="submit" value="Crea il tuo account Avogadro" />

<a href="login.php" style="position:relative; left:17vh; top:0vh; text-decoration:none; color: #ccff00 ;"> Hai già un account? Accedi </a>
</form>

</body>
</html>
