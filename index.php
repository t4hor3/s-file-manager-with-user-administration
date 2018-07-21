<!DOCTYPE html>
<?php
$version = "0.8";
?>
<html>
<head>
	<meta charset="UTF-8">
	<link href="img/favicon.png" rel="icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery.min.js"></script>
	<script src="js/blocksit.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
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
<title>QCloud - Cloud</title>
</head>
<body data-lang="es">
<div class="container">
    <h3>QCloud - Cloud</h3>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href=".">Login users</a></li>
          <li><a href="create.html">Create user</a></li>
          <li><a href="../">Back</a></li>
        </ul>
      </div>
    </nav>
		<a href="create.html">
			<button type="button" class="btn btn-primary btn-block">Add new user</button>
		</a>
		<br>
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
								<a href="folders/<?php echo $file; ?>/files">
									<button type="button" class="btn btn-default btn-block">Files of <?php echo $file; ?></button>
								</a>
							<?php
							if ($ver !== $version){
								shell_exec("cp file.txt folders/".$file."/files/index.php");
								shell_exec("cp unzip.txt folders/".$file."/unzip.php");
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
	 
	</body>
</html>
