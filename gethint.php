<?php
require "Connection.php";

$q = $_GET['q'];
$sql =  "SELECT p.nome_p
FROM provincia as p
INNER JOIN regione AS r
ON r.id = p.id_regione
WHERE r.nome_r = \"".$q."\"";



$result = $conn->query($sql);



if($result->num_rows > 0)
{
  $array = [];
  while ($row = $result -> fetch_assoc()) {
  array_push($array,$row['nome_p']);
  }
 echo json_encode($array);
}
echo "";

?>
