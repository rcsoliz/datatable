<?php
require_once "../class/Connection.php";
require_once "../class/crud.php";

$obj = new Crud();

echo json_encode($obj->getplay($_POST['idjuego']));
?>