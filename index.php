<!doctype html>
<?php
$version = "0.8";
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/header.css"/>
	<link rel="stylesheet" href="css/body.css"/>
	<link rel='stylesheet' href="css/style1.css"/>
    <script src="js/jquery.min.js"></script>
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
<title>ASIX</title>
</head>
<body data-lang="es">
    <header class="main-header clearfix">
      <div id="logo"></div> 
    </header>
    <div style="position:relative; top: 65px;">
        <div id="container">

            
            
 
                <div class="card js-masonry-item main-sidebar">
                    <a href="create.html">
		              <div class="imgholder" style="position: relative; left: -17.4px; top: -17.3px; ">
			            <img style="width: 222px;" src="imagenes/nueva.jpg" />
		              </div>
		              <strong>Crear Usuario nuevo</strong>
		              <p></p>
                    </a>
		        </div> 


<?php
$fp = fopen("folders/version", "r");
$ver = fgets($fp);
fclose($fp);


							
$dir = opendir("folders"); 
while ($file = readdir($dir)){
    if (is_dir($file)){}else{
	if ($file !== "version"){
	if ($file !== "index.php"){
?>       
<div class="card js-masonry-item main-sidebar">
     <a href="folders/<?php echo $file; ?>/files">
       <div class="imgholder" style="position: relative; left: -17.4px; top: -17.3px; ">
          <img style="width: 222px;" src="imagenes/carpeta.png" />
       </div>
       <strong>Carpeta de <?php echo $file; ?></strong>
       <p></p>
     </a>
</div>

<?php

if ($ver !== $version){
	shell_exec("cp file.txt folders/".$file."/files/index.php");
	shell_exec("cp unzip.txt folders/".$usuario."/unzip.php");	
	
}}}



}}

if ($ver !== $version){
	echo "Script UPDATED";
	$fp = fopen("folders/version", "w+");
	fputs($fp, $version);
	fclose($fp);
	
}

?>        
        </div>
    </div>
    <div style="margin: 10px;"><a style="text-decoration: none; color: gray;" href="https://github.com/t4hor3">simple php filemanager with users by t4hor3 ®</a> </div>
</body>

</html>



	
	



