<?php
include_once '../modelo/BDConexion.Class.php';
$connect = mysqli_connect("localhost", "root", "", "bdusuarios");  


if(isset($_POST["query"]))
{
  $output ='';
  $query="SELECT nombre FROM profesor WHERE nombre LIKE '%".$_POST["query"]."%'";
  //$result = mysqli_query($connect, $query); 
  $result = BDConexion::getInstancia()->query($query);
  $output ='<ul class="list-group">';
  if($result->num_rows > 0)
  {
  	while($row = $result->fetch_array())
  	{
  		$output .= '<li class="list-group-item">'.$row["nombre"].'</li>';
  	}
  }
  else
  {
  	$output .= '<li class="list-group-item" >No se encontraron profesores</li>';
  }
  $output .= '</ul>';
  echo $output;
}

?>