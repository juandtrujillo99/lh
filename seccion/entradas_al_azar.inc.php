<?php
include_once 'app/EscritorEntradas.inc.php';
?>
<?php //pc?>
<div class="col-xs-12">
	<div class="col-xs-1"></div>
	<div class="col-sm-12 col-xs-10" id="entradas-azar">
		<div class="col-sm-12">
			<hr>
			<h3 align="center" class="texto-negrita">Otros Productos</h3>
		</div>
		
		<?php
			for ($i = 0; $i < count($entradas_azar); $i++) {
				$entrada_actual = $entradas_azar[$i];
			?>
			<a itemprop="url" href="<?php echo RUTA_ENTRADA . '/' . $entrada_actual -> obtener_url(); ?>" class="col-sm-3" id="abrebocas" align="center">
	            <div class="col-sm-10">
	                <div class="col-sm-6" align="center">
	                    <img loading="lazy" itemprop="image" id="imagen-recortada-3" src="<?php echo RUTA_IMG_SUBIDAS."/".$entrada_actual -> obtener_imagen(); ?>" class="imagen">                        
	                </div>
	                <div class="col-sm-6 entrada-azar" align="left">                        
	                    <h4><?php echo nl2br(EscritorEntradas::resumir_2_titulo($entrada_actual -> obtener_titulo())); ?></h4>                        
	                    <h4>$<?php echo nl2br(number_format($entrada_actual -> obtener_precio())); ?></h4>
	                </div>
	            </div>  
	        </a>
			<?php
			}
		?>
	</div>
</div>
<?php //pc?>
