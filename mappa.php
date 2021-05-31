<html>
<?php
include 'Connection.php';
 ?>
<head>
  <link rel="shortcut icon" href="favicon.ico" />
  <title>Elaborato progetto Protezione Civile</title>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js">
  </script>

</head>

<style>
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

.map-wrap {
  position: relative;
   width: 90%;
   height: 100%;
   left: 10%;
   z-index: 0;

}
#map {

   width: 100%;
   height: 100%;
}

</style>

<body>

<nav class="top-nav">
  <div class="menu-wrapper">
    <ul class="menu">
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
        <a href="menu.php">Progetto</a>
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
        Capra Daniele  5^CI
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



<div class="map-wrap">
  <div id="map"></div>
</div>

<script>



var map = L.map('map').setView([45,8], 8);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

    L.marker([44.91 , 8.62]).addTo(map)
      .bindPopup('Alessandria')
      .openPopup();

    L.marker([44.89 , 8.20]).addTo(map)
        .bindPopup('Asti')
        .openPopup();

    L.marker([45.56 , 8.05]).addTo(map)
        .bindPopup('Biella')
        .openPopup();

    L.marker([44.39 , 7.54]).addTo(map)
      .bindPopup('Cuneo')
      .openPopup();

    L.marker([45.44 , 8.61]).addTo(map)
        .bindPopup('Novara')
        .openPopup();

    L.marker([45.80 , 8.34]).addTo(map)
        .bindPopup('Verbano-Cusio-Ossola')
        .openPopup();

    L.marker([45.32 , 8.41]).addTo(map)
        .bindPopup('Vercelli')
        .openPopup();

    L.marker([45.05 , 7.66]).addTo(map)
        .bindPopup('Torino')
        .openPopup();

    //creare un ajax che prenda i dati del database degli infetti e in base
    // al numero di infetti settimanali presenti nel database cambia il fillcolor del poligono


    // SELECT COUNT(id) as contatore FROM stato_salute where infetto = "p" and tempo = (data di oggi)

    var piemonte = L.polygon([
    [44.08, 7.71],
    [44.15, 7.76],
    [44.11, 7.92],
    [44.17, 8.09],
    [44.30, 8.03],
    [44.41, 8.21],
    [44.46, 8.20],
    [44.51, 8.24],
    [44.46, 8.36],
    [44.51, 8.41],
    [44.52, 8.55],
    [44.58, 8.61],
    [44.58, 8.72],
    [44.48, 8.77],
    [44.56, 8.85],
    [44.55, 8.91],
    [44.64, 8.88],
    [44.67, 8.92],
    [44.67, 9.01],
    [44.58, 9.15],
    [44.58, 9.19],
    [44.75, 9.19],
    [44.81, 9.15],
    [44.81, 9.07],
    [45.04, 8.92],
    [45.03, 8.64],
    [45.25, 8.53],

    [45.36, 8.52],
    [45.29, 8.69],
    [45.39, 8.85],
    [45.51, 8.72],
    [45.65, 8.69],
    [45.77, 8.55],
    [45.89, 8.56],
    [45.91, 8.73],
    [46.11, 8.72],
    [46.10, 8.64],
    [46.02, 8.52],
    [46.27, 8.41],
    [46.42, 8.46],
    [46.45, 8.41],
    [46.43, 8.36],
    [46.29, 8.17],
    [46.28, 8.13],
    [46.27, 8.07],
    [46.16, 8.17],
    [46.08, 8.03],
    [45.92, 7.85],

    [45.61, 7.92],
    [45.55, 7.71],
    [45.59, 7.56],
    [45.47, 7.11],
    [45.35, 7.18],
    [45.32, 7.11],
    [45.24, 7.11],
    [45.21, 7.02],
    [45.15, 6.88],
    [45.15, 6.72],
    [45.09, 6.62],
    [45.02, 6.73],
    [44.88, 6.79],
    [44.83, 7.01],
    [44.67, 7.05],
    [44.67, 6.96],
    [44.51, 6.84],
    [44.23, 6.98],
    [44.11, 7.41],
    [44.17, 7.67]],{
  color: 'yellow',
  fillColor: 'white'
}).addTo(map);

piemonte.bindPopup("Piemonte");

var cuneo = L.polygon([
//sud
[44.08, 7.71],
[44.15, 7.76],
[44.11, 7.92],
[44.17, 8.09],
[44.30, 8.03],
[44.41, 8.21],
[44.46, 8.20],
[44.51, 8.24],

//est
[44.58, 8.23],
[44.63, 8.18],
[44.68, 8.12],
[44.74, 8.06],

//nord
[44.74, 7.95],
[44.74, 7.83],
[44.71, 7.70],
[44.71, 7.46],
[44.71, 7.26],

//ovest
[44.67, 7.05],
[44.67, 6.96],
[44.51, 6.84],
[44.23, 6.98],
[44.11, 7.41],
[44.17, 7.67]],{
color: 'black',
fillColor: 'red'
}).addTo(map);

cuneo.bindPopup("cuneo");

