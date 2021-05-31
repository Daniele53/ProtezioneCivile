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

<!-- grafici -->

  <h1 id="titolo"></h1>
  <hr />
  <h2>DATI</h2>
  <table style="position:relative; left:10vh;">
    <tr>
      <th>nuovi positivi al giorno</th>
      <th>positivi in totale</th>
    </tr>
    <tr>
      <td>
        <div class="chart-container">
          <canvas id="chart_nuovi_positivi"></canvas>
        </div>
      </td>
      <td>
        <div class="chart-container">
          <canvas id="chart_totale_casi"></canvas>
        </div>
      </td>
    </tr>
  </table>
  <br />
  <table style="position:relative; left:10vh;">
    <tr>
      <th>nuovi dimessi guariti al giorno</th>
      <th>dimessi guariti in totale</th>
    </tr>
    <tr>
      <td>
        <div class="chart-container">
          <canvas id="chart_nuovi_dimessi_guariti"></canvas>
        </div>
      </td>
      <td>
        <div class="chart-container">
          <canvas id="chart_dimessi_guariti"></canvas>
        </div>
      </td>
    </tr>
  </table>
  <br />
  <table style="position:relative; left:10vh;">
    <tr>
      <th>variazione ricoveri in terapia intensiva al giorno</th>
      <th>ricoveri in terapia intensiva in totale</th>
    </tr>
    <tr>
      <td>
        <div class="chart-container">
          <canvas id="chart_nuovi_terapia_intensiva"></canvas>
        </div>
      </td>
      <td>
        <div class="chart-container">
          <canvas id="chart_terapia_intensiva"></canvas>
        </div>
      </td>
    </tr>
  </table>
  <br />
  <table style="position:relative; left:10vh;">
    <tr>
      <th>nuovi deceduti al giorno</th>
      <th>deceduti in totale</th>
    </tr>
    <tr>
      <td>
        <div class="chart-container">
          <canvas id="chart_nuovi_deceduti"></canvas>
        </div>
      </td>
      <td>
        <div class="chart-container"><canvas id="chart_deceduti"></canvas></div>
      </td>
    </tr>
  </table>
  <br />
  <hr />

  <h4 >SELEZIONA REGIONE</h4>
  <div id="average">
    <select onClick="average()" name="region" id="region" onchange="updatevariable(this.value)">
      <option value="Italia" selected="selected">Italia</option>
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
      <option value="P.A. Bolzano">Provincia Autonoma di Bolzano</option>
      <option value="P.A. Trento">Provincia Autonoma di Trento</option>
      <option value="Piemonte">Piemonte</option>
      <option value="Puglia">Puglia</option>
      <option value="Sardegna">Sardegna</option>
      <option value="Sicilia">Sicilia</option>
      <option value="Toscana">Toscana</option>
      <option value="Umbria">Umbria</option>
      <option value="Valle d'Aosta">Valle d'Aosta</option>
      <option value="Veneto">Veneto</option>
    </select>
  </div>
  <br />
  <br />
  <hr />


  <script>

  var region = "Italia";

