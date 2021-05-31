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
  text-transform: uppercase;
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

  </style>
  <script src="https://d3js.org/d3.v6.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
    integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
    crossorigin="anonymous"
  ></script>

</head>

<body onload="updatevariable('Italia')">
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
          <a href="contagiati.php">Contagiati</a>
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
        Capra Daniele 5°CI
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
  width: 800px;
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
  text-align: left;
}

.login-box .user-box {
  position: relative;
  text-align: left;
  font-size: 12px;
  color:white;
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
</style>

<div class="login-box">

  <div class="user-box">

    <h2> NORME DI COMPORTAMENTO DA RISPETTARE </h2>

<p>🟡 Lava spesso le mani con acqua e sapone o, in assenza, frizionale con un gel a base alcolica </p> <br>

<p>🟡 Non toccarti occhi, naso e bocca con le mani. Se non puoi evitarlo, lavati comunque le mani prima e dopo il contatto </p> <br>

<p>🟡 Quando starnutisci copri bocca e naso con fazzoletti monouso. Se non ne hai, usa la piega del gomito </p> <br>

<p>🟡 Pulisci le superfici con disinfettanti a base di cloro o alcol </p> <br>

<p>🟡 Copri mento, bocca e naso possibilmente con una mascherina in tutti i luoghi affollati e a ogni contatto sociale con distanza minore di un metro </p> <br>

<p>🟡 Utilizza guanti monouso per scegliere i prodotti sugli scaffali e i banchi degli esercizi commerciali </p> <br>

<p>🟡 Evita abbracci e strette di mano </p> <br>

<p>🟡 Evita sempre contatti ravvicinati mantenendo la distanza di almeno un metro </p> <br>

<p>🟡 Non usare bottiglie e bicchieri toccati da altri</p>

</div>
</div>

</body>
</html>
