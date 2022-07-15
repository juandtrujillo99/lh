<?php
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesionAdmin.inc.php';
include_once 'app/RepositorioAdmin.inc.php';
include_once 'app/Redireccion.inc.php';


if (!ControlSesionAdmin :: sesion_iniciada()) {
    Redireccion :: redirigir(RUTA_LOGIN_ADMIN);
}
else{
    Conexion :: abrir_conexion();
    $id = $_SESSION['id_admin'];
    $admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}



function convertirFecha ($fecha) {
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
}
 




$titulo = "Gestor | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';?>
        
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>materialize.min.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">

<?php 
include 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
include_once 'seccion/panel_control_declaracion.inc.php';



switch($gestor_actual) {
	case '':
		$cantidad_entradas_activas = RepositorioEntrada :: contar_entradas_activas_usuario(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
		$cantidad_entradas_inactivas = RepositorioEntrada :: contar_entradas_inactivas_usuario(Conexion::obtener_conexion(), $_SESSION['id_usuario']);

	
		include_once 'seccion/gestor-generico.inc.php';
		break;
	case 'entradas':
		$array_entradas = RepositorioEntrada :: obtener_entradas_usuario_titulo_ascendente(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
	
		include_once 'seccion/gestor-entradas.inc.php';
		break;
	case 'comentarios':
		include_once 'seccion/gestor-comentarios.inc.php';
		break;
	case 'favoritos':
		include_once 'seccion/gestor-favoritos.inc.php';
		break;
}

include_once 'seccion/panel_control_cierre.inc.php';
include_once 'seccion/doc-pie.inc.php';