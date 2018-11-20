<?php
   require ('config.php');
   $conexion = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

   if ($mysqli->connect_errno) {
echo "error al conectar";
   }else{
echo "todo bien";
}

?>