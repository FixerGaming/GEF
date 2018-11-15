<?php include_once '../modelo/BDConexion.Class.php';?>

<form method="post">
  <div class="card">
      <div class="card-header">
          <h2>Gestionar Docente</h2>
      </div>
      <div class="card-body">
        <h3>Buscar Docente</h3>
        <p>
            Complete los campos a continuaci&oacute;n.
            Luego, presione el bot&oacute;n <b>Confirmar</b>.<br />
            Si desea cancelar, presione el bot&oacute;n <b>Cancelar</b>.
        </p>
        <div >
            <label for="inputNombre">Nombre</label>
            <input type="text" name="nombrebuscar" class="form-control"  placeholder="Ingrese el nombre del Docente">
        </div>
        <div class="form-row ">
          <div class="col">
            <label for="inputNombre">Cargo</label>
            <input type="text" name="cargobuscar" class="form-control"  placeholder="Ingrese el cargo del docente" >
          </div>
         <div class="col">
           <label for="inputNombre">Categoria</label>
           <input type="text" name="categoriabuscar" class="form-control" id="categoriab" placeholder="Ingrese la categoria del docente">
         </div>
       </div>
       <div class="form-group col-md-6">
         <label for="inputNombre">Dni</label>
         <input type="integer" name="dnidocentebuscar" class="form-control" id="dnidocentb" placeholder="Ingrese Dni">
       </div>
     <p align="center">
       <button type="submit" class="btn btn-danger">
           <span class="oi oi-x"></span>
           Cancelar
       </button>
       <a>
           <button type="submit" name="buscar" class="btn btn-success" >
             <span class="oi oi-check"></span>
               Buscar
           </button>
       </a>
     </p>
      </div>
  </div>
</form>
</div>
<h3>Listado Docente</h3>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalagrega">
    <span class="oi oi-plus"></span> Nuevo Docente
  </button>
<div class="row">
  <div class ="col-sm-12">
    <table class ="table table-hover table-condensed table-bordered">
      <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Dni</td>
        <td>Email</td>
        <td>Cargo</td>
        <td>Categoria</td>
        <td>Departamento</td>
        <td>Editar</td>
        <td>Eliminar</td>
        <td>Ver mas</td>
      </tr>
      <?php
      $profesortabla="SELECT PROFESOR.id,PROFESOR.dni,PROFESOR.apellido,PROFESOR.nombre,PROFESOR.email,PROFESOR.categoria,CARGO.id,CARGO.tipoCargo,CARGO.tipoDedicacion
      FROM PROFESOR INNER JOIN CARGO ON PROFESOR.id = CARGO.idProfesorcarg ";
      $profesores=BDConexion::getInstancia()->query($profesortabla);

       while($ver=mysqli_fetch_row($profesores)) {
        $datos=$ver[0]."||".
                $ver[1]."||".
                $ver[2]."||".
                $ver[3]."||".
                $ver[4]."||".
                $ver[5]."||".
                $ver[6]."||".
                $ver[7]."||";
         ?>
      <tr>
        <td><?php echo $ver [3] ?></td>
        <td><?php echo $ver [2] ?></td>
        <td><?php echo $ver [1] ?></td>
        <td><?php echo $ver [4] ?></td>
        <td><?php echo $ver [7] ?></td>
        <td><?php echo $ver [5] ?></td>
        <td>

          <button class="btn btn-outline-warning" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modaledita" onclick=agregaform"(<<?php echo $datos; ?>)">
              <span class="oi oi-pencil"></span>
          </button>
        
          <button class="btn btn-outline-danger" class="glyphicon glyphicon-trash" onclick="PreguntarSiNO()">
             <span class="oi oi-trash"></span>
          </button>
        
          <button class="btn btn-outline-primary" class="btn btn-outline-info">
             <span class="oi oi-zoom-in"></span>
          </button>
        </td>
      </tr>
      <?php
    }
       ?>
    </table>
  </div>
