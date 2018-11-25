function validar(id)
{
var elemento =document.getElementById(id);
  if(elemento.checkValidity())
  {
    elemento.style.borderColor="green";
  }
  else {
    elemento.style.borderColor="red";
  }

}
