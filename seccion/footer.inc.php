<div class="col-sm-12 hidden-xs" id="pie">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="col-sm-2 logo-svg">			
		</div>
		<div class="col-sm-8">
			<div class="col-sm-3"></div>
			<div class="col-sm-4" align="left">
				<p class="col-sm-10">CONTACTO</p>
				<div class="col-sm-12">
					<h5 class="correo-numero">
						<?php echo $emailEmpresa;?>	
						<br><br>
						<?php echo $telefonoEmpresa;?>
					</h5>
				</div>
			</div>				
		</div>
		<div class="col-sm-2" id="social">
			<p>SÍGUENOS</p>
			<a href="<?php echo $facebookEmpresa ;?>" target="_blank">Facebook</a>
	        <br>
	        <a href="<?php echo $instagramEmpresa ;?>" target="_blank">Instagram</a>
	        <br>
	        <a href="<?php echo $whatsappEmpresa ;?>" target="_blank">Whatsapp</a>
            
		</div>
	</div>	
</div>



<div class="col-xs-12 visible-xs" id="pie">
	<div class="col-xs-1"></div>
	<div class="col-xs-5">
		<p class="col-xs-12">CONTACTO</p>
		<div class="col-xs-12">
			<h5 itemprop="email" class="correo-numero">
				<?php echo $emailEmpresa;?>	
			</h5>
			<h5 itemprop="telephone" class="correo-numero">
				<?php echo $telefonoEmpresa;?>
			</h5>
		</div>			
	</div>
	<div class="col-xs-5" id="social-m">
		<p>SÍGUENOS</p>
			<a target="_blank" href="<?php echo $facebookEmpresa; ?>"><i class="fab fa-facebook"></i></a>

            <a target="_blank" href="<?php echo $instagramEmpresa; ?>"><i class="fab fa-instagram"></i></a>

            <a target="_blank" href="<?php echo $whatsappEmpresa; ?>"><i class="fab fa-whatsapp"></i></a>
        
	</div>
</div>
<?php 
	include_once 'seccion/copyright.inc.php';
?>	