var alessandria = L.polygon([
//sud
[44.51, 8.24],
[44.46, 8.36],
[44.51, 8.41],
[44.52, 8.55],
[44.58, 8.61],
[44.58, 8.72],
[44.48, 8.77],
[44.56, 8.85],
[44.55, 8.91],
[44.64, 8.88],
[44.67, 8.92],
[44.67, 9.01],
[44.58, 9.15],
[44.58, 9.19],


//est
[44.75, 9.19],
[44.81, 9.15],
[44.81, 9.07],
[45.04, 8.92],
[45.03, 8.64],
[45.20, 8.555],

//nord
[45.15, 8.13],
[45.11, 8.04],
[45.03, 8.12],
[45.01, 8.26],

//ovest
[44.95, 8.40],
[44.91, 8.44],
[44.84, 8.39],
[44.76, 8.45],
[44.67, 8.36],
[44.60, 8.30],
[44.55, 8.31],
[44.54, 8.26]
],{
color: 'black',
fillColor: 'yellow'
}).addTo(map);

alessandria.bindPopup("Alessandria");

var v_c_o = L.polygon([
//est
[45.77, 8.55],
[45.89, 8.56],
[45.91, 8.73],
[46.11, 8.72],
[46.10, 8.64],
[46.02, 8.52],
[46.27, 8.41],
[46.42, 8.46],

//nord
[46.45, 8.41],
[46.43, 8.36],
[46.29, 8.17],

//ovest
[46.28, 8.13],
[46.27, 8.07],
[46.16, 8.17],
[46.08, 8.03],
[45.92, 7.85],

//sud
[45.89, 8.09],
[45.90, 8.25],
[45.82, 8.30],
[45.74, 8.34],
[45.81, 8.38],
[45.82, 8.46]
],{
color: 'black',
fillColor: 'white'
}).addTo(map);

v_c_o.bindPopup("Verbano-Cusio-Ossola");

var novara = L.polygon([

//est
[45.36, 8.52],
[45.29, 8.69],
[45.39, 8.85],
[45.51, 8.72],
[45.65, 8.69],
[45.77, 8.55],

//nord
[45.82, 8.46],
[45.81, 8.38],
[45.74, 8.34],

//ovest
[45.71, 8.30],
[45.67, 8.25],
[45.63, 8.32],
[45.55, 8.38],
[45.41, 8.39],

//sud
[45.38, 8.46],
[45.34, 8.50],

],{
color: 'black',
fillColor: 'orange'
}).addTo(map);

novara.bindPopup("Novara");

var asti = L.polygon([

//sud
[44.51, 8.24],
[44.58, 8.23],
[44.63, 8.18],
[44.68, 8.12],
[44.74, 8.06],

//ovest
[44.80, 8.00],
[44.87, 8.03],
[44.93, 7.93],
[45.00, 7.94],

//est
[45.03, 8.12],
[45.01, 8.26],
[44.95, 8.40],
[44.91, 8.44],
[44.84, 8.39],
[44.76, 8.45],
[44.67, 8.36],
[44.60, 8.30],
[44.55, 8.31],
[44.54, 8.26],
//ovest

],{
color: 'black',
fillColor: 'yellow'
}).addTo(map);

asti.bindPopup("Asti");

var torino = L.polygon([

//sud
[44.67, 7.05],
[44.71, 7.26],
[44.71, 7.46],
[44.71, 7.70],
[44.74, 7.83],
[44.74, 7.95],
[44.74, 8.06],
//est
[44.80, 8.00],
[44.87, 8.03],
[44.93, 7.93],
[45.00, 7.94],
[45.03, 8.12],
[45.11, 8.04],
//nord
[45.23, 8.00],
[45.26, 8.03],
[45.27, 8.10],
[45.28, 8.06],
[45.31, 8.03],
[45.37, 8.03],
[45.46, 8.03],
[45.50, 7.89],
//ovest

[45.55, 7.71],
[45.59, 7.56],
[45.47, 7.11],
[45.35, 7.18],
[45.32, 7.11],
[45.24, 7.11],
[45.21, 7.02],
[45.15, 6.88],
[45.15, 6.72],
[45.09, 6.62],
[45.02, 6.73],
[44.88, 6.79],
[44.83, 7.01],
[44.67, 7.05]
],{
color: 'black',
fillColor: 'red'
}).addTo(map);

torino.bindPopup("Torino");

var biella = L.polygon([


  [45.61, 7.92],
  [45.55, 7.71],
  [45.50, 7.89],
  [45.46, 8.03],

  [45.47, 8.26],
  [45.56, 8.34],
  [45.64, 8.22],
  [45.66, 8.06],
  [45.66, 7.91],

],{
color: 'black',
fillColor: 'orange'
}).addTo(map);

biella.bindPopup("Biella");

var vercelli = L.polygon([


  [45.11, 8.04],
  [45.23, 8.00],
  [45.26, 8.03],
  [45.27, 8.10],
  [45.28, 8.06],
  [45.31, 8.03],
  [45.46, 8.03],
  [45.47, 8.26],
  [45.56, 8.34],
  [45.64, 8.22],
  [45.66, 8.06],
  [45.66, 7.91],
  [45.92, 7.85],
  [45.89, 8.09],
  [45.90, 8.25],
  [45.82, 8.30],
  [45.74, 8.34],
  [45.74, 8.34],
  [45.71, 8.30],
  [45.67, 8.25],
  [45.63, 8.32],
  [45.55, 8.38],
  [45.41, 8.39],
  [45.38, 8.46],
  [45.34, 8.50],
  [45.36, 8.52],
  [45.25, 8.53],
  [45.20, 8.555],
  [45.15, 8.13],


],{
color: 'black',
fillColor: 'yellow'
}).addTo(map);

vercelli.bindPopup("Vercelli");

</script>

</body>
</html>
