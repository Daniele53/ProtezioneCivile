<?php

include 'Connection.php';

        $nickname  = $_POST['nickname'];
        $sesso  = $_POST['sesso'];
        $ddn = $_POST['ddn'];  // data di nascita
        $email = $_POST['email'];
        $password = $_POST['password'];

        //trasformre il nome del comune nell'id così da confermare il vincolo
        $comune = $_POST['comune'];
        $sql =  "SELECT id FROM comune where nome = '$comune'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
          $id_comune = [];
          while ($row = $result -> fetch_assoc()) {
          array_push($id_comune,$row['id']);
        }

        $pass = md5($password);

        // costruzione query di inserimento
          $sql = " INSERT INTO utente (nickname,sesso,anno_nascita,email,password,id_comune)";
          $sql .= " VALUES ('$nickname','$sesso','$ddn','$email','$pass','".$id_comune[0]."')";

              if($conn->query($sql)) {

                echo "<br> Utente aggiunto correttamente ".$sql;
                  echo "Righe aggiunte: ";
               header('Location: login.php');
                }

              else
              {

                echo "Errore nell'inserimento dell' utente ";
                 // quando le righe non sono state inserite
                 echo error_reporting(E_ALL & ~E_DEPRECATED);
                header('Location: iscrizione.php');

              }
}
  $conn->close();  // per chiudre la connessione

?>
