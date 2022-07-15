<div class="ventana col-sm-12" align="center">
	<div class="col-sm-1 visible-xs" align="right">
		<a href="javascript:cerrarMapa();" title="Cerrar">X</a>
	</div>
	<div class="col-sm-11">
		<?php
		if (!empty($entrada -> obtener_video())) {
		    echo $entrada -> obtener_video();    
		}
		else{
		    ?>                
		    <div class="col-sm-12" align="center">
		    	<h1 style="font-size: 3em;">Vista previa no disponible por el momento</h1>
		    	<br>
		    	<div class="col-sm-12" id="social">
					<p>SÍGUENOS</p>
					<a target="_blank" href="<?php echo $facebookEmpresa; ?>"><i class="fab fa-facebook"></i></a>

		            <a target="_blank" href="<?php echo $instagramEmpresa; ?>"><i class="fab fa-instagram"></i></a>

		            <a target="_blank" href="<?php echo $whatsappEmpresa; ?>"><i class="fab fa-whatsapp"></i></a>
			    </div>
		    </div>
		    <?php
		}
		    ?>  		
	</div>
	<div class="col-sm-1 hidden-xs"><a href="javascript:cerrarMapa();" title="Cerrar">X</a></div>
</div>