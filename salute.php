<html>
<?php
include 'Connection.php';

 ?>
<head>
  <link rel="shortcut icon" href="favicon.ico" />
  <title>Elaborato progetto Protezione Civile</title>

  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet" />
  <style>
h1,
h2{
  text-align: center;
}

h4{
  text-align: center;
  position: relative;
  top:2vh;
}

h5 {
  text-align: center;
  text-transform: initial;
}

table {
  margin-left: auto;
  margin-right: auto;
}

.chart-container {
  position: relative;
  width: 500px;
}

div {
  width: 100%;
  margin: auto;
  text-align: center;
}

select {
  background: green;
  color:white;
  position: relative;
  top:4vh;
}

.no-capital {
  text-transform: none;
}

/*seconda parte*/

/*usare leaflet o open layers*/

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

ul {
  list-style: none;
}

button {
  border: none;
  background: transparent;
  outline: none;
  cursor: pointer;
}

button:active {
  color: white;
}

a {
  text-decoration: none;
  color: black;
}

a:hover {
  text-decoration: none;
  color: white;
}

body {
  font: normal 16px/1.5 Helvetica, sans-serif;
  background: linear-gradient(#7dbd07, #ccff00);
}

.top-nav li + li {
  margin-top: 7px;
}

.top-nav .menu-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  width: 350px;
  padding: 20px;
  transform: translateX(-200px);
  transition: 1s;
  background:#ccff00;
  z-index: 1;

}

.top-nav .menu-wrapper.is-opened {
  transform: translateX(150px);
}

.top-nav .menu-wrapper .menu {
  opacity: 0;
  transition: 1s;
}

.top-nav .menu-wrapper.is-opened .menu {
  opacity: 1;
  transition-delay: 1s;
}

.top-nav .menu-wrapper .menu a {
  font-size: 1.2rem;
}

.top-nav .menu-wrapper .sub-menu {
  padding: 10px 0 0 7px;
}

.top-nav .menu-wrapper .menu-close {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 1.6rem;
}

.top-nav .fixed-menu {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  display: flex;
  flex-direction: column;
  width: 150px;
  padding: 20px;
  background:  #7dbd07;
  z-index: 2;
}

.top-nav .fixed-menu .menu-open {
  font-size: 1.8rem;
  text-align: left;
  margin: 30px 0 auto;
  width: 28px;
}

.logo{
  position: relative;
  left:-5vh;
}

h3{
  font-size: 25pt;
  font-style: normal;
  font-weight: bold;
  color:SlateBlue;
  text-align: center;
  text-decoration: underline;
  z-index: 3;
  position:relative;
}


  </style>

</head>

<body>
  <nav class="top-nav">
    <div class="menu-wrapper">
      <ul class="menu" style="text-align:left;">
        <li style="color:green;text-transform: uppercase;">
          <?php
            include 'Connection.php';
            session_start();
            if(!isset($_SESSION['login']))
            {
              header('Location:Login.php');
            }
            else{

              echo $_SESSION['utente']."<br/>";
            }?>
        </li>
        <li>
          <a href="menu.php">Home</a>
        </li>
        <li>
          <a href="Profilo.php">Profilo</a>
        </li>
        <li>
          <a href="salute.php">Segnala stato di salute</a>
        </li>
        <li>
          <a href="">Progetto</a>
        </li>
        <li>
          <a href="contagiati.php">Dati github della Protezione Civile</a>
        </li>
        <li>
          <a href="mappa.php">Mappa</a>
        </li>
        <li>
          <a href="norme.php">Norme di comportamento</a>
        </li>
        <li>
        <?php  echo '<a href="Logout.php?Logout">Logout</a>';?>
        </li>
      </ul>
      <button class="menu-close" aria-label="close menu">✕</button>
    </div>
    <div class="fixed-menu">
      <h2 class="logo"><img style="width:25vh; height:20vh;" src="logo.png"></h2>
      <button class="menu-open" aria-label="open menu">☰</button>
      <ul class="socials">
        <li>
          Capra Daniele 5^CI
        </li>
        <li>
          <a target="_blank" href="https://www.instagram.com/explore/locations/484626624977186/istituto-tecnico-industriale-statale-amedeo-avogadro/">instagram</a>
        </li>
      </ul>
    </div>
  </nav>

  <script type="text/javascript">
  const menuOpen = document.querySelector(".top-nav .menu-open");
  const menuClose = document.querySelector(".top-nav .menu-close");
  const menuWrapper = document.querySelector(".top-nav .menu-wrapper");
  const topBannerOverlay = document.querySelector(".top-banner-overlay");

  function toggleMenu() {
    menuOpen.addEventListener("click", () => {
      menuWrapper.classList.add("is-opened");
      topBannerOverlay.classList.add("is-moved");
    });

    menuClose.addEventListener("click", () => {
      menuWrapper.classList.remove("is-opened");
      topBannerOverlay.classList.remove("is-moved");
    });
  }

  toggleMenu();

  </script>

