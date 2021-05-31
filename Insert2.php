<?php
include 'Connection.php';

  session_start();
  if(!isset($_SESSION['login']))
  {
    header('Location:Login.php');
  }
  else{
        $ddn = date("Y-m-d H:i:s");
        $infetto  = $_POST['stato'];
        $temperatura = $_POST['temperatura'];
        $ossigeno = $_POST['ossigeno'];
        $utente = $_SESSION['utente'];

$sql =  "SELECT id FROM utente WHERE email = '$utente'";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
  $id_utente = [];
  while ($row = $result -> fetch_assoc()) {
  array_push($id_utente,$row['id']);
}
      // costruzione query di inserimento
          $sql = " INSERT INTO stato_salute (tempo,infetto,ossigeno,temperatura,id_utente)";

          $sql .= " VALUES ('$ddn','$infetto','$ossigeno','$temperatura','".$id_utente[0]."')";

              if($conn->query($sql)) {
                echo "<br> Utente aggiunto correttamente ".$sql;
                header('Location: salute.php');
              //  header('Location: menu.php');
                }else{
                echo "Errore nell'inserimento dell' utente ";
                 // quando le righe non sono state inserite
                 echo error_reporting(E_ALL & ~E_DEPRECATED);
                 header('Location: salute.php');
              //  header('Location: salute.php');
              }

              if( isset ($_POST['sintomi'])){
              $sintomo = $_POST['sintomi'];
              //$last_id = $conn->insert_id;

  //
              foreach ($sintomo as $value) {
                  $sql = "INSERT INTO utente_sintomi (id_utente,id_sintomi,data)";
                $sql .="VALUES ('".$id_utente[0]."','$value','$ddn')";

                if($conn->query($sql)){
                  echo "<br> sintomo aggiunto correttamente ".$sql;
                  header('Location: salute.php');
              }else{
                echo "<br> Errore nell'inserimento dell' utente ";
                 echo error_reporting(E_ALL || ~E_DEPRECATED);
                 header('Location: salute.php');
              }

              }

              echo "<br> Righe aggiunte: ";
              echo "<br> Utente aggiunto correttamente ".$sql;
              header('Location: salute.php');
              }else{

              echo "Errore nell'inserimento utente ";  // quando le righe non sono state inserite
              echo error_reporting(E_ALL & ~E_DEPRECATED);
              header('Location: salute.php');
            }



}
}
  $conn->close();  // per chiudre la connessione

?>
