<html>
<?php
include 'Connection.php';
 ?>
<head>
  <link rel="shortcut icon" href="favicon.ico"/>
  <title>Elaborato progetto Protezione Civile</title>
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


.top-banner {
  display: flex;
  width: calc(100% - 150px);
  height: 100vh;
  transform: translateX(150px);
  background: url(sfondo.jpg) no-repeat center / cover;
}

.top-banner-overlay {
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 350px;
  padding: 20px;
  transition: 0.5s;
  color: white;
  background: rgba(39, 64, 04, 0.7);
}

.top-banner-overlay.is-moved {
  transform: translateX(350px);
}

.top-banner-overlay.is-moved::before {
  content: '';
  position: absolute;
  top: 0;
  bottom: 0;
  right: 100%;
  width: 20px;
  box-shadow: 0 0 10px black;
}

.top-banner-overlay p {
  font-size: 1rem;
  margin-top: 10px;
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

<body>
  <section class="top-banner">
  <div class="top-banner-overlay">
    <h1>Protezione Civile</h1>
    <p>Applicazione Web Protezione Civile con particolare attenzione
alla gestione del progetto, al database e ai Firewall.</p>
  </div>
</section>
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
</body>
</html>
