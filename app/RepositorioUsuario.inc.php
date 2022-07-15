<?php


//RepositorioUsuario: esta encargada de saber cuales y cuantos usuarios hay registrados en la base de datos 
class RepositorioUsuario{
	public static function obtener_todos($conexion){
		$usuarios = array();
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';
				$sql = "SELECT * FROM usuarios";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)){
					foreach ($resultado as $fila) {
						$usuarios[] = new Usuario(
							$fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']
						);
					}
				} else{
					print 'No hay usuarios';
				}

			} catch(PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}

		return $usuarios;
	}
	//obtener_numero_usuarios: esta encargada de contar el numero de usuarios que hay registrados en la base de datos 
	public static function obtener_numero_usuarios($conexion){
		$total_usuarios = null;
		if (isset($conexion)){
			try{
				$sql = "SELECT COUNT(*) as total FROM usuarios";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();

				$total_usuarios = $resultado['total'];
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $total_usuarios;
	}

	//insertar_usuario: esta encargada de agregar nuevos usuarios a la base de datos
	public static function insertar_usuario($conexion, $usuario){
		$usuario_insertado = false;
		if (isset($conexion)) {
			try{
				$sql = "INSERT INTO usuarios(codigo, nombre, email, password, fecha_registro, activo) VALUES(:codigo, :nombre, :email, :password, NOW(), 0)";

				$sentencia = $conexion -> prepare($sql);

				$sentencia->bindParam(':codigo', $usuario -> obtener_codigo(), PDO::PARAM_STR);
				$sentencia->bindParam(':nombre', $usuario -> obtener_nombre(), PDO::PARAM_STR);
				$sentencia->bindParam(':email', $usuario -> obtener_email(), PDO::PARAM_STR);
				$sentencia->bindParam(':password', $usuario -> obtener_password(), PDO::PARAM_STR);

				$usuario_insertado = $sentencia -> execute();
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex->getMessage();
			}
		}
		return $usuario_insertado;
	}

	//codigo_existe: esta encargada de verificar que el codigo de usuario no se repite en la base de datos
	public static function codigo_existe($conexion, $codigo){

		$codigo_existe = true;

		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM usuarios WHERE codigo = :codigo";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':codigo', $codigo, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$codigo_existe = true;					
				}
				else{
					$codigo_existe = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $codigo_existe;
	}

	//nombre_existe: esta encargada de verificar que los nombres de usuario no se repitan en la base de datos
	public static function nombre_existe($conexion, $nombre){

		$nombre_existe = true;

		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM usuarios WHERE nombre = :nombre";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$nombre_existe = true;					
				}
				else{
					$nombre_existe = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $nombre_existe;
	}

	//email_existe: esta encargada de verificar que los correos no se repitan en la base de datos (un email puede ser utilizado solo una vez por usuario)
	public static function email_existe($conexion, $email){
		$email_existe = true;
		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM usuarios WHERE email = :email";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$email_existe = true;					
				}
				else{
					$email_existe = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $email_existe;
	}

	//obtener_usuario_por_email: ayuda a identificar a cada usuario con su email
	public static function obtener_usuario_por_email($conexion, $email){
		$usuario = null;
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE email = :email";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['codigo'],
						$resultado['nombre'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}

	//obtener_usuario_por_id: ayuda a identificar a cada usuario con su id
	public static function obtener_usuario_por_id($conexion, $id){
		$usuario = null;
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['codigo'],
						$resultado['nombre'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}
	
	//obtener_usuario_por_codigo: ayuda a identificar a cada usuario con su codigo
	public static function obtener_usuario_por_codigo($conexion, $codigo){
		$usuario = null;
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE codigo = :codigo";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':codigo', $codigo, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['codigo'],
						$resultado['nombre'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}

	//actualizar_password: ayuda a actualizar las contraseñas de cada usuario
	public static function actualizar_password($conexion, $id_usuario, $nueva_clave){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET password = :password WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':password', $nueva_clave, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}
}


