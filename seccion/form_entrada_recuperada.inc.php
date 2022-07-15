<a style="text-decoration: none;color: #000;" href="<?php echo RUTA_ENTRADA ."/". $entrada_recuperada -> obtener_url(); ?>" target="_blank">
	<h3 class="text-negrita"><?php echo $entrada_recuperada -> obtener_titulo(); ?></h3>
</a>
<br>
<ul class="collapsible">
	<li>
		<div class="collapsible-header"><i class="material-icons">whatshot</i>Imagen</div>
		<div class="collapsible-body">
			<span>
				<div class="form-group" id="upload_form">
					<h4>Vas a cambiar la foto de portada?</h4>
					<h6><font color="grey">* Selecciona una imagen y luego subela.</font>
					</h6>
					<br>
						<label for="file1" id="label-archivo" class="btn btn-success">Seleccionar imagen</label>
						<input type="file" name="file1" id="file1" class="boton_subir">
						<input type="button" value="Subir imagen" name="guardar_imagen" class="btn btn-primary" id="guardar_imagen" onclick="uploadFile()">
						<a style="display: inline-block;" id="anchor" class="icono" href="#" ><i class="material-icons">image</i></a>
						<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>
						<h4 id="status"></h4>

						<div class="file-field input-field">
					    	<div class="btn">
					    		<span>Portada actual</span>
					    		<input type="file" multiple>
					    	</div>
					   		<div class="file-path-wrapper">
					    		<input class="file-path validate" id="status" type="text" name="imagen" placeholder="Pega el nombre de la imagen aquí." value="<?php echo $entrada_recuperada -> obtener_imagen(); ?>">
					    		<input type="hidden" id="imagen-original" name="imagen-original" value="<?php echo $entrada_recuperada -> obtener_imagen(); ?>">
					    		<h6><font color="grey">* Si este espacio está vacio, selecciona de nuevo la imagen que quieres publicar</h6>
					   		</div>
					    </div>

					    <input type="text" class="form-control" id="status" name="imagen2" placeholder="imagen2.jpg" title="Pega el nombre de la imagen aquí." value="<?php echo $entrada_recuperada -> obtener_imagen2(); ?>">
						<input type="hidden" id="imagen2-original" name="imagen2-original" value="<?php echo $entrada_recuperada -> obtener_imagen2(); ?>">
						<h6><font color="grey">* Deja este espacio vacio</h6>
				</div>
			</span>
		</div>
	</li>	
</ul>
<ul class="collapsible">
	<li>
		<div class="collapsible-header"><i class="material-icons">whatshot</i>Nombre</div>
		<div class="collapsible-body">
			<span>
				<input type="hidden" id="id-entrada" name="id-entrada" value="<?php echo $id_entrada; ?>">
				<div class="form-group">
					<label for="titulo">Título</label>
					<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ponle un título a esta entrada" value="<?php echo $entrada_recuperada -> obtener_titulo(); ?>">
					<input type="hidden" id="titulo-original" name="titulo-original" value="<?php echo $entrada_recuperada -> obtener_titulo(); ?>">
				</div>
			</span>
		</div>
	</li>
</ul>

<ul class="collapsible">
	<li>
		<div class="collapsible-header"><i class="material-icons">whatshot</i>URL</div>
		<div class="collapsible-body">
			<span>
				<div class="form-group">
					<label for="url">URL</label>
					<input type="text" class="form-control" id="url" name="url" placeholder="Sin espacios" value="<?php echo $entrada_recuperada -> obtener_url(); ?>">
					<input type="hidden" id="url-original" name="url-original" value="<?php echo $entrada_recuperada -> obtener_url(); ?>">
					<h6><font color="grey">*La URL que escojas se mostrará en la barra superior del navegador
						<br>
						Ej: <?php echo $urlEmpresa; ?>/entrada/<font color="#00baaf">mi-nueva-entrada</font></font>
					</h6>
				</div>
			</span>
		</div>
	</li>
</ul>

<ul class="collapsible">
	<li>
		<div class="collapsible-header"><i class="material-icons">whatshot</i>Precio</div>
		<div class="collapsible-body">
			<span>
				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="number" class="form-control" id="precio" name="precio" placeholder="Ponle un precio a esta entrada" value="<?php echo $entrada_recuperada -> obtener_precio(); ?>">
					<input type="hidden" id="precio-original" name="precio-original" value="<?php echo $entrada_recuperada -> obtener_precio(); ?>">
				</div>
			</span>
		</div>
	</li>
</ul>
<ul class="collapsible">
	<li>
		<div class="collapsible-header"><i class="material-icons">whatshot</i>Contenido</div>
		<div class="collapsible-body">
			<span>
				<div class="form-group">
					<label for="contenido">Contenido</label>
					<textarea class="form-control" rows="10" id="texto" name="texto" placeholder="Escribe aquí tu artículo."><?php echo $entrada_recuperada -> obtener_texto(); ?></textarea>
					<input type="hidden" id="texto-original" name="texto-original" value="<?php echo $entrada_recuperada -> obtener_texto(); ?>">
				</div>
			</span>
		</div>
	</li>
</ul>


<ul class="collapsible">
	<li>
		<div class="collapsible-header"><i class="material-icons">whatshot</i>Imagen de instagram</div>
		<div class="collapsible-body">
			<span>
				<div class="form-group" title="Opcional">
					<label for="video">Insertar código</label>
					<input type="text" class="form-control" id="url" name="video" placeholder="Se mostrará como un iframe." value="<?php echo $entrada_recuperada -> obtener_video(); ?>">
					<input type="hidden" id="video-original" name="video-original" value="<?php echo $entrada_recuperada -> obtener_video(); ?>">
					<h6>
						<font color="grey">* Aqui se inserta la imagen de instagram.</font>
					</h6>
				</div>
			</span>
		</div>
	</li>
</ul>
