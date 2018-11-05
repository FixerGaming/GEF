function agregardocente(nombre,apellido,dni,email,cargo,dedicacion,categoria,departamento){

   cadena='dni=' + dni +
      '&apellido='+ apellido +
       '&nombre'+ nombre +
       '&email' + email +
        '&cargo' + cargo +
        '&dedicacion' + dedicacion +
        '&categoria' + categoria +
        '&departamento'+ departamento;
   $.ajax({
     type:"POST",
     url:"../app/docente.crear.php",
     data:cadena,
     success: function(r)
     {
       if(r==1)
     {
       $('#tabla').load('docentetabla.php')
       alertify.success("Se agrego docente satisfactoriamente");
     }else {
       alertify.error("Fallo al insertar docente");
     }

     }
   });

}

function agregaform(datos){

  d=datos.split("||");

  $('idpersona').val(d[0]);
  $('Dniu').val(d[1]);
  $('Apellidou').val(d[2]);
  $('Nombreu').val(d[3]);
  $('Emailu').val(d[4]);
  $('Categoriau').val(d[5]);


}
function actualizardatos()
{

  id$('idpersona').val();
  dni$('Dniu').val();
  apellido$('Apellidou').val();
  nombre$('Nombreu').val();
  email$('Emailu').val();
  categoria$('Categoriau').val();

  cadena= "id="+ id + "&nombre="+ nombre + "&apellido=" + apellido + "&dni="+ dni + "&email="+ email + "&categoria"+ categoria ;

  $.ajax({
    type:"POST",
    url:"../app/docenteactualizar.php",
    data:cadena,
    success: function(r)
    {
      if(r==1)
    {
      $('#tabla').load('docentetabla.php')
      alertify.success("Se actualizo docente satisfactoriamente");
    }else {
      alertify.error("Fallo al actualizar docente");
    }

    }
  });

  function PreguntarSiNO()
  {
alertify.confirm('Eliminar Docente', 'Esta seguro de eliminar este docente ?',
                  function(){ alertify.success('Ok') }
                , function(){ alertify.error('Se cancelo')});


  }


}
