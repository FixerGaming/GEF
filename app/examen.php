<!DOCTYPE html>
<?php include_once '../lib/ControlAcceso.Class.php';
ControlAcceso::requierePermiso(PermisosSistema::PERMISO_USUARIOS);
include_once '../modelo/ColeccionCarrera.php';
include_once '../modelo/ColeccionDocentes.php';
$ColeccionCarrera = new ColeccionCarrera();
$ColeccionDocentes = new ColeccionDocentes();

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
  <script type="text/javascript" src="../lib/funcionMesa.js"></script>
  <script type="text/javascript" src="../lib/alertifyjs/alertify.js"></script>
  <body>
  <?php include_once '../gui/navbar.php'; ?>
  <div class="container">
  <div id="tabla"></div>
  <div class="tabla"></div>
  </div>
 
    <br>
    <br>
</form>
  <!-- Modal Agregar Examen -->
  <div class="modal fade" id="modalagrega" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Agregar Examen</h4>
        </div>
        <div class="modal-body">
          <label>Carrera</label>
					<select class="form-control form-control-sm" id="CarreraNueva">	
            <?php foreach ($ColeccionCarrera->getCarrera() as $Carrera) {
           ?>
               <option><?= $Carrera->getNombre(); ?></option>
            <?php } ?>
					</select>
          <label>Asignatura</label>
          <input type="text" name"" id='NuevaAsignatura' class="form-control input-sm">
          <label>Presidente</label>
          <select class="form-control form-control-sm" id="PresidenteNuevo">	
            <?php foreach ($ColeccionDocentes->getDocentes() as $Docente) {
               echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
             }  
            ?>
          </select>
          <label>Vocal 1</label>
          <select class="form-control form-control-sm" id="VocalNuevo">	
            <?php foreach ($ColeccionDocentes->getDocentes() as $Docente) {
               echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
             }  
            ?>
          </select>         
          <label>Vocal 2</label>
          <select class="form-control form-control-sm" id="VocalNuevo1">	
            <option><?=" "?></option>
            <?php foreach ($ColeccionDocentes->getDocentes() as $Docente) {
               echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
             }  
            ?>
          </select>
          <label>Suplente</label>
          <select class="form-control form-control-sm" id="SuplenteNuevo">	
           <option><?=" "?></option>
             <?php foreach ($ColeccionDocentes->getDocentes() as $Docente) {
               echo '<option value="'.$Docente->getId().'">'.$Docente->getNombre().'</option>';
             }  
            ?>
          </select>
          <label>1 Llamado</label>
          <input type="text" name"" id='1llamadoNuevo' class="form-control input-sm">
          <label>2 Llamado</label>
          <input type="text" name"" id='2llamadoNuevo' class="form-control input-sm">
          <label>Hora</label>
          <input type="text" name"" id='HoraNuevo' class="form-control input-sm">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

          <button type="button" class="btn btn-success" id="guardarnuevo" >Guardar Mesa</button>
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
       $('#tabla').load('examenTabla.php')
     });
 </script>
 <script type="text/javascript">
 $(document).ready(function(){
   $('#guardarnuevo').click(function(){
     carrera=$('#CarreraNueva').val();
     
     presidente=$('#PresidenteNuevo').val();
     vocal=$('#VocalNuevo').val();
     vocal1=$('#VocalNuevo1').val();
     suplente=$('#SuplenteNuevo').val();
     llamado1=$('#1llamadoNuevo').val();
     llamado2=$('#2llamadoNuevo').val();
     hora=$('#HoraNuevo').val();
     agregarExamen(carrera,asignatura,presidente,vocal,vocal1,suplente,llamado1,llamado2,hora);
     });

   $('actualizadatos').click(function()
 {
   actualizardatos();
 });

 });
 </script>
