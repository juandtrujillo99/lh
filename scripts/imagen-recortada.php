<script src="<?php echo RUTA_JS; ?>recortar-imagen.min.js"></script>
<script>
    // Call polyfill to fit in images
    document.addEventListener('DOMContentLoaded', function () {
        objectFit.polyfill({
            selector: 'img',
            fittype: 'cover'
        });
    });
</script>