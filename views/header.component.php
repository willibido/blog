<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo LOCALPATH; ?>/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <title>BLOG</title>
</head>
<body>
<header>
		<div class="contenedor">
			<div class="logo izquierda">
				<p><a href="<?php echo LOCALPATH; ?>">BLOG</a></p>
			</div>

			<div class="derecha">
				<form action="<?php echo LOCALPATH;?>/buscar.php" method="get" name="busqueda" class="buscar">
					<input type="text" name="busqueda" placeholder="Buscar">
					<button type="submit" class="icono fa fa-search"></button>
				</form>
				
				<nav class="menu">
					<ul>
						<li>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href=""><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="#">Contacto<i class="icono fa fa-envelope"></i></a>
						</li>
						<li>
							<a href="<?php echo LOCALPATH ?>login.php">Login<i class="icono fa fa-user"></i></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
    </header>