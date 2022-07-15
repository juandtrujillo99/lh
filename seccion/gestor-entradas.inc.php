<div class="col-sm-12 col-xs-12">
	<br><br><br>
	<div class="col-sm-1 col-xs-1"></div>
	<div class="col-sm-10 col-xs-10">
		<div class="col-sm-12">
			<h2 class="col-sm-9">Stock</h2>
			<a href="<?php echo RUTA_NUEVA_ENTRADA; ?>" class="btn col-sm-3" role="button">Crear nueva entrada</a>
			<div class="col-sm-12"><hr></div>
		</div>
	</div>
</div>
<div class="col-sm-12 col-xs-12" align="center">
	<div class="col-sm-1 col-xs-1"></div>
	<div class="col-sm-10 col-xs-10">
		<?php 
			if (count($array_entradas) > 0) {
				?>
				<div class="col-sm-12 col-xs-12 inventario">
					<div class="col-sm-12 col-xs-12 cabecera">
						<div class="col-sm-2 hidden-xs">Fecha</div>
						<div class="col-sm-2 col-xs-2">Imagen</div>
						<div class="col-sm-3 col-xs-3">Nombre</div>
						<div class="col-sm-2 col-xs-1">Precio</div>
						<div class="col-sm-1 col-xs-1"></div>
						<div class="col-sm-1 col-xs-3"></div>
						<div class="col-sm-1 col-xs-1"></div>
					</div>
					<div class="col-sm-12 col-xs-12 ">
						<?php
							for ($i = 0; $i < count($array_entradas); $i++) {
								$entrada_actual = $array_entradas[$i][0];
								$comentarios_entrada_actual = $array_entradas[$i][1];
								?>
								<div class="col-sm-12 col-xs-12 item">
									<div class="col-sm-2 hidden-xs"><?php echo convertirFecha($entrada_actual -> obtener_fecha()); ?></div>
									<div class="col-sm-2 col-xs-2">
										<a href="<?php echo RUTA_IMG_OPTIMIZADA.$entrada_actual -> obtener_imagen(); ?>" target="_blank">
											<img src="<?php echo RUTA_IMG_OPTIMIZADA.$entrada_actual -> obtener_imagen(); ?>" class="imagen visible-xs">
											<img src="<?php echo RUTA_IMG_OPTIMIZADA.$entrada_actual -> obtener_imagen(); ?>" class="imagen-2 hidden-xs">
										</a>
									</div>
									<div class="col-sm-3 col-xs-3"><a href="<?php echo RUTA_ENTRADA . '/' . $entrada_actual -> obtener_url(); ?>" target="_blank"><?php echo $entrada_actual -> obtener_titulo(); ?></a></div>
									<div class="col-sm-2 col-xs-1" align="center"><?php echo number_format($entrada_actual -> obtener_precio()); ?></div>
									<div class="col-sm-1 col-xs-1"></div>
									<div class="col-sm-1 col-xs-3">
										<form method="post" action="<?php echo RUTA_EDITAR_ENTRADA; ?>">
											<input type="hidden" name="id_editar"
											 value="<?php echo $entrada_actual -> obtener_id(); ?>">
											<button type="submit" class="btn"
											 name="editar_entrada">Editar</button>
										</form>
									</div>
									<div class="col-sm-1 col-xs-1">
										<form method="post" action="<?php echo RUTA_BORRAR_ENTRADA; ?>">
											<input type="hidden" name="id_borrar" value="<?php echo $entrada_actual -> obtener_id(); ?>">
											<button type="submit" class="btn waves-effect waves-light" name="borrar_entrada"><i class="fas fa-trash-alt"></i></button>
										</form>
									</div>
								</div>
								<?php
							}
						?>
					</div>
				</div>
				<?php
			} else {
				?>
				<h3 class="text-center">Todavía no has escrito ninguna entrada</h3>
				<br>
				<br>
				<?php
			}
		?>
	</div>
</div>

