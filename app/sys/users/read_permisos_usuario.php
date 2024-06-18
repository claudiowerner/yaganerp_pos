<?php
/*esta clase se usa para obtener los permisos y que según los resultados se chequéen los checkbox
* en la sección de usuarios del administrador
* además, esta clase se usa para cargar los permisos de los usuarios a la hora de vender, por lo que esta clase
* si o si debe recibir el ID del usuario para verificar los permisos*/

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;
  $id_usu = $_POST["id_usu"];

  require_once '../conexion.php';

    //query
  $sql = "SELECT permisos FROM usuarios WHERE id_cl = $id_cl AND id = $id_usu;";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0)
  {
    $json = array();
    while ($row = $resultado->fetch_array())
    {
      echo "Permisos ".$row["permisos"];
    };
  }
  else
  {
    echo die("Error al obtener permisos: ". mysqli_error($conexion));
  }
}
else
{
  header('Location: ../');
}
?>
