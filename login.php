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
    top:20vh;
  }
  form > div {
    position: relative;
    background: #7dbd07;
    border-bottom: 1px solid #ccc;
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

  #scritta{
    position: relative;
    font-size: 12;
    font-family:sans-serif;
    text-align: left;
    left:5vh;
    color:black;
  }

  #alert{
    display: block;
    border-radius: 4px;
    border: 1px #c40000 solid;
    margin-bottom: 14px!important;
    box-sizing: border-box;
  }

  </style>

</head>

<body>

  <div id="logo" style="position: absolute; left:88vh;">
    <img style="width:25vh; height:20vh;" src="logo.png">
  </div>

<form action="login.php" method="post" autocomplete="off">

  <?php

      if(!isset($_POST["Accedi"])){
   ?>

  <div>
    <input type="email" id="email" name="email" required placeholder=" " />
    <label for="email">Indirizzo email</label>
    <div class="requirements">
      Indirizzo email non valido.
    </div>
  </div>

  <div>
    <input type="password" id="password" name="password" required placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" />
    <label for="password">Password</label>
    <div class="requirements">
      La tua password deve contenere almeno 6 caratteri, una maiuscola, una minuscola e un numero.
    </div>
  </div>

  <a href="iscrizione.php" style="position:relative; left:8vh; top:1.5vh; text-decoration:none; color: #ccff00 ;" >Non hai ancora un account? Crea un nuovo profilo</a>

  <input type="submit" name="Accedi" value="Accedi" />

  <?php
}else {

  $email = $_POST['email'];
  $password = $_POST['password'];
  $pas = md5($password);

  if($email == "" || $pas == ""){
    echo "devi compilare tutti i campi";
  }else{

    $sql = "SELECT * from utente WHERE email = '$email'";
    $result = $conn->query($sql);
    $errata = 1;

    if($result){

      while($row=$result->fetch_assoc())   {

          if($pas == $row['password']){
            session_start();
            $_SESSION['login'] = 'TRUE';
            $_SESSION['utente'] = $email;
            header('Location:menu.php');

            $errata = 0;

          }else{
            ?>
          <div id="alert">
            <p id="scritta" style="color:#C40000;">Si è verificato un problema!<br></p>
            <p id="scritta">password sbagliata</p>
         </div>
           <a  style="position:relative;top:1.5vh; text-decoration:none;"
            href="login.php"><input type="submit" name="Indietro" value="Torna indietro" /></a>


           <a href="iscrizione.php" style="position:relative; left:8vh; top:3vh; text-decoration:none; color: #ccff00 ;" >
             Non hai ancora un account? Crea un nuovo profilo</a>


          <?php


          $errata = 0;
          }
      }
    }

    if($errata == 1){
      ?>
      <div id="alert">
        <p id="scritta" style="color:#C40000;">Si è verificato un problema!<br></p>
        <p id="scritta">utente non registrato</p>
     </div>
       <a  style="position:relative;top:1.5vh; text-decoration:none;"
        href="login.php"><input type="submit" name="Indietro" value="Torna indietro" /></a>
        <a href="iscrizione.php" style="position:relative; left:8vh; top:3vh; text-decoration:none; color: #ccff00 ;" >
          Non hai ancora un account? Crea un nuovo profilo</a>
     <?php
    }

  }
}
   ?>

</form>
</body>

</html>
