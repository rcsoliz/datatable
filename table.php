<?php
require_once "class/connection.php";
$obj = new connect();
$connection = $obj->conection();

$sql = "select id_juego, 
                  nombre, 
                  anio, 
                  empresa 
            from t_juegos";
$result = mysqli_query($connection, $sql);
?>

<div>
    <table class="table table-hover table-condensed table-bordered" id="iddatable">
        <thead style="background-color: #dc3545;color: white;
                font-weight: bold;">
            <tr>
                <td>Name</td>
                <td>Year</td>
                <td>business</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tfoot style="background-color: #ccc;color: white;
                font-weight: bold;">
            <tr>
                <td>Name</td>
                <td>Year</td>
                <td>business</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </tfoot>
        <tbody style="background-color:white">
            <?php
            while ($mostrar = mysqli_fetch_row($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $mostrar[1] ?>
                    </td>
                    <td>
                        <?php echo $mostrar[2] ?>
                    </td>
                    <td>
                        <?php echo $mostrar[3] ?>
                    </td>
                    <td style="text-align: centecenter;">
                        <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit"
                            onclick="agregaFrmUpdate('<?php echo $mostrar[0] ?>')">
                            <span class="fa fa-pencil"></span>
                        </span>

                    </td>
                    <td style="text-align: centecenter;">
                        <span class="btn btn-danger btn-sm" onclick="deleteplay('<?php echo $mostrar[0] ?>')">
                            <span class="fa fa-trash"></span>
                        </span>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

 <!-- <script type="text/javascript">
    new DataTable('#iddatable');
</script> -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#iddatable').DataTable({
            dom: 'lBfrtip',// 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
    });
</script>