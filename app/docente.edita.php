<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_PERMISOS);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <link rel="stylesheet" href="../lib/alertifyjs/css/alertifyjs.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../lib/alertifyjs/alertify.js"></script>
        <title><?php echo Constantes::NOMBRE_SISTEMA; ?> - Crear Docente</title>
    </head>
    <!-- Button trigger modal edita -->
<button type="button" class="btn btn-primary btn-lg">
 Launch demo modal
</button>

<!-- Modal para editar -->
<div class="modal fade" id="modaledita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title" id="myModalLabel">Modal title</h4>
     </div>
     <div class="modal-body">
       ...
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary">Save changes</button>
     </div>
   </div>
 </div>
</div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
