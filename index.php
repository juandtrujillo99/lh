<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
session_start();


include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode("/", $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'paginas/404.php';//siempre se redigirá a esta pagina en caso de que la url no se escriba correctamente o la redireccion se haga mal

if($partes_ruta[0] == 'lh'){
	if (count($partes_ruta) == 1) {
		$ruta_elegida = 'paginas/inicio.php';
	}
	else if (count($partes_ruta) == 2) {
		switch($partes_ruta[1]){
			case 'relleno-dev':
                $ruta_elegida = 'scripts/script-relleno.php';
                break;
            case 'subida-archivo':
                $ruta_elegida = 'scripts/barra-progreso.php';
                break;
            //subir imagen
			case 'subir-imagen':
			$ruta_elegida = 'paginas/subir-imagen.php';
			break;
			//subir imagen de producto
			case 'subir-imagen-producto':
			$ruta_elegida = 'paginas/subir-imagen-producto.php';
			break;
			//subir archivo
			case 'subir-archivo':
			$ruta_elegida = 'paginas/subir-archivo.php';
			break;

			//anuncio
			case 'contacto':
			$ruta_elegida = 'paginas/contacto.php';
			break;

			
			//activar-notificaciones
			case 'activar-notificaciones':
			$ruta_elegida = 'paginas/activar-notificaciones.php';
			break;


			//anuncio
			case 'cerrado':
			$ruta_elegida = 'paginas/anuncio/sorteo.php';
			break;



			//login
			case 'login':
			$ruta_elegida = 'paginas/login.php';
			break;
			case 'pagina-no-encontrada':
			$ruta_elegida = 'paginas/login-admin.php';
			break;
			case 'logout':
			$ruta_elegida = 'paginas/logout.php';
			break;

			//inicio para usuarios
			case 'productos-melos':
			$ruta_elegida = 'paginas/tienda.php';
			break;
			//preguntas frecuentes
			case 'preguntas-frecuentes':
			$ruta_elegida = 'paginas/preguntas-frecuentes.php';
			break;
			//Buscar producto
			case 'buscar':
            $ruta_elegida = 'paginas/buscar.php';
            break;
			//Buscar entrada
			case 'buscar-entrada':
            $ruta_elegida = 'paginas/buscar-entrada.php';
            break;



            //registro de usuarios
			case 'registro':
			$ruta_elegida = 'paginas/registro.php';
			break;
			case '01110010-01100101-01100111-01101001-01110011-01110100-01110010-01101111-00101101-01100001-01100100-01101101-01101001-01101110':
			$ruta_elegida = 'paginas/registro-admin.php';
			break;



			//Panel de control de entradas
			/*case 'gestor':
			$ruta_elegida = 'paginas/gestor.php';
			$gestor_actual = '';
			break;*/
			case 'nueva-entrada':
			$ruta_elegida = 'paginas/nueva-entrada.php';
			break;
			case 'borrar-entrada':
			$ruta_elegida = 'scripts/borrar-entrada.php';
			break;
			case 'editar-entrada':
			$ruta_elegida = 'paginas/editar-entrada.php';
			break;



			//Panel de control de productos
			/*case 'gestor-p':
			$ruta_elegida = 'paginas/gestor-p.php';
			$gestor_actual = '';
			break;*/
			case 'nuevo-producto':
			$ruta_elegida = 'paginas/nuevo-producto.php';
			break;
			case 'borrar-producto':
			$ruta_elegida = 'scripts/borrar-producto.php';
			break;
			case 'editar-producto':
			$ruta_elegida = 'paginas/editar-producto.php';
			break;

			
			
			case 'descargar-bd':
			$ruta_elegida = 'backup-db.php';
			break;
			case 'comprimelo':
			$ruta_elegida = 'Comprime.php';
			break;


			//recuperacion de contraseña
			case 'recuperar-clave':
			$ruta_elegida = 'paginas/recuperar-clave.php';
			break;
			case 'generar-url-secreta':
			$ruta_elegida = 'scripts/generar-url-secreta.php';
			break;
			case 'mail':
			$ruta_elegida = 'paginas/prueba-mail.php';
			break;


			//rutas de perfil
			case 'perfil':
			$ruta_elegida = 'paginas/perfil.php';
			break;
			case 'perfil-admin':
			$ruta_elegida = 'paginas/perfil-admin.php';
			break;
		}
	}


	else if (count($partes_ruta) == 3) {

		//ruta de registro correcto
		if($partes_ruta[1] == 'registro-correcto'){
			$nombre = $partes_ruta[2];
			$ruta_elegida = 'paginas/registro-correcto.php';
		}


		//rutas para entradas
		if ($partes_ruta[1] == 'entrada') {
			$url = $partes_ruta[2];

			Conexion::abrir_conexion();
			$entrada = RepositorioEntrada :: obtener_entrada_por_url(Conexion::obtener_conexion(), $url);

			if ($entrada != null) {
				$autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $entrada -> obtener_autor_id());
				$entradas_azar = RepositorioEntrada::obtener_entradas_al_azar(Conexion::obtener_conexion(), 4);//aqui se cambia el numero de entradas que se va a mostrar


				$ruta_elegida = 'paginas/entrada.php';
			}
		}


		//panel de control de las entradas, favoritos y comentarios, sirve como referencia (no tocar)
		if ($partes_ruta[1] == 'gestor') {
			switch ($partes_ruta[2]) {
				case 'entradas':
					$gestor_actual = 'entradas';
					$ruta_elegida = 'paginas/gestor.php';
					break;
				case 'comentarios':
					$gestor_actual = 'comentarios';
					$ruta_elegida = 'paginas/gestor.php';
					break;
				case 'favoritos':
					$gestor_actual = 'favoritos';
					$ruta_elegida = 'paginas/gestor.php';
					break;
			}
		}


		//Recuperacion de contraseña (no tocar)
		if ($partes_ruta[1] == 'recuperacion-clave') {
			$url_personal = $partes_ruta[2];
			$ruta_elegida = 'paginas/recuperacion-clave.php';
		}
	}
}

include_once $ruta_elegida;