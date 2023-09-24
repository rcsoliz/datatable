<?php
class Crud
{
    public function add($datos)
    {
        $obj = new connect();
        $connection = $obj->conection();

        $sql = "INSERT into t_juegos (nombre,anio,empresa)
									values ('$datos[0]',
											'$datos[1]',
											'$datos[2]')";

        return mysqli_query($connection, $sql);


    }

    public function getplay($id)
    {
        $obj = new connect();
        $connection = $obj->conection();

        $sql = "SELECT id_juego, 
                  nombre, 
                  anio, 
                  empresa 
            from t_juegos WHERE id_juego= '$id'";

        $result = mysqli_query($connection, $sql);

        $see = mysqli_fetch_row($result);

        $datos = array(
            'id_juego' => $see[0],
            'nombre' => $see[1],
            'anio' => $see[2],
            'empresa' => $see[3]
        );

        return $datos;
    }

    public function update($datos)
    {
        $obj = new connect();
        $connection = $obj->conection();

        $sql = "UPDATE t_juegos SET  
                  nombre='$datos[1]', 
                  anio='$datos[2]', 
                  empresa='$datos[3]' 
                WHERE id_juego= '$datos[0]'";

        return mysqli_query($connection, $sql);
    }

    public function deleteplay($id)
    {
        $obj = new connect();
        $connection = $obj->conection();

        $sql = "DELETE FROM t_juegos WHERE id_juego= '$id'";

        return mysqli_query($connection, $sql);

    }
}
?>