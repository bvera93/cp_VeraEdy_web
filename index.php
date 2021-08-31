<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Samu wings tu mejor elección a la hora de disfrutar entre amigos.">
		<meta name="keywords" content="alitas, wings, fastFood, friends,">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>
			Inicio - Samu wings
		</title>
		<link rel="shortcut icon" href="img/favicon.png">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://kit.fontawesome.com/37ef4fca07.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	</head>
	<body>
		
		<header>
			<div class="container">
				<a href="index.html">
					<img src="img/logos/logo_samu.png" class="logo">
				</a>
				<nav> 
					<a href="#inicio">Inicio</a>
					<a href="#nosotros">Nosotros</a>
					<a href="#servicios">Servicios</a>
					<a href="#galeria">Galería</a>
					<a href="#contactenos">Contáctenos</a>
					<a href="https://samusystems.com/app/">Iniciar Sesión</a>
				</nav>
				<a href="#" class="hamb"><i class="fas fa-bars"></i></a>
			</div>
		</header>
		<main>
			<section id="inicio">
				<img src="img/banners/bannerprincipal.jpg">
				<div class="bloque-inicio">
					<h1>Bienvenidos a Samu Wings</h1>
					<p>Fast Food | Drinks | Friends| Burguers | Wings. 
					</p>
					<a href="views/menu.php" class="boton boton-rojo">Ver Menú</a>
				</div>
			</section>


			<section id="nosotros" class="seccion">
				<div class="container">
					<p>SOMOS UNA CADENA ECUATORIANA JOVEN Y MODERNA ESPECIALIZADOS EN ALITAS, MASIFICAMOS LAS ALITAS PARA LLEVAR A NUESTROS CONSUMIDORES PRODUCTOS DE CALIDAD. CREAMOS PRODUCTOS INCREIBLES A PRECIOS ACCESIBLES. </p> 
				</div>
			</section>


			<section id="servicios"  class="seccion">
				<div class="container">
					<div class="row">
						<div class="columna columna-33 columna-mobile-100">
							<div class="bloque-servicio">
								<div class="bloque-img-servicio cuadrado-perfecto">
									<img src="img/servicios/alitas.jpeg">
								</div>
								<div class="bloque-contenido-servicio">
									<h3>Alitas Crujientes</h3>
									<p>Nuestro producto elite son las Alitas y nuestra especialidad las Alitas. Además contamos con un menú completo de calidad internacional.</p>
									<a href="#" class="boton boton-blanco">Ver más</a>
								</div>
							</div>
						</div>
						<div class="columna columna-33 columna-mobile-100">
							<div class="bloque-servicio">
								<div class="bloque-img-servicio cuadrado-perfecto">
									<img src="img/servicios/hamburguesa.jpeg">
								</div>
								<div class="bloque-contenido-servicio">
									<h3>Hamburguesas</h3>
									<p>Tenemos para tí las mejores Hamburguesas, jugosas con ingredientes frescos y seleccionados haran de tu hamburguesa una experciencia innolvidable.</p>
									<a href="#" class="boton boton-blanco">Ver más</a>
								</div>
							</div>
						</div>
						<div class="columna columna-33 columna-mobile-100">
							<div class="bloque-servicio">
								<div class="bloque-img-servicio cuadrado-perfecto">
									<img src="img/servicios/mojitos.jpeg">
								</div>
								<div class="bloque-contenido-servicio">
									<h3>Bebidas</h3>
									<p>Acompaña tus pedidos con bebidas refrescantes o nuestros deliciosos cocteles, sabores incomparables que te haran pedir, otro más!.</p>
									<a href="#" class="boton boton-blanco">Ver más</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="galeria">
				<div class="container-fluid">
					<div class="row">
						<div class=" columna-33 columna-mobile-50">
							<div class="cuadrado-perfecto">
								<img src="img/servicios/alitas.jpeg">
								<h4>ALITAS</h4>
							</div>
						</div>
						<div class=" columna-33   columna-mobile-50">
							<div class="cuadrado-perfecto">
								<img src="img/servicios/mojitos.jpeg">
								<h4>DRINKS</h4>
							</div>	
						</div>
						<div class=" columna-33  columna-mobile-50">
							<div class="cuadrado-perfecto">
								<img src="img/servicios/hamburguesa.jpeg">
								<h4>HAMBURGUESAS</h4>
							</div>		
						</div>
						<div class=" columna-33  columna-mobile-50">
							<div class="cuadrado-perfecto">
								<img src="img/servicios/salchipapa.jpeg">
								<h4>SALCHIPAPAS</h4>
							</div>	
						</div>
						<div class=" columna-33  columna-mobile-50">
							<div class="cuadrado-perfecto">
								<img src="img/servicios/nachos.jpeg">
								<h4>NACHOS</h4>
							</div>	
						</div>
						<div class=" columna-33  columna-mobile-50">
							<div class="cuadrado-perfecto">
								<img src="img/servicios/nachos2.jpeg">
								<h4>MIX SNACKS</h4>
							</div>	
						</div>
					</div>
				</div>
			</section>
			<section id="contactenos" class="seccion">
				<iframe width="520" height="400" frameborder="0"  src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20Quito,Guapulo+(ecuador)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
				<div class="container-fluid">
					<div class="row">
						<div class="columna columna-41 columna-mobile-100 empujar-58 empujar-mobile-0 sinpadding-mobile">
							<form action="index.php" method="post">
								<div class="form-block">
									<input type="text" name="nombre" class="form-control" placeholder="Nombre">
								</div>
								<div class="form-block">
									<input type="email" name="email" class="form-control"  placeholder="Email">
								</div>
								<div class="form-block">
									<textarea name="mensaje"  placeholder="Mensaje"></textarea>
								</div>
								<div class="form-block bloque-ultimo">
									<input type="submit" class="boton boton-negro" value="Enviar">
								</div>
								<?php

									if($_SERVER["REQUEST_METHOD"] == "POST")
									{
										$nombre = $_POST["nombre"] ;
										$email = $_POST["email"] ;
										$mensaje = $_POST["mensaje"] ;

										if(isset($nombre))
										{
											if(isset($email))
											{
												if(isset($mensaje))
												{
													$para = "bryanvera9393@gmail.com"; //colocar aqui el correo a donde quieres que llegue
													$asunto = "Esto es una prueba";
													$cuerpo = $nombre."\n".$email."\n".$mensaje;
													$adicional = "From: bryanvera9393@gmail.com";

													mail($para,$asunto,$cuerpo,$adicional);
												?>
													<p>Envio exitoso</p>
												<?php
												}
											}
										}
									}
								?>
							</form>

						</div>
					</div>
				</div>

			</section>
		</main>
		<footer>
			<div class="container">
				<div class="row">
					<div class="columna columna-25 columna-mobile-100">
						<img src="img/logos/logo-samu-wings.png" class="logo-footer">
						<p>
							Ahora nuestras alitas traen nuevos sabores, solicitalas en tu pedido sin ningun costo.
						</p>
					</div>
					<div class="columna columna-25 columna-mobile-100">
						<h3>
							Temas relacionados
						</h3>
						<ul>
							<li><a href="#">Alitas</a></li>
							<li><a href="#">Hamburguesas</a></li>
							<li><a href="#">Costillas BBQ</a></li>
						</ul>
					</div>
					<div class="columna columna-25 columna-mobile-100">
						<h3>
							Datos de contcto
						</h3>
						<ul>
							<li>ventas@samuwings.com</li>
							<li>+593 983 180 524</li>
							<li>Av. La Tolita y psje Ninahualpa s/n - Guápulo <br><br>Quito - Ecuador</li>
						</ul>
					</div>
					<div class="columna columna-25 columna-mobile-100">
						<h3>
							Redes Sociales
						</h3>
						<ul class="redes">
							<li>
								<a href="#">
									<i class="fab fa-facebook-square"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-tiktok"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-youtube"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-instagram-square"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>



			<div class="barra-footer">
				&copy; Derechos Reservados - 2021
			</div>
		</footer>
		<script src="js/jquery.js"></script>
		<script src="js/funciones.js"></script>

		<a href="https://wa.me/593983180524?text=Hola!%20Quisiera%20realizar%20un%20pedido" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
	</body>
</html>