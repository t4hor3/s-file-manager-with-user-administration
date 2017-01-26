
<?php
$usuario = htmlentities($_POST['usuario']);
$nombre_fichero = 'carpetas/' . $usuario . '/index.php';

if (file_exists($nombre_fichero)) {
    echo "User already exists";
	exit();
} else {
    echo "";
}	
	
shell_exec("mkdir carpetas/".$usuario);
shell_exec("cp file.txt carpetas/".$usuario."/index.php");	
$contenido = '$PASSWORD="' . htmlentities($_POST["pass"]) . '";'; $file = fopen("carpetas/".$usuario."/pass.php", "w"); fwrite($file, "<?php " . $contenido . " ?>" . PHP_EOL); fclose($file); ?>
<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=index.php">
User Created
