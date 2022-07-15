<?php
include_once 'info_empresa.inc.php';
//info de la base de datos
    define('NOMBRE_SERVIDOR', 'localhost'); //se deja así
    define('NOMBRE_USUARIO', 'root'); //nombre de usuario de la base de datos
    define('PASSWORD', '');
    define('NOMBRE_BD', 'lh');//Nombre de la Base de datos


//rutas de la web
/*
Aqui debes poner todas las rutas que vayas a utilizar en la pagina
por ejemplo:
si queres podes crear una ruta tipo...
define("RUTA_CONTACTO", SERVIDOR."/contacto.php");
y en vez de agregarlo a alguna etiqueta <a href="contacto.php"></a>
podes escribir <a href="<?php echo RUTA_CONTACTO ?>"></a>
*/
define("SERVIDOR", "http://localhost/lh");//carpeta raiz (la que contiene todos los archivos para el funcionamiento de la página)
define("SERVIDOR_RESPALDO", "http://localhost/copia-lh");//carpeta de respaldo en otro servidor (la que contiene todos los archivos para el funcionamiento de la página)
define("RUTA_HOME", SERVIDOR."/inicio");
define("RUTA_TIENDA", SERVIDOR."/productos-melos");
define("RUTA_CONTACTO", SERVIDOR."/contacto");
define("RUTA_PREGUNTAS_FRECUENTES", SERVIDOR."/preguntas-frecuentes");
define("RUTA_REGISTRO", SERVIDOR."/registro");//registrar nuevo usuario
define("RUTA_REGISTRO_ADMIN", SERVIDOR."/01110010-01100101-01100111-01101001-01110011-01110100-01110010-01101111-00101101-01100001-01100100-01101101-01101001-01101110");//registrar nuevo usuario
define("RUTA_REGISTRO_CORRECTO", SERVIDOR."/registro-correcto");
define("RUTA_ACTIVAR_NOTIFICACIONES", SERVIDOR."/activar-notificaciones");


//anuncios
define("RUTA_ANUNCIO_SORTEO", SERVIDOR."/cerrado");

define("RUTA_LOGIN", SERVIDOR."/login");//inicio de sesion usuarios
define("RUTA_LOGIN_ADMIN", SERVIDOR."/pagina-no-encontrada");//inicio de sesion administracion
define("RUTA_LOGOUT", SERVIDOR."/logout");

define("RUTA_PERFIL", SERVIDOR."/perfil");//ruta perfil
define("RUTA_PERFIL_ADMIN", SERVIDOR."/perfil-admin");//ruta perfil del admin
define("RUTA_EDITAR_PERFIL", SERVIDOR."/editar-perfil");//editar perfil


//entradas y gestor
define("RUTA_ENTRADA", SERVIDOR."/entrada");
define("RUTA_GESTOR", SERVIDOR."/gestor");
define("RUTA_GESTOR_ENTRADAS", RUTA_GESTOR."/entradas");
define("RUTA_NUEVA_ENTRADA", SERVIDOR."/nueva-entrada");
define("RUTA_BORRAR_ENTRADA", SERVIDOR."/borrar-entrada");
define("RUTA_EDITAR_ENTRADA", SERVIDOR."/editar-entrada");


//subir una imagen al servidor
define("RUTA_SUBIR_IMAGEN", SERVIDOR."/subir-imagen");
define("RUTA_SUBIR_IMAGEN_PRODUCTO", SERVIDOR."/subir-imagen-producto");
define("RUTA_IMG_SUBIDAS", SERVIDOR."/img/subidas");
define("RUTA_IMG_SUBIDAS_DOS", SERVIDOR_RESPALDO."/piercing/img/subidas");

//subir archivos al servidor
define("RUTA_SUBIR_ARCHIVO", SERVIDOR."/subir-archivo");

define("HACER_COPIA", SERVIDOR."/comprimelo");
define("DESCARGAR_BD", SERVIDOR."/descargar-bd");
define("RUTA_RECUPERAR_CLAVE", SERVIDOR."/recuperar-clave");
define("RUTA_GENERAR_URL_SECRETA", SERVIDOR."/generar-url-secreta");
define("RUTA_RECUPERACION_CLAVE", SERVIDOR."/recuperacion-clave");//recuperacion de contraseña
define("RUTA_PRUEBA_MAIL", SERVIDOR."/mail");
define("RUTA_BUSCAR", SERVIDOR."/buscar");//busca producto
define("RUTA_BUSCAR_ENTRADA", SERVIDOR."/buscar-entrada");//busca entrada
//rutas de la web


//recursos
define("RUTA_IMG", SERVIDOR."/img/");
define("RUTA_IMG_OPTIMIZADA", SERVIDOR."/img/optimizadas/");
define("RUTA_CSS", SERVIDOR."/css/");
define("RUTA_JS", SERVIDOR."/js/");
define("DIRECTORIO_RAIZ", realpath(__DIR__."/.."));
define("RUTA_SLIDER_DATA", SERVIDOR."/slider/producto/data1/");
define("RUTA_SLIDER_ENGINE", SERVIDOR."/slider/producto/engine1/");
define("RUTA_CUENTA_REGRESIVA", SERVIDOR."/cuenta-regresiva/");
//recursos