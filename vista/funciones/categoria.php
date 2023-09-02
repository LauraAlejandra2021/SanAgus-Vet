<?php
require_once('../../assets/db/config.php');

$db = new Database();
$conexion = $db->getMysqli();

$query = $conexion->query("SELECT * FROM category");

echo '<option value="0">Seleccione</option>';

while ($row = $query->fetch_assoc()) {
	echo '<option value="' . $row['id_cate'] . '">' . $row['nomcate'] . '</option>' . "\n";
}
?>