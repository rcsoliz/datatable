<?php
require_once "../class/Connection.php";
require_once "../class/crud.php";

$obj = new Crud();


echo $obj->deleteplay($_POST['idjuego']);

?>