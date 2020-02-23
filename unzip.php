<?php
function extension($archivo){
	$partes = explode(".", $archivo);
	$extension = end($partes);
	return $extension;
}

function listar_directorios_ruta($ruta){
	if (is_dir($ruta)){
		if ($dh = opendir($ruta)){
			while (($file = readdir($dh)) !== false){
				if ($file!="." && $file!=".."){
					if (extension($file)=="zip"){
						echo "<br>Zip detected<br>";
						echo $file;
						$zip = new ZipArchive;
						$zip->open("$ruta/$file");
						$zip->extractTo("$ruta");
						$zip->close();
						shell_exec("rm $ruta/$file");
					}
					listar_directorios_ruta($ruta . "/" . $file . DIRECTORY_SEPARATOR);
				}
			}
			closedir($dh);
		}
	}
}

listar_directorios_ruta("files");
?>
<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=files">
