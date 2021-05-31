<?php

// definire le variabili per il nome del server,password,nome del database
       $host = "localhost";         //  // perchè si utilizza un server di sviluppo su computer locale
       $username = "root";          // il nome dell'utente che ha il permesso di accedere al database
       $password = "";              // password dell'utente
       $db_nome= "protezione_civile";           // nome del database


       //definisco un oggetto $conn come istanza della classe mysql
       $conn= new mysqli($host, $username, $password, $db_nome);  // parametri per creare la connessione

//per vedere se la nostra connessione ha  buon esito

       if($conn->connect_error) {         // -> viene utilizzato per l'accesso ai metodi e agli attributi di un oggetto
          echo "Impossibile connettersi al server: " . $conn->connect_error ."\n";
          //connect_errno assume il valore 0 quando non si è verificato alcun errore
       }
?>
