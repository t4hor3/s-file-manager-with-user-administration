
<?php
$usuario = htmlentities($_POST["usern"]);
$nombre_fichero = 'folders/' . $usuario . '/files/index.php';
$p = htmlentities($_POST["pass"]);
$pass = md5($p);
$usuario = str_replace(" ", "_", $usuario);
$usuario = str_replace("/", "", $usuario);
$usuario = str_replace("*", "", $usuario);
$usuario = str_replace("?", "", $usuario);
$usuario = str_replace(" ", "", $usuario);
$usuario = str_replace("#", "", $usuario);
$usuario = str_replace("!", "", $usuario);
$usuario = str_replace("+", "", $usuario);
$usuario = str_replace("&", "", $usuario);
$usuario = str_replace("=", "", $usuario);
$usuario = str_replace("¡", "", $usuario);
$usuario = str_replace(")", "", $usuario);
$usuario = str_replace("(", "", $usuario);
if (file_exists($nombre_fichero)) {
  echo "User already exists";
  exit();
}else{
  echo "";
}

shell_exec("mkdir folders/".$usuario);
shell_exec("mkdir folders/".$usuario . "/files");
shell_exec("cp file.txt folders/".$usuario."/files/index.php");
shell_exec("cp unzip.txt folders/".$usuario."/unzip.php");
$contenido = '$PASSWORD="' . $pass . '";';
$file = fopen("folders/".$usuario."/pass.php", "w");
fwrite($file, "<?php " . $contenido . " ?>" . PHP_EOL);
fclose($file);
?>
<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=index.php">
  User Created
