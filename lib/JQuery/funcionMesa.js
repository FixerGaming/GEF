function agregarExamen(carrera,asignatura,presidente,vocal,vocal1,suplente,llamado1,llamado2,hora){
    cadena=
        "carrera=" + carrera +
        "&asignatura="+ asignatura +
        "&presidente"+ presidente +
        "&vocal" + vocal +
        "&vocal1" + vocal1 +
        "&suplente" + suplente +
        "&llamado1" + llamado1 +
        "&llamado2"+ llamado2 +
        "&hora" + hora;
    $.ajax({
      type:"POST",
      url:"../app/examen.crear.php",
      data:cadena,
      success: function(r)
      {
        if(r==1)
      {
        $('#tabla').load('examentabla.php')
        alertify.success("Se agrego examen satisfactoriamente");
      }else {
        alertify.error("Fallo al insertar examen");
      }
 
      }
    });
 
 }