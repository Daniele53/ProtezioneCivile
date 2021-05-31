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
body {
  margin:0px;
}
.id-card-wrapper {
  height: 100vh;
  width:100%;
  background-color:linear-gradient(#7dbd07, #ccff00);;
  display: flex;
}
.id-card {
  flex-basis: 100%;
  max-width: 30em;
  border: 1px solid rgb(255,255,255);
  font-size: 20px;
  margin: auto;
  color: #fff;
  padding: 1em;
  background-color: green;
  box-shadow: 0px 0px 3px 1px #000, inset 0px 0px 3px 1px #000;
}

.profile-row {
  display: flex;
}
.profile-row .dp {
  flex-basis: 33.3%;
  position: relative;
  margin: 24px;
  align-self: center;
}
.profile-row .desc {
  flex-basis: 66.6%;
}

.profile-row .dp img {
  max-width: 100%;
  border-radius: 50%;
  display: block;
  box-shadow: 0px 0px 4px 3px #000;
}
.profile-row .desc {
  padding: 1em;
}

.profile-row .desc {
  font-family: 'Orbitron', sans-serif;
  color: #ecfcfb;
  text-shadow: 0px 0px 4px #12a0a0;
  letter-spacing: 1px;
}

</style>

  <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
  <div class="id-card-wrapper">
    <div class="id-card">
      <div class="profile-row">
        <div class="dp">
          <div class="dp-arc-outer"></div>
          <div class="dp-arc-inner"></div>
          <img src="profilo.png">
        </div>
        <div class="desc">

          <?php
          if(isset($_SESSION['login'])){
          $email = $_SESSION['utente'];
          $sql = "SELECT *
                  FROM (SELECT tempo,id_utente,ossigeno,temperatura,infetto
                  FROM stato_salute) AS SubQuery
                  INNER JOIN utente ON utente.id = SubQuery.id_utente
                  INNER JOIN comune ON comune.id = utente.id_comune
                  INNER JOIN provincia ON provincia.id = comune.id_provincia
                  INNER JOIN regione ON regione.id = provincia.id_regione
                  WHERE utente.email = '$email'";

          $result = $conn->query($sql);

          if (!$result) {
               trigger_error('Invalid query: ' . $conn->error);
             }
          if($result->num_rows> 0)
          {
            while ($row = $result -> fetch_assoc()) {

            $nickname = $row['nickname'];
            $anno = strtotime($row['anno_nascita']);
            $anno_nascita = date('d-m-Y',$anno);
            $sesso = $row['sesso'];
            $comune = $row['nome'];
            $provincia = $row['nome_p'];
            $regione = $row['nome_r'];
            $infetto = $row['infetto'];
            $temperatura = $row['temperatura'];
            $ossigeno = $row['ossigeno'];
          }

          ?>

          <p>Nickname: <?php echo $nickname?></p>
          <p>Anno di nascita: <?php echo $anno_nascita?></p>
          <p>Sesso: <?php echo $sesso?></p>
          <p>Comune: <?php echo $comune?></p>
          <p>Provincia: <?php echo $provincia?></p>
          <p>Regione: <?php echo $regione?></p>
          <p>Covid-19: <?php  echo $infetto?></p>
          <p>Temperatura corporea: <?php  echo $temperatura?></p>
          <p>Percentuale di ossigeno nel sangue: <?php echo $ossigeno?></p>

          <?php

                  }else{
                    ?>
                    <p>devi ancora inserire i tuoi dati</p>
                    <?php
                  }
                } ?>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
