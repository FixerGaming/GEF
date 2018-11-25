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
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Crear Licencia</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>
        <div class="container">
            <form action="novedad.crear.procesar.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Nueva Licencia</h3>
                        <p>
                            Complete los campos a continuaci&oacute;n.
                            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
                            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
                        </p>
                    </div>
                        

                        <label for="inputNombre">Nombre del Docente</label>
                        <div class="form-group">
                        <input type="text" name="buscarprofesor" class="form-control" id ="buscarprofesor" >
                         <div id="listaprofesor"></div>
                        </div>
                      


                        <div class="form-group">
                            <label for="inputFechaInicio">Dia de Inicio</label>
                            <input type="date" name="fechainicio" class="form-control" id="inputFechaInicio"  placeholder="Ingrese la fecha de inicio" oninput="validar('inputFechaInicio')" required pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}"title="Ingrese formato de fecha dd/mm/yyyy" >
                        </div>
                        <div class="invalid-feedback">
                          Ingresar Dia de Inicio
                        </div>
                        <div class="form-group">
                            <label for="inputFechaFinal">Dia de Finalizacion</label>
                            <input type="date" name="fechafinal" class="form-control" id="inputFechaFinal"  placeholder="Ingrese la fecha de finalizacion" oninput="validate()" required pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" title="Ingrese formato de fecha dd/mm/yyyy">
                        </div>
                        <div class="invalid-feedback">
                          Ingresar Dia de Fin
                        </div>
                        <div class="form-group">
                            <label for="inputNombre">Tipo de Licencia</label>
                            <input type="text" name="nombre" class="form-control" id="inputNombre"  placeholder="Ingrese El nombre del tipo de licencia" oninput="validar('inputNombre')" required="" pattern="[A-Za-z]{4-23}">
                        </div>
                        <div class="invalid-feedback">
                          Tipo de licencia
                        </div>
                        <div class="form-group">
                            <label for="inputDescripcion">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" id="inputDescripcion" placeholder="Ingrese Descripcion de la Novedad" oninput="validar('inputDescripcion')" required="" pattern="[A-Za-z]{4-45}">
                        </div>
                        <div class="invalid-feedback">
                          ingresar Descripcion
                        </div>


                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success">
                            <span class="oi oi-check"></span> Confirmar
                        </button>
                        <a href="Novedades.php">
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
    $(document).ready(function(){
        $('#buscarprofesor').keyup(function(){
            var query=$(this).val();
            if(query !='')
            {
                $.ajax({
                    url:"buscarnombreprofesor.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {

                        $('#listaprofesor').fadeIn();
                        $('#listaprofesor').html(data);
                    }

                });
            }
            });
         $(document).on('click', 'li', function(){  
           $('#buscarprofesor').val($(this).text());  
           $('#listaprofesor').fadeOut();  
           }); 
        });
</script>
<script>  
function validate() {
    if(document.getElementById('inputFechaFinal').value<document.getElementById('inputFechaInicio').value) 
        document.getElementById('inputFechaFinal').setCustomValidity('Esta fecha debe ser mayor a la fecha inicial');
    else 
        document.getElementById('inputFechaFinal').setCustomValidity('');
}
</script>