<style>

html {
  height: 100%;
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: green;
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input,select,p {
  width: 100%;
  padding: 10px 0;
  color: #fff;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: green;
}

.login-box form a {
  position: relative;
  display: inline-block;
  color: white;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #ccff00;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #ccff00,
              0 0 25px #ccff00,
              0 0 50px #ccff00,
              0 0 100px #ccff00;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #ccff00);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #ccff00);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #ccff00);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #ccff00);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
</style>

  <div class="login-box">
    <?php

    if(isset($_SESSION['login']))
    {
    $utente = $_SESSION['utente'];
    $sql = " SELECT * FROM utente
    INNER JOIN stato_salute
    ON utente.id = stato_salute.id_utente
    WHERE utente.email = '$utente' AND stato_salute.tempo = (SELECT MAX(tempo) FROM stato_salute
                                                  WHERE utente.email = '$utente')";
    $result = $conn->query($sql);

  /*  if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }*/

    if($result->num_rows> 0)
    {
      while ($row = $result -> fetch_assoc()) {

      $infetto = $row['infetto'];
    //  echo print_r($infetto);

      if($infetto == "positivo"){

        $date2 = strtotime('-12 hours', strtotime(date("Y-m-d H:i:s")));
        $date = strtotime($row['tempo']);
        $dataoggi = strtotime(date("Y-m-d H:i:s"));
        $datafutura = strtotime('+12 hours',$date);
        $countdownstr =  $datafutura - $dataoggi ;
        $countdown = date('H:i:s', $countdownstr);

        if($date2 >= $date){
            ?>
    <h2>Stato salute</h2>
    <form action="Insert2.php"  method="post">
      <div  class="user-box" style="color:white; ">
        <p name="ddn" id="ddn">
      <?php
      echo date("j-F-Y, g:i a");
      ?></p>
      </div>

      <div class="user-box">
        <select required style="position: relative; top:0;" name="temperatura" id="temperatura">
        <option value="-1"  disabled="" selected="">Seleziona temperatura corporea</option>
        <option value="36">36</option>
        <option value="36.1">36.1</option>
        <option value="36.2">36.2</option>
        <option value="36.3">36.3</option>
        <option value="36.4">36.4</option>
        <option value="36.5">36.5</option>
        <option value="36.6">36.6</option>
        <option value="36.7">36.7</option>
        <option value="36.8">36.8</option>
        <option value="36.9">36.9</option>
        <option value="37">37</option>
        <option value="37.1">37.1</option>
        <option value="37.2">37.2</option>
        <option value="37.3">37.3</option>
        <option value="37.4">37.4</option>
        <option value="37.5">37.5</option>
        <option value="37.6">37.6</option>
        <option value="37.6">37.6</option>
        <option value="37.7">37.7</option>
        <option value="37.8">37.8</option>
        <option value="37.9">37.9</option>
        <option value="38">38</option>
        <option value="38.1">38.1</option>
        <option value="38.2">38.2</option>
        <option value="38.3">38.3</option>
        <option value="38.4">38.4</option>
        <option value="38.5">38.5</option>
        <option value="38.6">38.6</option>
        <option value="38.7">38.7</option>
        <option value="38.8">38.8</option>
        <option value="38.9">38.9</option>
        <option value="39">39</option>
        <option value="39.1">39.1</option>
        <option value="39.2">39.2</option>
        <option value="39.3">39.3</option>
        <option value="39.4">39.4</option>
        <option value="39.5">39.5</option>
        <option value="39.6">39.6</option>
        <option value="39.7">39.7</option>
        <option value="39.8">39.8</option>
        <option value="39.9">39.9</option>
        <option value="40">40</option>
        <option value="40.1">40.1</option>
        <option value="40.2">40.2</option>
        <option value="40.3">40.3</option>
        <option value="40.4">40.4</option>
        <option value="40.5">40.5</option>
        <option value="40.6">40.6</option>
        <option value="40.7">40.7</option>
        <option value="40.8">40.8</option>
        <option value="40.9">40.9</option>
        <option value="41">41</option>
        <option value="41.1">41.1</option>
        <option value="41.2">41.2</option>
        <option value="41.3">41.3</option>
        <option value="41.4">41.4</option>
        <option value="41.5">41.5</option>
        <option value="41.6">41.6</option>
        <option value="41.7">41.7</option>
        <option value="41.8">41.8</option>
        <option value="41.9">41.9</option>
        <option value="42">42</option>
        <option value="42.1">42.1</option>
        <option value="42.2">42.2</option>
        <option value="42.3">42.3</option>
        <option value="42.4">42.4</option>
        <option value="42.5">42.5</option>
        <option value="42.6">42.6</option>
        <option value="42.7">42.7</option>
        <option value="42.8">42.8</option>
        <option value="42.9">42.9</option>
        <option value="43">43</option>
        </select>
      </div>

      <div class="user-box">
      <select label="stato" style="position: relative; top:0;" name="stato" id="stato"  required placeholder=" ">
        <optgroup label="stato">
          <option value="sel" disabled="" selected="">Seleziona stato salute</option>
          <option value="negativo">Negativo</option>
          <option value="positivo">Positivo</option>
        </optgroup>
      </select>
      </div>

      <div class="user-box">
        <select label="ossigeno" style="position: relative; top:0;" name="ossigeno" id="ossigeno" required placeholder=" ">
          <optgroup label="ossigeno">
            <option value="sel" disabled="" selected="">Valori ossigeno</option>
            <option value="20%-30%">20%-30%</option>
            <option value="31%-50%">31%-50%</option>
            <option value="51%-70%">51%-70%</option>
            <option value="71%-90%">71%-90%</option>
            <option value="91%-100%">91%-100%</option>
          </optgroup>
        </select>
      </div>


      <div style="text-align:left;color:white;">

        <p>
       <?php
            $tab_nome ="sintomi";
            $sql = " SELECT * FROM $tab_nome";
            $result = $conn->query($sql);

            if($result->num_rows > 0)  {

              while($row=$result->fetch_assoc()) {      // ogni record che estraiamo da questo ciclo andiamo  a salvare all'interno della nostra variabile Tabella

                  echo '<input type ="checkbox" value= "'.$row["id"].'" name="sintomi[]" id="sintomi">';
                    echo $row["tipo"];
                  echo "<br>";
        }
      }
        ?>
      </p>
    </div>

      <a href="">
        <input type="submit" name="invio_dati" value="invio dati"
        style="font-size:16px; display:block; background:transparent; border:transparent; color:white;padding: 10px 20px;" />
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </a>
    </form>
  </div>

  <?php
}else{  //se l'utente è positivo e non sono passate 12 ore dall'inserimento dati
  ?>
  <form action="Insert2.php"  method="post">
    <div  class="user-box" style="color:white; ">
      <p>Potrai reinserire i dati tra : <?php echo $countdown; ?></p>
    </div>
  </form>
  <?php
          }
        }else{ //se l'utente è negativo
          $date2 = strtotime('-24 hours', strtotime(date("Y-m-d H:i:s")));
          $date = strtotime($row['tempo']);
          $dataoggi = strtotime(date("Y-m-d H:i:s"));
          $datafutura = strtotime('+24 hours',$date);
          $countdownstr =  $datafutura - $dataoggi ;
          $countdown = date('H:i:s', $countdownstr);

          if($date2 >= $date){ //se sono passate 24 ore dall'ultimo inserimento dati
            ?>

            <h2>Stato salute</h2>
            <form action="Insert2.php"  method="post">
              <div  class="user-box" style="color:white; ">
                <p name="ddn" id="ddn">
              <?php
              echo date("j-F-Y, g:i a");
              ?></p>
              </div>

              <div class="user-box">
                <select required style="position: relative; top:0;" name="temperatura" id="temperatura">
                <option value="-1"  disabled="" selected="">Seleziona temperatura corporea</option>
                <option value="36">36</option>
                <option value="36.1">36.1</option>
                <option value="36.2">36.2</option>
                <option value="36.3">36.3</option>
                <option value="36.4">36.4</option>
                <option value="36.5">36.5</option>
                <option value="36.6">36.6</option>
                <option value="36.7">36.7</option>
                <option value="36.8">36.8</option>
                <option value="36.9">36.9</option>
                <option value="37">37</option>
                <option value="37.1">37.1</option>
                <option value="37.2">37.2</option>
                <option value="37.3">37.3</option>
                <option value="37.4">37.4</option>
                <option value="37.5">37.5</option>
                <option value="37.6">37.6</option>
                <option value="37.6">37.6</option>
                <option value="37.7">37.7</option>
                <option value="37.8">37.8</option>
                <option value="37.9">37.9</option>
                <option value="38">38</option>
                <option value="38.1">38.1</option>
                <option value="38.2">38.2</option>
                <option value="38.3">38.3</option>
                <option value="38.4">38.4</option>
                <option value="38.5">38.5</option>
                <option value="38.6">38.6</option>
                <option value="38.7">38.7</option>
                <option value="38.8">38.8</option>
                <option value="38.9">38.9</option>
                <option value="39">39</option>
                <option value="39.1">39.1</option>
                <option value="39.2">39.2</option>
                <option value="39.3">39.3</option>
                <option value="39.4">39.4</option>
                <option value="39.5">39.5</option>
                <option value="39.6">39.6</option>
                <option value="39.7">39.7</option>
                <option value="39.8">39.8</option>
                <option value="39.9">39.9</option>
                <option value="40">40</option>
                <option value="40.1">40.1</option>
                <option value="40.2">40.2</option>
                <option value="40.3">40.3</option>
                <option value="40.4">40.4</option>
                <option value="40.5">40.5</option>
                <option value="40.6">40.6</option>
                <option value="40.7">40.7</option>
                <option value="40.8">40.8</option>
                <option value="40.9">40.9</option>
                <option value="41">41</option>
                <option value="41.1">41.1</option>
                <option value="41.2">41.2</option>
                <option value="41.3">41.3</option>
                <option value="41.4">41.4</option>
                <option value="41.5">41.5</option>
                <option value="41.6">41.6</option>
                <option value="41.7">41.7</option>
                <option value="41.8">41.8</option>
                <option value="41.9">41.9</option>
                <option value="42">42</option>
                <option value="42.1">42.1</option>
                <option value="42.2">42.2</option>
                <option value="42.3">42.3</option>
                <option value="42.4">42.4</option>
                <option value="42.5">42.5</option>
                <option value="42.6">42.6</option>
                <option value="42.7">42.7</option>
                <option value="42.8">42.8</option>
                <option value="42.9">42.9</option>
                <option value="43">43</option>
                </select>
              </div>

              <div class="user-box">
              <select label="stato" style="position: relative; top:0;" name="stato" id="stato"  required placeholder=" ">
                <optgroup label="stato">
                  <option value="sel" disabled="" selected="">Seleziona stato salute</option>
                  <option value="negativo">Negativo</option>
                  <option value="positivo">Positivo</option>
                </optgroup>
              </select>
              </div>

              <div class="user-box">
                <select label="ossigeno" style="position: relative; top:0;" name="ossigeno" id="ossigeno" required placeholder=" ">
                  <optgroup label="ossigeno">
                    <option value="sel" disabled="" selected="">Valori ossigeno</option>
                    <option value="20%-30%">20%-30%</option>
                    <option value="31%-50%">31%-50%</option>
                    <option value="51%-70%">51%-70%</option>
                    <option value="71%-90%">71%-90%</option>
                    <option value="91%-100%">91%-100%</option>
                  </optgroup>
                </select>
              </div>


              <div style="text-align:left;color:white;">

                <p>
               <?php
                    $tab_nome ="sintomi";
                    $sql = " SELECT * FROM $tab_nome";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0)  {

                      while($row=$result->fetch_assoc()) {      // ogni record che estraiamo da questo ciclo andiamo  a salvare all'interno della nostra variabile Tabella

                          echo '<input type ="checkbox" value= "'.$row["id"].'" name="sintomi[]" id="sintomi">';
                            echo $row["tipo"];
                          echo "<br>";
                }
              }
                ?>
              </p>
            </div>

              <a href="">
                <input type="submit" name="invio_dati" value="invio dati"
                style="font-size:16px; display:block; background:transparent; border:transparent; color:white;padding: 10px 20px;" />
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </a>
            </form>
          </div>

            <?php
        }else{ //se non sono passate 24 ore dall'ultimo inserimento dati
          ?>
          <form action="Insert2.php"  method="post">
            <div  class="user-box" style="color:white; ">
              <p>Potrai reinserire i dati tra : <?php echo $countdown; ?></p>
            </div>
          </form>

          <?php
        }
      }
    }
  }else{
    ?>
    <h2>Stato salute</h2>
    <form action="Insert2.php"  method="post">
      <div  class="user-box" style="color:white; ">
        <p name="ddn" id="ddn">
      <?php
      echo date("j-F-Y, g:i a");
      ?></p>
      </div>

      <div class="user-box">
        <select required style="position: relative; top:0;" name="temperatura" id="temperatura">
        <option value="-1"  disabled="" selected="">Seleziona temperatura corporea</option>
        <option value="36">36</option>
        <option value="36.1">36.1</option>
        <option value="36.2">36.2</option>
        <option value="36.3">36.3</option>
        <option value="36.4">36.4</option>
        <option value="36.5">36.5</option>
        <option value="36.6">36.6</option>
        <option value="36.7">36.7</option>
        <option value="36.8">36.8</option>
        <option value="36.9">36.9</option>
        <option value="37">37</option>
        <option value="37.1">37.1</option>
        <option value="37.2">37.2</option>
        <option value="37.3">37.3</option>
        <option value="37.4">37.4</option>
        <option value="37.5">37.5</option>
        <option value="37.6">37.6</option>
        <option value="37.6">37.6</option>
        <option value="37.7">37.7</option>
        <option value="37.8">37.8</option>
        <option value="37.9">37.9</option>
        <option value="38">38</option>
        <option value="38.1">38.1</option>
        <option value="38.2">38.2</option>
        <option value="38.3">38.3</option>
        <option value="38.4">38.4</option>
        <option value="38.5">38.5</option>
        <option value="38.6">38.6</option>
        <option value="38.7">38.7</option>
        <option value="38.8">38.8</option>
        <option value="38.9">38.9</option>
        <option value="39">39</option>
        <option value="39.1">39.1</option>
        <option value="39.2">39.2</option>
        <option value="39.3">39.3</option>
        <option value="39.4">39.4</option>
        <option value="39.5">39.5</option>
        <option value="39.6">39.6</option>
        <option value="39.7">39.7</option>
        <option value="39.8">39.8</option>
        <option value="39.9">39.9</option>
        <option value="40">40</option>
        <option value="40.1">40.1</option>
        <option value="40.2">40.2</option>
        <option value="40.3">40.3</option>
        <option value="40.4">40.4</option>
        <option value="40.5">40.5</option>
        <option value="40.6">40.6</option>
        <option value="40.7">40.7</option>
        <option value="40.8">40.8</option>
        <option value="40.9">40.9</option>
        <option value="41">41</option>
        <option value="41.1">41.1</option>
        <option value="41.2">41.2</option>
        <option value="41.3">41.3</option>
        <option value="41.4">41.4</option>
        <option value="41.5">41.5</option>
        <option value="41.6">41.6</option>
        <option value="41.7">41.7</option>
        <option value="41.8">41.8</option>
        <option value="41.9">41.9</option>
        <option value="42">42</option>
        <option value="42.1">42.1</option>
        <option value="42.2">42.2</option>
        <option value="42.3">42.3</option>
        <option value="42.4">42.4</option>
        <option value="42.5">42.5</option>
        <option value="42.6">42.6</option>
        <option value="42.7">42.7</option>
        <option value="42.8">42.8</option>
        <option value="42.9">42.9</option>
        <option value="43">43</option>
        </select>
      </div>

      <div class="user-box">
      <select label="stato" style="position: relative; top:0;" name="stato" id="stato"  required placeholder=" ">
        <optgroup label="stato">
          <option value="sel" disabled="" selected="">Seleziona stato salute</option>
          <option value="negativo">Negativo</option>
          <option value="positivo">Positivo</option>
        </optgroup>
      </select>
      </div>

      <div class="user-box">
        <select label="ossigeno" style="position: relative; top:0;" name="ossigeno" id="ossigeno" required placeholder=" ">
          <optgroup label="ossigeno">
            <option value="sel" disabled="" selected="">Valori ossigeno</option>
            <option value="20%-30%">20%-30%</option>
            <option value="31%-50%">31%-50%</option>
            <option value="51%-70%">51%-70%</option>
            <option value="71%-90%">71%-90%</option>
            <option value="91%-100%">91%-100%</option>
          </optgroup>
        </select>
      </div>


      <div style="text-align:left;color:white;">

        <p>
       <?php
            $tab_nome ="sintomi";
            $sql = " SELECT * FROM $tab_nome";
            $result = $conn->query($sql);

            if($result->num_rows > 0)  {

              while($row=$result->fetch_assoc()) {      // ogni record che estraiamo da questo ciclo andiamo  a salvare all'interno della nostra variabile Tabella

                  echo '<input type ="checkbox" value= "'.$row["id"].'" name="sintomi[]" id="sintomi">';
                    echo $row["tipo"];
                  echo "<br>";
        }
      }
        ?>
      </p>
    </div>

      <a href="">
        <input type="submit" name="invio_dati" value="invio dati"
        style="font-size:16px; display:block; background:transparent; border:transparent; color:white;padding: 10px 20px;" />
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </a>
    </form>
    <?php
  }
}

   ?>

</body>

</html>
