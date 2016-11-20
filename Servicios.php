<?php
session_start();
require_once("clases/class.MasterPage.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Servicios</title>
	<meta name="viewport"  content="width=device-width,initial-scale=1"/>
	<link rel="stylesheet" href="css/estilos.css" />
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>
	<?php 
		MasterPage::drawHeader();
	?>
	<section id="contenedor">
		<article>
			<img src="img/slider-12.png" class="responsive" />
			<p><b>Contactanos a los telefonos:</b></p>
			<p>8-95-61-23  y 9-65-32-41</p>
		</article>
		<aside>
			<video id="video-acerca" controls preload>
    			<source src="videos/comparacion.mp4" type="video/mp4" />
        		<source src="videos/comparacion.webm" type="video/webm" />
        		<source src="videos/comparacion.ovg" type="video/ogg" />
    		</video>
		</aside>
			<div id="Servicios">
				<section id="h-servicios">
					<ul>
						<li><a onClick="mostrarServicio(1)" href="#">Centro de datos</a></li>
						<li><a onClick="mostrarServicio(2)" href="#">Procesamiento de Datos de datos</a></li>
						<li><a onClick="mostrarServicio(3)" href="#">Almacenamiento, Respaldos y <br> consolidación de la Información</a></li>
						<li><a onClick="mostrarServicio(4)" href="#">Administración de Redes y Seguridad Informatica</a></li>
					</ul>
				</section>
				<section id="sec-servicios">
               <div id="serv1">
                  <h3>Centro de Datos</h3>
                  Suministramos e Implementamos la infraestructura necesaria para soportar, administrar y operar sistemas de mision critica con rapidez y eficiencia para ayudar a nuestros clientes a ahorrar en costo y tiempo. Administramos y monitoreamos los componentes claves de su operaci&oacute;, incluyendo la red, firewalls, balanceadores de cargas, sistemas operativos, servidores web, aplicaciones criticas y bases de datos, es decir,  contamos con servicios administrados que ayudaran a convertir tu departamento de TI en un diferenciador de tu negocio:
                     <br />
                     Servicios en la nube<br />
                     Suministro y hospedaje de equipos
                     Acceso a Internet<br />
                     Monitoreo <br />
                     Administración de Comunicaciones <br />
                     Administración de Bases de Datos<br />
                     Administración de Servidores físicos y virtuales<br />
                     Administración de Almacenamiento<br />
                     Administración de Respaldos <br />
                     <img class="responsive" src="img/datos1.jpg" />
               </div>
               <div id="serv2">
                  <h3>PROCESAMIENTO DE DATOS</h3>
                  SELIEMOR tiene una posición privilegiada para ayudarte a consolidar tu centro de datos, y recortar así costos y mejorar la agilidad de negocio. Unimos un valor excelente en la virtualización de servidores, basada en VMware, Red Hat o Microsoft, con las capacidades de gestión física y virtual. SELIEMOR trabaja con un amplio abanico de fabricantes dedicados a la infraestructura de procesamiento y almace- namiento para lograr recortes impresionantes en los costos asociados con el centro de datos gracias a la combinación de la consolidación de servidores y de almacena- miento. En pocas palabras, nuestras soluciones se han creado para ayudarte a:
                     <br />
                     Minimizar los gastos de capital
                     <br />
                     Recortar los gastos operativos 
                     <br />
                     Aumentar el nivel de tus servicios
                     <br />
                     <img class="responsive" src="img/datos2.jpg" />
               </div>
               <div id="serv3">
                  <h3>Almacenamiento, Respaldos y Consolidación de la Información</h3>
                  Los sistemas actuales requieren soluciones de almacenamiento y respaldo de su información, que aseguren la disponibilidad de la misma en tiempo y seguridad. 
                  <br />
Dado lo anterior SELIEMOR ha desarrollado, una capacidad unica para asesorar adecuadamente a nuestros clientes considerando las muchas variables presentes al momento de proponer una solución. Las tecnologías de almacenamiento y respaldo, por su parte, han tenido una rapida evolucion, lo que hace muy dificil contar con los especialistas necesarios para entenderlas, implementarlas y soportarlas.
                  <br />
 En SELIEMOR contamos con la capacidad para diseñar, suministrar, instalar, administrar y soportar soluciones de SAN, iSCSI, DAS, NAS, FCoE en el ambiente   de almacenamiento y de librerías físicas o virtuales.
                  <br />
                  <img class="responsive" src="img/datos3.jpg" />
               </div>
               <div id="serv4">
                  <h3>Administración de Redes y Seguridad Informática</h3>
                  Lograr una mayor disponibilidad, mejorar el aprovechamiento y evitar la obsoles- cencia de redes, seguridad y comunicaciones es uno de los principales desafíos     que enfrentan las empresas en la actualidad, donde la conectividad y trabajo en redes es esencial para hacer una buena gestión operativa y de negocios. 
                  <br />
                  <img class="responsive" src="img/datos4.jpg" />
               </div>
            </section>
         </div>
   </section>
	<?php 
		MasterPage::drawFooter();
	?>
</body>
</html>