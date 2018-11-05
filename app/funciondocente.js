function agregardocente(nombre,apellido,dni,email,cargo,dedicacion,categoria,departamento){

   cadena="dni="+dni+"&nombre="+nombre+"&apellido="+apellido+"&email="+email+"&cargo="+cargo+"&dedicacion="+ dedicacion+"&categoria="+categoria+"&departamento="+departamento;
   $.ajax({
     type:"POST",
     url:"docente.crear.php",
     data:cadena,
     dataType: 'json',
     success: function(r)
     {
       if(r==1)
     {
       alertify.success("Se agrego docente satisfactoriamente");
     }else {
       alertify.error("Fallo al insertar docente");
     }

     }
   });

}
