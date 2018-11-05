<!DOCTYPE html>
<?php include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionUsuarios.php';
include 'cargo.php';
include 'docente.php';
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
  <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
  <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/uargflow_footer.css" />
  <link rel="stylesheet" href="../lib/alertifyjs/css/alertify.css" />
  <link rel="stylesheet" href="../lib/alertifyjs/css/themes/default.css" />
  <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../lib/login.js"></script>
  <script type="text/javascript" src="../lib/funciondocente.js"></script>
    <script type="text/javascript" src="../lib/alertifyjs/alertify.min.js"></script>
  <script type="text/javascript" src="../lib/alertifyjs/alertify.js"></script>

  <body>
  <?php include_once '../gui/navbar.php'; ?>
  <div class="container">
  <div id="tabla"></div>
  </div>

  <!-- Modal Agregar Docente -->
  <div class="modal fade" id="modalagrega" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Agregar Docente</h4>
        </div>
        <div class="modal-body">
          <label>Nombre</label>
          <input type="text" name"" id='Nombrenuevo' class="form-control input-sm">
          <label>Apellido</label>
          <input type="text" name"" id='Apellidonuevo' class="form-control input-sm">
          <label>Dni</label>
          <input type="text" name"" id='Dninuevo' class="form-control input-sm">
          <label>Email</label>
          <input type="text" name"" id='Emailnuevo' class="form-control input-sm">
          <label>Cargo</label>
          <select  class="form-control form-control-sm" id="Cargonuevo">
            <option>Titular</option>
            <option>Asociado</option>
            <option>Adjunto</option>
          </select>
           <label>Dedicacion</label>
          <select  class="form-control form-control-sm" id="Dedicacionnuevo">
            <option>Exclusiva</option>
            <option>Tiempo Completo</option>
            <option>Semidedicacion</option>
             <option>Simple</option>
          </select>
          <label>Categoria</label>
          <input type="text" name"" id='Categorianuevo' class="form-control input-sm">
          <label>Departamento</label>
          <select  class="form-control form-control-sm" id="Departamentonuevo">
            <option>Exactas/Naturales</option>
            <option>Sociales</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          <button type="button" class="btn btn-success"  id="guardarnuevo" >Guardar Docente</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal editar -->
  <div class="modal fade" id="modaledita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Editar Docente</h4>
        </div>
        <div class="modal-body">
          <input type="text" hidden="" id="idpersona" name="">
          <label>Nombre</label>
          <input type="text" name"" id='Nombreu' class="form-control input-sm">
          <label>Apellido</label>
          <input type="text" name"" id='Apellidou' class="form-control input-sm">
          <label>Dni</label>
          <input type="text" name"" id='Dniu' class="form-control input-sm">
          <label>Email</label>
          <input type="text" name"" id='Emailu' class="form-control input-sm">
          <label>Cargo</label>
          <select  class="form-control form-control-sm" id="Cargou">
            <option>Titular</option>
            <option>Asociado</option>
            <option>Adjunto</option>
          </select>
          <label>Categoria</label>
          <input type="text" name"" id='Categoriau' class="form-control input-sm">
          <label>Departamento</label>
          <select  class="form-control form-control-sm" id="Departamentou">
            <option>Exactas/Naturales</option>
            <option>Sociales</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="actualizadatos">Actualizar</button>
        </div>
      </div>
    </div>
  </div>



  <?php include_once '../gui/footer.php'; ?>
  </body>
</html>
<script type="text/javascript">
     $(document).ready(function(){
       $('#tabla').load('docentetabla.php')
     });
 </script>

 <script type="text/javascript">
 $(document).ready(function(){
   $('#guardarnuevo').click(function(){
     nombre=$('#Nombrenuevo').val();
     apellido=$('#Apellidonuevo').val();
     dnin=$('#Dninuevo').val();
     emailn=$('#Emailnuevo').val();
     cargo=$('#Cargonuevo').val();
     dedicacion=$('#Dedicacionnuevo').val();
     categorian=$('#Categorianuevo').val();
     departamento=$('#Departamentonuevo').val();
    
   agregardocente(nombre,apellido,dnin,emailn,cargo,dedicacion,categorian,departamento);
   });

   $('actualizadatos').click(function()
 {
   actualizardatos();
 });

 });
</script>