function main(wantAverage = false, regione = region) {
  document.getElementById("titolo").innerHTML = "GRAFICI COVID-19 " + regione;

  function makeCharts(csv, region = regione) {
    function simpleValue(src, value = "") {
      if (region == "Italia") {
        return src.map(function (d) {
          return d[value];
        });
      } else {
        return src
          .filter(function (row) {
            return row["denominazione_regione"] == region;
          })
          .map(function (d) {
            return d[value];
          });
      }
    }

    function calculatedValue(src, value = "") {
      var oldArray = [];
      var newArray = [];

      if (region == "Italia") {
        oldArray = src.map(function (d) {
          return d[value];
        });
      } else {
        oldArray = src
          .filter(function (row) {
            return row["denominazione_regione"] == region;
          })
          .map(function (d) {
            return d[value];
          });
      }

      for (let index = 0; index < oldArray.length; index++) {
        if (index == 0) {
          newArray.push(oldArray[index]);
        } else {
          newArray.push(oldArray[index] - oldArray[index - 1]);
        }
      }

      return newArray;
    }

    function indexValue(src, value1 = "", value2 = "") {
      function safeDiv(num, den) {
        if (den == 0) {
          return 0;
        } else {
          return num / den;
        }
      }
      if (region === "Italia") {
        return src.map(function (d) {
          return safeDiv(d[value1], d[value2]) * 100;
        });
      } else {
        return src
          .filter(function (row) {
            return row["denominazione_regione"] == region;
          })
          .map(function (d) {
            return safeDiv(d[value1], d[value2]) * 100;
          });
      }
    }

    function rollingAvg(data, days = 7) {
      var averages = [];
      for (let index = 0; index < data.length; index++) {
        var adder = data[index];
        for (let i = days - 1; i > 0; i--) {
          adder = adder + data[index - i];
        }
        averages.push(adder / days);
      }
      return averages;
    }

    function rDt(data, days, lag) {
      let old_array = rollingAvg(data, days);
      let array = [];
      for (let index = 0; index < old_array.length; index++) {
        array.push(old_array[index] / old_array[index - lag]);
      }
      return array;
    }

    function returnLabels() {
      if (region == "Italia") {
        return csv.map(function (d) {
          dataString = d.data.substring(0, 10);
          return (
            dataString.slice(8, 10) +
            "/" +
            dataString.slice(5, 7) +
            "/" +
            dataString.slice(0, 4)
          );
        });
      } else {
        return csv
          .filter(function (row) {
            return row["denominazione_regione"] == region;
          })
          .map(function (d) {
            dataString = d.data.substring(0, 10);
            return (
              dataString.slice(8, 10) +
              "/" +
              dataString.slice(5, 7) +
              "/" +
              dataString.slice(0, 4)
            );
          });
      }
    }

    function lineChart(
      name,
      ticksOptions = { min: 0 },
      inputData,
      bgColor,
      lineColor
    ) {
      return new Chart(name, {
        type: "line",
        options: {
          animation: {
            duration: 300
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [
              {
                ticks: ticksOptions
              }
            ]
          }
        },
        data: {
          labels: returnLabels(),
          datasets: [
            {
              data: inputData,
              borderColor: lineColor,
              backgroundColor: bgColor,
              radius: 0,
              order: 1,
              label:
                name
                  .replace(/_/g, " ")
                  .replace("chart ", "")
                  .charAt(0)
                  .toUpperCase() +
                name.replace(/_/g, " ").replace("chart ", "").slice(1)
            },
            {
              data: rollingAvg(inputData),
              borderColor: "rgba(0,0,0,0.8)",
              fill: false,
              radius: 0,
              order: 0,
              label: "Media mobile (7 giorni)",
              showLine: wantAverage
            }
          ]
        }
      });
    }

    function lineChartNoAVG(
      name,
      ticksOptions = { min: 0 },
      inputData,
      bgColor,
      lineColor
    ) {
      return new Chart(name, {
        type: "line",
        options: {
          animation: {
            duration: 300
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [
              {
                ticks: ticksOptions
              }
            ]
          }
        },
        data: {
          labels: returnLabels(),
          datasets: [
            {
              data: inputData,
              borderColor: lineColor,
              backgroundColor: bgColor,
              radius: 0,
              order: 1,
              label:
                name
                  .replace(/_/g, " ")
                  .replace("chart ", "")
                  .charAt(0)
                  .toUpperCase() +
                name.replace(/_/g, " ").replace("chart ", "").slice(1)
            }
          ]
        }
      });
    }

    if (document.chart_nuovi_positivi != undefined)
      document.chart_nuovi_positivi.destroy();
    document.chart_nuovi_positivi = lineChart(
      (name = "chart_nuovi_positivi"),
      (ticksOptions = { min: 0 }),
      (inputData = simpleValue(csv, "nuovi_positivi")),
      (bgColor = "rgba(25,118,210,0.75)"),
      (lineColor = "rgba(13,71,161,0.8)")
    );

    if (document.chart_totale_casi != undefined)
      document.chart_totale_casi.destroy();
    document.chart_totale_casi = lineChart(
      (name = "chart_totale_casi"),
      (ticksOptions = { min: 0 }),
      (inputData = simpleValue(csv, "totale_casi")),
      (bgColor = "rgba(30,136,229,0.75)"),
      (lineColor = "rgba(21,101,192,0.8)")
    );

    if (document.chart_nuovi_dimessi_guariti != undefined)
      document.chart_nuovi_dimessi_guariti.destroy();
    document.chart_nuovi_dimessi_guariti = lineChart(
      (name = "chart_nuovi_dimessi_guariti"),
      (ticksOptions = { min: 0 }),
      (inputData = calculatedValue(csv, "dimessi_guariti")),
      (bgColor = "rgba(56,142,60,0.75)"),
      (lineColor = "rgba(27,94,32,0.8)")
    );

    if (document.chart_dimessi_guariti != undefined)
      document.chart_dimessi_guariti.destroy();
    document.chart_dimessi_guariti = lineChart(
      (name = "chart_dimessi_guariti"),
      (ticksOptions = { min: 0 }),
      (inputData = simpleValue(csv, "dimessi_guariti")),
      (bgColor = "rgba(67,160,71,0.75)"),
      (lineColor = "rgba(46,125,50,0.8)")
    );

    if (document.chart_nuovi_terapia_intensiva != undefined)
      document.chart_nuovi_terapia_intensiva.destroy();
    document.chart_nuovi_terapia_intensiva = lineChart(
      (name = "chart_nuovi_terapia_intensiva"),
      (ticksOptions = { }),
      (inputData = calculatedValue(csv, "terapia_intensiva")),
      (bgColor = "rgba(245,124,0,0.75)"),
      (lineColor = "rgba(230,81,0,0.8)")
    );

    if (document.chart_terapia_intensiva != undefined)
      document.chart_terapia_intensiva.destroy();
    document.chart_terapia_intensiva = lineChart(
      (name = "chart_terapia_intensiva"),
      (ticksOptions = { min: 0 }),
      (inputData = simpleValue(csv, "terapia_intensiva")),
      (bgColor = "rgba(251,140,0,0.75)"),
      (lineColor = "rgba(239,108,0,0.8)")
    );

    if (document.chart_nuovi_deceduti != undefined)
      document.chart_nuovi_deceduti.destroy();
    document.chart_nuovi_deceduti = lineChart(
      (name = "chart_nuovi_deceduti"),
      (ticksOptions = { min: 0 }),
      (inputData = calculatedValue(csv, "deceduti")),
      (bgColor = "rgba(229,57,53,0.75)"),
      (lineColor = "rgba(198,40,40,0.8)")
    );

    if (document.chart_deceduti != undefined)
      document.chart_deceduti.destroy();
    document.chart_deceduti = lineChart(
      (name = "chart_deceduti"),
      (ticksOptions = { min: 0 }),
      (inputData = simpleValue(csv, "deceduti")),
      (bgColor = "rgba(244,67,54,0.75)"),
      (lineColor = "rgba(211,47,47,0.8)")
    );

    if (document.chart_positivi_su_tamponi != undefined)
      document.chart_positivi_su_tamponi.destroy();
    document.chart_positivi_su_tamponi = lineChart(
      (name = "chart_positivi_su_tamponi"),
      (ticksOptions = {
        min: 0,
        max: 100,
        callback: function (tick) {
          return tick.toString() + "%";
        }
      }),
      (inputData = indexValue(csv, "totale_casi", "casi_testati")),
      (bgColor = "rgba(103,58,183,0.75)"),
      (lineColor = "rgba(81,45,168,0.8)")
    );

    if (
      document.chart_pazienti_in_terapia_intensiva_su_sintomatici_ricoverati !=
      undefined
    )
      document.chart_pazienti_in_terapia_intensiva_su_sintomatici_ricoverati.destroy();
    document.chart_pazienti_in_terapia_intensiva_su_sintomatici_ricoverati = lineChart(
      (name = "chart_pazienti_in_terapia_intensiva_su_sintomatici_ricoverati"),
      (ticksOptions = {
        min: 0,
        max: 100,
        callback: function (tick) {
          return tick.toString() + "%";
        }
      }),
      (inputData = indexValue(
        csv,
        "terapia_intensiva",
        "ricoverati_con_sintomi"
      )),
      (bgColor = "rgba(94,53,177,0.75)"),
      (lineColor = "rgba(69,39,160,0.8)")
    );

    if (document.chart_RDt != undefined) document.chart_RDt.destroy();
    document.chart_RDt = lineChartNoAVG(
      (name = "chart_RDt"),
      (ticksOptions = { min: 0, max: 4 }),
      (inputData = rDt(
        simpleValue(csv, "totale_positivi"),
        (days = 7),
        (lag = 6)
      )),
      (bgColor = "rgba(0,0,0,0)"),
      (lineColor = "rgba(0,0,0,0.8)")
    );
  }

  if (regione == "Italia") {
    d3.csv(
      "https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-andamento-nazionale/dpc-covid19-ita-andamento-nazionale.csv",
      function (d) {
        return {
          data: d.data,
          ricoverati_con_sintomi: +d.ricoverati_con_sintomi,
          terapia_intensiva: +d.terapia_intensiva,
          nuovi_positivi: +d.nuovi_positivi,
          dimessi_guariti: +d.dimessi_guariti,
          deceduti: +d.deceduti,
          totale_casi: +d.totale_casi,
          totale_positivi: +d.totale_positivi,
          casi_testati: +d.casi_testati,
          tamponi: +d.tamponi
        };
      }
    ).then(makeCharts);
  } else {
    d3.csv(
      "https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-regioni/dpc-covid19-ita-regioni.csv",
      function (d) {
        return {
          data: d.data,
          denominazione_regione: d.denominazione_regione,
          ricoverati_con_sintomi: +d.ricoverati_con_sintomi,
          terapia_intensiva: +d.terapia_intensiva,
          nuovi_positivi: +d.nuovi_positivi,
          dimessi_guariti: +d.dimessi_guariti,
          deceduti: +d.deceduti,
          totale_casi: +d.totale_casi,
          totale_positivi: +d.totale_positivi,
          casi_testati: +d.casi_testati,
          tamponi: +d.tamponi
        };
      }
    ).then(makeCharts);
  }
}

function average() {
  var checkBox = document.getElementById("average");
  if (checkBox.checked == true) {
    var wantAverage = true;
  } else {
    var wantAverage = false;
  }
  main(wantAverage);
}

function updatevariable(regione) {
  region = regione;
  average();
}

average();

  </script>
</body>
</html>
