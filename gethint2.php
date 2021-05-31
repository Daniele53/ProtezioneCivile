<?php
require "Connection.php";

$q = $_GET['q'];
$sql =  "SELECT c.nome
FROM comune as c
INNER JOIN provincia AS p
ON p.id = c.id_provincia
WHERE p.nome_p = \"".$q."\"";



$result = $conn->query($sql);



if($result->num_rows > 0)
{
  $array = [];
  while ($row = $result -> fetch_assoc()) {
  array_push($array,$row['nome']);
  }
 echo json_encode($array);
}
echo "";

?>
