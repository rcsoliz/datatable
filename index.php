<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "scripts.php"; ?>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-center-left">
                    <div class="card-header">
                        Tables dinamic with datable and php
                    </div>
                    <div class="card-body">
                        <span class="btn btn-primary" data-toggle="modal" data-target="#addplay">
                            Add new item <span class="fa fa-plus-circle"></span>
                        </span>
                        <hr>
                        <div id="tablaDatatable"></div>
                    </div>
                    <div class="card-footer text-muted">
                        rc example
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addplay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addplayLabel">Add new plays</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevo">
                        <label for="">Name</label>
                        <input type="text" class="form-control input-sm" id="name" name="name">

                        <label for="">Year</label>
                        <input type="text" class="form-control input-sm" id="year" name="year">

                        <label for="">business</label>
                        <input type="text" class="form-control input-sm" id="business" name="business">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" id="additem" class="btn btn-primary">Save new</button> -->
                    <button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update play</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevoU">
                        <input type="text" hidden="" id="id" name="id">
                        <label for="">Name</label>
                        <input type="text" class="form-control input-sm" id="nameU" name="nameU">

                        <label for="">Year</label>
                        <input type="text" class="form-control input-sm" id="yearU" name="yearU">

                        <label for="">business</label>
                        <input type="text" class="form-control input-sm" id="businessU" name="businessU">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" id="btnUpdate">Update changes</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#btnAgregarnuevo').click(function () {
            datos = $('#frmnuevo').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "processes/addplay.php",
                success: function (r) {
                    if (r == 1) {
                        $('#frmnuevo')[0].reset();
                        $('#tablaDatatable').load('table.php');
                        alertify.success("add new item :D");
                    } else {
                        alertify.error("Error add new play!");
                    }
                }
            });
        });

        $('#btnUpdate').click(function () {
            datos = $('#frmnuevoU').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "processes/update.php",
                success: function (r) {
                    if (r == 1) {
                        $('#frmnuevo')[0].reset();
                        $('#tablaDatatable').load('table.php');
                        alertify.success("updated new item :D");
                    } else {
                        alertify.error("Error update new play!");
                    }
                }
            });
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tablaDatatable').load('table.php');
    });
</script>

<script type="text/javascript">
    function agregaFrmUpdate(id) {
        $.ajax({
            type: 'POST',
            data: "idjuego=" + id,
            url: "processes/getplay.php",
            success: function (r) {
                datos = jQuery.parseJSON(r);
                $('#id').val(datos['id_juego']);
                $('#nameU').val(datos['nombre']);
                $('#yearU').val(datos['anio']);
                $('#businessU').val(datos['empresa']);
            }
        });
    }

    function deleteplay(id) {
        alertify.confirm('Delete play', 'Are you sure about deleting this game :(?',
            function () {
                $.ajax({
                    type: 'POST',
                    data: "idjuego=" + id,
                    url: "processes/deleteplay.php",
                    success: function(r) {
                        if(r==1){
                            $('#tablaDatatable').load('table.php');
                            alertify.success("successfully removed.");
                        }else{
                            alertify.error("failed to remove");
                        }
                    }
                });
            }
            , function () {
           
            });

    }

</script>


