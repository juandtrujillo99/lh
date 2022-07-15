<?php
if (ControlSesion::sesion_iniciada()) {//si el usuario inicia sesion pasa esto

	Conexion :: abrir_conexion();
	$id = $_SESSION['id_usuario'];
	$usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);

	if(!ControlSesionAdmin::sesion_iniciada()) {//si la sesion del admin se ha iniciado no pasa nada
		Conexion :: abrir_conexion();
		$id = $_SESSION['id_admin'];
		$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
	}
	else {//si la sesion del admin fue iniciada se abre conexion
			Conexion :: abrir_conexion();
			$id = $_SESSION['id_admin'];
			$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
	}
	?>
	
	<div class="col-sm-12 hidden-xs" id="divisa">
		<div class="col-sm-3">
			<div class="col-sm-1"></div>
			<div class="col-sm-1 icon">
				<img src="<?php echo RUTA_IMG; ?>nosotros/icon.png" loading="lazy" class="imagen">
			</div>
			<div class="col-sm-10 lema">			
				<p itemprop="slogan">Joyas para piercing, pendientes y más</p>
			</div>
		</div>
		<div class="col-sm-6"></div>
		<div class="col-sm-3" id="pais" align="center">
			<?php
			if(ControlSesionAdmin::sesion_iniciada()) {
			?>
			<a class="col-sm-6 waves-effect waves-light"href="<?php echo RUTA_PERFIL_ADMIN; ?>" title="<?php echo $admin -> obtener_nombre(); ?>">
				<i class="fas fa-user-circle"></i> Administrador
			</a>
			<?php
			}else{
			?>
			<a class="col-sm-6 waves-effect waves-light"href="<?php echo RUTA_PERFIL; ?>" title="<?php echo $usuario -> obtener_nombre(); ?>">
				<i class="fas fa-user-circle"></i> <?php echo $usuario -> obtener_nombre(); ?>
			</a>
			<?php
			}
			?>
			<p class="col-sm-3" title="Colombia"><i class="fas fa-dollar-sign"></i> COP</p>
			<p class="col-sm-3 waves-effect waves-light" title="Cambiar tema" id="themeButton"><i class="fas fa-sun"></i> Tema</p>		
		</div>
	</div>
<?php
}
else{//si el usuario no inicia sesion pasa esto
    Conexion :: abrir_conexion();
	?>
	<div class="col-sm-12 hidden-xs" id="divisa">
		<div class="col-sm-3">
			<div class="col-sm-1"></div>
			<div class="col-sm-1 icon">
				<img src="<?php echo RUTA_IMG; ?>nosotros/icon.png" loading="lazy" class="imagen">
			</div>
			<div class="col-sm-10 lema">			
				<p itemprop="slogan">Joyas para piercing, pendientes y más</p>
			</div>
		</div>
		<div class="col-sm-6"></div>
		<div class="col-sm-3" id="pais" align="center">
			<a class="col-sm-6 waves-effect waves-light" href="<?php echo RUTA_LOGIN; ?>"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
			<p class="col-sm-3" title="Colombia"><i class="fas fa-dollar-sign"></i> COP</p>
			<p class="col-sm-3 waves-effect waves-light" title="Cambiar tema" id="themeButton"><i class="fas fa-sun"></i> Tema</p>		
		</div>
	</div>
<?php
}
?>





