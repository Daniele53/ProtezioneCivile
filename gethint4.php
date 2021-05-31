<?php
require "Connection.php";

$q = $_GET['q'];
$sql =  "SELECT * FROM utente where email = \"".$q."\"";
$result = $conn->query($sql);

if(!empty($result) && $result->num_rows > 0)
{
  echo "Questa e-mail già esiste";
}
echo "";

?>
