<?php
require_once '../../assets/db/config.php';
//setting header to json
header('Content-Type: application/json');

//get connection 
$db = new Database();
$mysqli = $db->getMysqli();

if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT codigo, stock FROM products ORDER BY id_prod");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);