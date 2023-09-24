<?php 
    require_once "../class/Connection.php";
    require_once "../class/crud.php";

    $obj = new Crud();

    $datos = array(
        $_POST['id'],
        $_POST['nameU'],
        $_POST['yearU'],
        $_POST['businessU']
    );

   echo $obj->update($datos);

?> 
