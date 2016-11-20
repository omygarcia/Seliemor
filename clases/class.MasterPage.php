<?php
class MasterPage
{
	public static function drawHeader()
	{
		if(!isset($_SESSION['usuario']))
		{
			echo'<header>
				<img class="logo" src="img/logo-seliemor.jpg" style="padding:0.25em;" width="120px" />
				<nav id="btn_responsive">
					<img src="img/btn-responsive.jpg" onClick="ocultarNav()" />
				</nav>
				<nav id="nav_menu">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="acerca.php">Acerca</a></li>
						<li><a href="Productos.php">Productos</a></li>
						<li><a href="Servicios.php">Servicios</a></li>
						<li><a href="Contacto.php">Contacto</a></li>
					</ul>
				</nav>
			</header>';
		}
		else if($_SESSION['nivel'] < 3)
		{
			echo'<header>
				<img class="logo" src="img/logo-seliemor.jpg" style="padding:0.25em;" width="120px" />
				<nav id="btn_responsive">
					<img src="img/btn-responsive.jpg" onClick="ocultarNav()" />
				</nav>
				<nav id="nav_menu">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="acerca.php">Acerca</a></li>
						<li><a href="Productos.php">Productos</a></li>
						<li><a href="Servicios.php">Servicios</a></li>
						<li><a href="Contacto.php">Contacto</a></li>
						<li><a href="#">Bienvenido(a): '.$_SESSION['usuario'].' <img src="img/user-1.png" /></a></li>
						<li><a href="php/cerrar_session.php">Cerrar Session</a></li>
					</ul>
				</nav>
			</header>';
		}
		else
		{
			echo'<header>
				<img class="logo" src="img/logo-seliemor.jpg" style="padding:0.25em;" width="120px" />
				<nav id="btn_responsive">
					<img src="img/btn-responsive.jpg" onClick="ocultarNav()" />
				</nav>
				<nav id="nav_menu">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="acerca.php">Acerca</a></li>
						<li><a href="Productos.php">Productos</a></li>
						<li><a href="Servicios.php">Servicios</a></li>
						<li><a href="Contacto.php">Contacto</a></li>
						<li><a href="gestion.php">Gestion</a></li>
						<li><a href="generarFactura.php">generar Facturas</a></li>
						<li><a href="pedidos.php">Pedidos</a></li>
						<li><a href="#">Bienvenido(a): '.$_SESSION['usuario'].' <img src="img/user-1.png" /></a></li>
						<li><a href="php/cerrar_session.php">Cerrar Session</a></li>
					</ul>
				</nav>
			</header>';
		}
	}

	public static function drawFooter()
	{
		echo '<footer>
			<center>Todos los derechos reservados</center>
		</footer>';
	}
}
?>