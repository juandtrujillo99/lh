<?php
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/RepositorioAdmin.inc.php';
include_once 'app/ControlSesionAdmin.inc.php';
include_once 'app/config.inc.php';
?>


<?php
//barra de navegacion
//vista para pc
include_once 'seccion/divisa.inc.php';
?>
<div class="col-sm-12 hidden-xs barra-navegacion">
	<div class="col-sm-1"></div>
	<div class="col-sm-10" align="center">
		<div class="col-sm-1"></div>
		<div class="col-sm-2 logo waves-effect waves-light">
			<a href="<?php echo SERVIDOR;?>" title="<?php echo $nombreEmpresa;?>">
				<img src="<?php echo RUTA_IMG; ?>nosotros/logo-1.png" class="imagen">
			</a>
		</div>		
		<div class="col-sm-6 enlaces">
			<a href="<?php echo SERVIDOR;?>"><i class="fas fa-home"></i> Inicio</a>
			<a href="<?php echo RUTA_TIENDA;?>"><i class="fas fa-shopping-cart"></i> Tienda</a>
			<a href="<?php echo RUTA_CONTACTO;?>"><i class="fas fa-phone"></i> Contacto</a>
		</div>
		<div class="col-sm-3 busqueda">
			<form role="form" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA; ?>">
				<div class="col-sm-8 form-group waves-effect waves-light">
                	<input type="search" name="termino-buscar" class="form-control" placeholder="¿Qué buscas?">
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="buscar" class="icono-buscar waves-effect waves-light">
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </form>	
		</div>
	</div>
</div>
<?php
//vista para pc

//vista para moviles
//burger menu ?>
<div class="visible-xs col-xs-12 barra-navegacion-m" style="position:fixed;">
	<div class="col-xs-1"></div>
	<div class="col-xs-1 logo">
		<a href="<?php echo SERVIDOR;?>" title="<?php echo $nombreEmpresa;?>">
			<img src="<?php echo RUTA_IMG; ?>nosotros/icon.png" class="imagen">
		</a>
	</div>
	<div class="col-xs-7"></div>
	<div class="col-xs-3 barras">
		<div class="contenedor-menu">		
			<div class="menu-burger"></div>
		</div>
	</div>
</div>
<?php//burger menu 

?>
<div class="menu">
	<div class="col-xs-12">
		<div class="col-xs-3"></div>
		<div class="col-xs-6 logo-svg"></div>
	</div>
	<div class="busqueda">
		<form role="form" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA; ?>">                  
            <div class="col-xs-10 form-group">
                <input type="search" name="termino-buscar" class="form-control" placeholder="¿Qué buscas?">
            </div>
            <div class="col-xs-2">
                <button type="submit" name="buscar" class="icono-buscar">
                    <i class="material-icons">search</i>
                </button>
            </div>
        </form>	
	</div>
	<a class="waves-effect waves-light" href="<?php echo SERVIDOR;?>">
		<div>       
			<i class="fas fa-home"></i> Inicio
		</div>
	</a>
	<a class="waves-effect waves-light" href="<?php echo RUTA_TIENDA;?>">
		<div>
			<i class="fas fa-shopping-cart"></i> Tienda
		</div>
	</a>	
	<?php
	if (!ControlSesion::sesion_iniciada()) {		
		?>
	<a class="waves-effect waves-light" href="<?php echo RUTA_CONTACTO;?>">
		<div>
			<i class="fas fa-phone"></i> Contáctanos
		</div>
	</a>
	<a class="waves-effect waves-light" href="<?php echo RUTA_LOGIN;?>">
		<div>
			<i class="fas fa-user-circle"></i> Iniciar sesión
		</div>
	</a>
	<?php
	}else{
		if(ControlSesionAdmin::sesion_iniciada()) {
			?>
		<a class="waves-effect waves-light" href="<?php echo RUTA_PERFIL_ADMIN;?>">
			<div>
				<i class="fas fa-user-circle"></i> Administración
			</div>
		</a>
		<?php
		}else{
		?>
	<a class="waves-effect waves-light" href="<?php echo RUTA_PERFIL;?>">
		<div>
			<i class="fas fa-user-circle"></i> <?php echo $usuario -> obtener_nombre(); ?>
		</div>
	</a>
	<?php
	}
	}
	?>
	<a class="waves-effect waves-light" href="#">
		<div id="themeButton2">
			<i class="fas fa-sun"></i> Tema
		</div>
	</a>
	<div class="social-m" align="center">
		<p>SÍGUENOS</p>
			<a target="_blank" href="<?php echo $facebookEmpresa; ?>"><i class="fab fa-facebook"></i></a>

            <a target="_blank" href="<?php echo $instagramEmpresa; ?>"><i class="fab fa-instagram"></i></a>

            <a target="_blank" href="<?php echo $whatsappEmpresa; ?>"><i class="fab fa-whatsapp"></i></a>
        
	</div>
</div>
<?php
//moviles
?>