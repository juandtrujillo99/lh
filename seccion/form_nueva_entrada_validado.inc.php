<h3><b>Escribe algo...</b></h3>
<h6><font color="grey">* Datos obligatorios</font></h6>

<ul class="collapsible">
    <li>
		<div class="collapsible-header"><i class="material-icons">whatshot</i>Imagen</div>
		<div class="collapsible-body">
			<span>
				<div class="form-group" id="upload_form">
					<h4>Sube la foto de portada * <font color="grey"><i title="Todas las entradas deben tener una imagen." class="fas fa-question-circle"></i></font></h4>
					<h6><font color="grey">* Selecciona una imagen y luego subela o escoge una de la Galeria.</font>
					</h6>
					<br>
						<label for="file1" id="label-archivo" style="width: 40%;display: inline-block;">Seleccionar imagen</label>
						<input type="file" name="file1" id="file1" class="boton_subir">
						<input type="button" value="Subir imagen" name="guardar_imagen" id="guardar_imagen" onclick="uploadFile()" style="width: 40%;display: inline-block;">
						<a style="display: inline-block;" id="anchor" class="icono" href="#" ><i class="material-icons">image</i></a>
						<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>
						<h4 id="status"></h4>
						<h6><font color="grey">* Selecciona la imagen de nuevo</h6>
						<input type="file" class="form-control" id="status" name="imagen" placeholder="imagen.jpg"
						<?php $validador -> mostrar_imagen(); ?> >
						<?php $validador -> mostrar_error_imagen(); ?>
						<h6><font color="grey">* Selecciona la imagen 2 de nuevo</h6>
						<input type="file" class="form-control" id="status" name="imagen2" placeholder="imagen2.jpg"
						<?php $validador -> mostrar_imagen2(); ?> >
						<?php $validador -> mostrar_error_imagen2(); ?>		
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
				<div class="form-group">
					<label for="titulo">Título * <font color="grey"><i title="Usa palabras clave para que encuentren fácilmente la entrada." class="fas fa-question-circle"></i></font></label>
					<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ponle un título a esta entrada"
						<?php $validador -> mostrar_titulo(); ?> >
						<?php $validador -> mostrar_error_titulo(); ?>
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
					<label for="url">URL * <font color="grey"><i title="Crea el link de tu entrada." class="fas fa-question-circle"></i></font></label>
					<input type="text" class="form-control" id="url" name="url" title="La ñ, las tildes y demás caracteres especiales no están permitidos." placeholder="No uses espacios ni caracteres especiales"
						<?php $validador -> mostrar_url(); ?> >
						<?php $validador -> mostrar_error_url(); ?>
					<h6><font color="grey">* La URL que escojas se mostrará en la barra superior del navegador.
						<br>
						Ej: <?php echo $urlEmpresa;?>/entrada/<font color="#00baaf">mi-nueva-entrada</font></font>
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
					<label for="precio">Precio * </label>
					<input type="number" class="form-control" id="precio" name="precio" placeholder="Ponle un Precio a esta entrada"
						<?php $validador -> mostrar_precio(); ?> >
						<?php $validador -> mostrar_error_precio(); ?>
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
					<label for="contenido">Contenido * <font color="grey"><i title="Obligatorio." class="fas fa-question-circle"></i></font></label>
					<textarea class="form-control" rows="10" id="contenido" name="texto" placeholder="Escribe aquí tu artículo."
						><?php $validador -> mostrar_texto(); ?></textarea>
					<?php $validador -> mostrar_error_texto(); ?>
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
					<label for="video">Inserte el código <font color="grey"><i title="Se mostrará como un iframe." class="fas fa-question-circle"></i></font></label>
					<input type="text" class="form-control" id="url" name="video"
						<?php $validador -> mostrar_video(); ?> >
						<?php $validador -> mostrar_error_video(); ?>
					<h6>
						<font color="grey">* Aquí se inserta la imagen de instagram.</font>
					</h6>
				</div>
			</span>
		</div>
    </li>
</ul>