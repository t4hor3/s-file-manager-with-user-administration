
<?php
$usuario = htmlentities($_POST["usern"]);
$nombre_fichero = 'folders/' . $usuario . '/index.php';
$p = htmlentities($_POST["pass"]);
$pass = md5($p);

if (file_exists($nombre_fichero)) {
    echo "User already exists";
	exit();
}else{
    echo "";
}	
	
shell_exec("mkdir folders/".$usuario);
shell_exec("cp file.txt folders/".$usuario."/index.php");	
$contenido = '$PASSWORD="' . $pass . '";'; 
$file = fopen("folders/".$usuario."/pass.php", "w"); 
fwrite($file, "<?php " . $contenido . " ?>" . PHP_EOL); 
fclose($file); 
?>
<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=index.php">
User Created
