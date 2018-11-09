<?php include_once '../modelo/BDConexion.Class.php';?>


<div class="">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalagrega">
      <span class="oi oi-plus"> Agregar Examen</span>
    </button>
</div>
  <br>
<div class="row">
  <div class ="col-sm-12">
    <table class ="table table-hover table-condensed table-bordered">
      <tr>
        <td>Carrera</td>
        <td>Asignatura</td>
        <td>Presidente</td>
        <td>Vocal 1</td>
        <td>Vocal 2</td>
        <td>Suplente</td>
        <td>1 Llamado</td>
        <td>2 Llamado</td>
        <td>hora</td>
        <td>Editar</td>
        <td>Eliminar</td>
        <td>Ver mas</td>
      </tr>
      <?php
      $examentabla="SELECT C.`nombre`,A.`nombre`,T1.`nombre`,T2.`nombre`,T3.`nombre`,T4.`nombre`,LM.`hora`
                    FROM  MESA_EXAMEN E  JOIN LLAMADO_MESA_EXAMEN LM  JOIN LLAMADO L,
                    (SELECT A.`nombre`
                    FROM ASIGNATURA A JOIN MESA_EXAMEN M ON A.`id`= M.`codAsignatura`)A,
                    (SELECT C.`nombre`
                    FROM CARRERA C JOIN MESA_EXAMEN_CARRERA MC JOIN MESA_EXAMEN M
                    WHERE C.`id`= MC.`codCarrera` AND MC.`codMesa`= M.`id`) C,
                    (SELECT P1.`nombre`, T.`id`
                    FROM TRIBUNAL T JOIN MESA_EXAMEN M JOIN PROFESOR P1
                    WHERE T.`presidente`=P1.`id`AND M.`idTribunal`=T.`id`) T1,
                    (SELECT P2.`nombre`,T.`id`
                    FROM TRIBUNAL T JOIN MESA_EXAMEN M JOIN PROFESOR P2
                    WHERE T.`vocal`=P2.`id` AND M.`idTribunal`=T.`id`) T2,
                    (SELECT P3.`nombre`,T.`id`
                    FROM TRIBUNAL T JOIN MESA_EXAMEN M JOIN PROFESOR P3
                    WHERE T.`vocal1`=P3.`id` AND M.`idTribunal`=T.`id`) T3,
                    (SELECT P4.`nombre`,T.`id`
                    FROM TRIBUNAL T JOIN MESA_EXAMEN M JOIN PROFESOR P4
                    WHERE T.`suplente`=P4.`id` AND M.`idTribunal`=T.`id`) T4
                    WHERE  E.`id` = LM.`idMesa` AND L.`id` = LM.`idLlamado`  AND E.`idTribunal`=T1.`id` AND E.`idTribunal`=T2.`id` AND E.`idTribunal`=T3.`id` AND E.`idTribunal`=T4.`id`";

      $examenes=BDConexion::getInstancia()->query($examentabla);

       while($ver=mysqli_fetch_row($examenes)) {
        $datos=$ver[0]."||".
                $ver[1]."||".
                $ver[2]."||".
                $ver[3]."||".
                $ver[4]."||".
                $ver[5]."||".
                $ver[8]."||".
                $ver[9]."||";
            
         ?>
      <tr>
        <td><?php echo $ver [0] ?></td>
        <td><?php echo $ver [1] ?></td>
        <td><?php echo $ver [2] ?></td>
        <td><?php echo $ver [3] ?></td>
        <td><?php echo $ver [4] ?></td>
        <td><?php echo $ver [5] ?></td>
        <td><?php echo $ver [8] ?></td>
        <td><?php echo $ver [9] ?></td>

        


        <td>

          <button class="btn btn-outline-warning" class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modaledita" onclick=agregaform"(<<?php echo $datos; ?>)">
              <span class="oi oi-pencil"></span>
          </button>
        </td>
        <td>
          <button class="btn btn-outline-danger" class="glyphicon glyphicon-trash" onclick="PreguntarSiNO()">
             <span class="oi oi-trash"></span>
          </button>
        </td>
        <td>
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
  </div>
  </div>
