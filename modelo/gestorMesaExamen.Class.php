<?php
include_once 'Docente.Class.php';
include_once 'BDConexion.Class.php';
$Profesor = new Docente();

class gestorMesaExamen {
    
    function __construct() {
      
    }

    function retornarDocente ($id){
        $Docente="SELECT * FROM PROFESOR D WHERE D.'id' = $id";
        $Docentes= BDConexion::getInstancia()->query($Docente);
        while ($docen=$this->mysqli_fetch_assoc($Docentes)){
            $Profesor->setId($docen['id']);
            $Profesor->setDni($docen['dni']);
            $Profesor->setNombre($docen['nombre']);
            $Profesor->setApellido($docen['apellido']);
            $Profesor->setEmail($docen['email']);
            $Profesor->setCargo($docen['cargo']);
            $Profesor->setCategoria($docen['categoria']);
        }
        return $Profesor;
    }
}
