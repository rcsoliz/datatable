<?php 
    require_once "../class/Connection.php";
    require_once "../class/crud.php";

    $obj = new Crud();

    $datos = array(
        $_POST['name'],
        $_POST['year'],
        $_POST['business']
    );

   echo $obj->add($datos);

?> 
