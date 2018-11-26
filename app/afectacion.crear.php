<?php
include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionDocentes.php';
include_once '../modelo/ColeccionLicencia.php';
include_once '../modelo/ColeccionTipoLicencia.php';
$ColeccionDocente = new ColeccionDocentes();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/uargflow_footer.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../lib/validar.js"></script>
        <script type="text/javascript" src="../lib/alertifyjs/alertify.min.js"></script>
    <script type="text/javascript" src="../lib/alertifyjs/alertify.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Crear Licencia</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="afectacion.crear.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Nueva Licencia</h3>
                        <p>
                            Complete los campos a continuaci&oacute;n.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                        


                        <label for="inputNombre">Asignaturas</label>
                        <div class="form-group">
                        <input type="text" name="buscarasignatura" class="form-control" id ="buscarasignatura" >
                         <div id="listaasignaturas"></div>
                        </div>

                        <label for="inputPresidente">Presidente</label>
                        <div class="form-group">
                        <input type="text" name="buscarpresidente"sidente class="form-control" id ="buscarpresidente" >
                         <div id="listapresidente"></div>
                        </div>


                       <label for="inputVocal">Vocal</label>
                        <div class="form-group">
                        <input type="text" name="buscarvocal"sidente class="form-control" id ="buscarvocal" >
                         <div id="listavocal"></div>
                        </div>
                      

                        <label for="inputSegundoVocal">Segundo Vocal</label>
                        <div class="form-group">
                        <input type="text" name="buscarvocal1"sidente class="form-control" id ="buscarvocal1" >
                         <div id="listavocal1"></div>
                        </div>
                      

                       <label for="inputSuplente">Suplente</label>
                        <div class="form-group">
                        <input type="text" name="buscarsuplente"sidente class="form-control" id ="buscarsuplente" >
                         <div id="listasuplente"></div>
                        </div>
                      

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success">
                            <span class="oi oi-check"></span> Confirmar
                        </button>
                        <a href="gestionarAfectacion.php">
                            <button type="button" class="btn btn-outline-danger">
                                <span class="oi oi-x"></span> Cancelar
                            </button>
                        </a>
                    </div>
                </div>
            </form>

          
            <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
            <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
        </div>
        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
<script>
    $(document.getElementById('#buscarapresidente')).ready(function(){
        $('#buscarpresidente').keyup(function(){
            var query=$(this).val();
            if(query !='')
            {
                $.ajax({
                    url:"buscarnombreprofesor.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {

                        $('#listapresidente').fadeIn();
                        $('#listapresidente').html(data);
                    }

                });
            }
            });
         $(document).on('click', 'li', function(){  
           $('#buscarpresidente').val($(this).text());  
           $('#listapresidente').fadeOut();  
           }); 
        });
        


</script>
<script>
    $(document.getElementById('#buscarasignatura')).ready(function(){
        $('#buscarasignatura').keyup(function(){
            var query=$(this).val();
            if(query !='')
            {
                $.ajax({
                    url:"buscarasignatura.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {

                        $('#listaasignaturas').fadeIn();
                        $('#listaasignaturas').html(data);
                    }

                });
            }
            });
         $(document).on('click', 'li', function(){  
           $('#buscarasignatura').val($(this).text());  
           $('#listaasignaturas').fadeOut();  
           }); 
        });
</script>