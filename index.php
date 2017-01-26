<?php
session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();

// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión.
session_destroy();
?>


<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/header.css"/>
	<link rel="stylesheet" href="css/body.css"/>
	<link rel='stylesheet' href="css/style1.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="blocksit.min.js"></script>
    <script>
$(document).ready(function() {
	//vendor script
	$('#header')
	.css({ 'top':-50 })
	.delay(1000)
	.animate({'top': 0}, 800);
	
	$('#footer')
	.css({ 'bottom':-15 })
	.delay(1000)
	.animate({'bottom': 0}, 800);
	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 5,
			offsetX: 8,
			offsetY: 8
		});
	});
	
	//window resize
	var currentWidth = 1100;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 880) {
			conWidth = 660;
			col = 3
		} else if(winWidth < 1100) {
			conWidth = 880;
			col = 4;
		} else {
			conWidth = 1100;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
});
</script>
<title>Inforyou</title>
</head>
<body data-lang="es">
    <header class="main-header clearfix">
      <div id="logo"></div> 
    </header>
    <div style="position:relative; top: 65px;">
        <div id="container">

            
            
 
                <div class="card js-masonry-item main-sidebar">
                    <a href="crear.html">
		              <div class="imgholder" style="position: relative; left: -17.4px; top: -17.3px; ">
			            <img style="width: 222px;" src="imagenes/nueva.jpg" />
		              </div>
		              <strong>Crear Usuario nuevo</strong>
		              <p></p>
                    </a>
		        </div> 


<?php
								
$directorio = opendir("carpetas"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
         //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
?>       
<div class="card js-masonry-item main-sidebar">
                    <a href="carpetas/<?php echo $archivo; ?>">
                              <div class="imgholder" style="position: relative; left: -17.4px; top: -17.3px; ">
                                    <img style="width: 222px;" src="imagenes/carpeta.png" />
                              </div>
                              <strong>Carpeta de <?php echo $archivo; ?></strong>
                              <p></p>
                    </a>
                        </div>

<?php	
    }
}

?>
           
  
             
        </div>
    </div>
</body>

</html>



	
	



