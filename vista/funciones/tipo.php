<?php
require_once('../../assets/db/config.php');
$db = new Database();
$conexion = $db->getMysqli();

$query = $conexion->query("SELECT * FROM pet_type");

while ($row = $query->fetch_assoc()) {
	echo '<option value="' . $row['id_tiM'] . '">' . $row['noTiM'] . '</option>' . "\n";

}
?>