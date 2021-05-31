<html>

<head>

  <link rel="stylesheet"  href="Style.css">
  <title> INSERIMENTO DATI </title>

</head>

<style>
body{
  background-image: url(Sfondo.jpg);
  background-repeat:  no-repeat;
  background-size:  cover;
}

div{
  position: relative;
  font-family: fantasy;
  font-style: italic;
  color: black;
  top:18vh;
  left:400px;
  width: 200px;
  height: 30vh;
  border: 5px solid white;
  padding: 100px;
  margin: 20px;
  border-radius: 25px;
  box-shadow: 10px  10px 5px #dedede,
              -10px -10px 5px #dedede,
               10px -10px 5px #dedede,
              -10px  10px 5px #dedede;
  }

  B{
    position: relative;
    top: -6vh;
    font-size: 23px;
  }

button{
  font-family: fantasy;
  font-size: 18px;
  color: blue;
  background-color: 255,255,255;
  opacity: 0.8;
  font-style: italic;
  position:relative;
  width:150%;
  heigth:100%;
  right: 50px;
  padding:30;
  border-radius:30px;
  border: 1px solid white;
  }

  button:hover{
    opacity: 1;
    font-size: 20px;
    color: blue;
    border: 4px solid blue;
  }

  mark{
    background-color:white;
    position: relative;
    color: blue;
    left: 25px;
  }
</style>


<body style = "Background-image:url(sfondo.jpg)">

<div>
  <B><mark>   BENVENUTO  </mark></B>

  <button  onclick="location.href='login.php'"  value="Visualizza Tabella">

     Accedi ad Area Privata

  </button>


  <button style="top: 3vh" onclick="location.href='iscrizione.php'" value="Insert Utente">
    Inserisci nuovo Utente
  </button>


</div>

</body>
</html>
