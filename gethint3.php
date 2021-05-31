<?php
require "Connection.php";

$q = $_GET['q'];
$sql =  "SELECT * FROM utente where nickname = \"".$q."\"";
$result = $conn->query($sql);

if(!empty($result) && $result->num_rows > 0)
{
  echo "Il nickname già esiste";
}
echo "";

?>
