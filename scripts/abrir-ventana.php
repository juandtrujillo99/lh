<script type="text/javascript">
    // usamos onload para asegurarnos que existan los elementos en nuestro DOM
        window.onload = function() {
            var anchor = document.getElementById("anchor");         
            
            // le asociamos el evento a nuestro elemento para tener un codigo 
            // html mas limpio y manejar toda la interaccion
            // desde nuestro script
            anchor.onclick = function() {
                // una variable donde pongo la url a donde quiera ir, 
                //podria estar de mas pero asi queda mas limpio la funcion window.open()
                var url = "<?php echo $abrirEnlace;?>";
                window.open(url, "_blank", 'width=800,height=500'); 
                // el return falase es para eviar que se progrague el evento y se vaya al href de tu anchor.
                return false;
            };
        }
</script>