<?php
class Usuario{
	private $id;
	private $nombre;
	private $usuario;
	private $clave;
    private $email;
	private $rol;
	private $estado;
	private $fecha;

	public function __construct($id,$nombre,$usuario,$clave,$email,$rol,$estado,$fecha){
		$this->id=$id;
		$this->nombre=$nombre;
		$this->usuario=$usuario;
		$this->clave=$clave;
		$this->email=$email;
		$this->rol=$rol;
		$this->estado=$estado;
		$this->fecha=$fecha;
	}
	public function Administrador(){
		include_once("conexion.php");
		$db=new Conexion();
		$sql=$db->query("INSERT INTO usuarios (nombre,usuario,clave,email,rol)
	 	values('$this->nombre', '$this->usuario','$this->clave','$this->email',1)");
		return ($sql);
	}

    public function Empleado(){
		include_once("conexion.php");
		$db=new Conexion();
		$sql=$db->query("INSERT INTO usuarios (nombre,usuario,clave,email)
	 	values('$this->nombre', '$this->usuario','$this->clave','$this->email')");
		return ($sql);
	}

    public function lista(){
		/* order by empresa asc */
		include_once("conexion.php");
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM usuarios where estado='activo'");
		return $sql;
	}

	public function editarUsuario($idu){
		include_once("conexion.php");
        $db=new Conexion();
        $sql=$db->query("UPDATE usuarios set nombre='$this->nombre',email='$this->email' where id=$idu");
        return($sql);
    }
	public function editarClave($idu){
		include_once("conexion.php");
        $db=new Conexion();
        $sql=$db->query("UPDATE usuarios set clave='$this->clave' where id=$idu");
        return($sql);
    }

	public function buscar($user){
		/* order by empresa asc */
		include_once("conexion.php");
		$db=new Conexion();
		$sql=$db->query("SELECT * FROM usuarios where usuario='$user' or email='$user'");
		return $sql;
	}

	public static function existeUsuario($user) {
		include_once("conexion.php");
		$db = new Conexion();
		$sql = $db->query("SELECT * FROM usuarios WHERE usuario = '$user'");
	
		if ($sql && $sql->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function eliminarUsuario($idu){
		include_once("conexion.php");
        $db=new Conexion();
        $sql=$db->query("DELETE usuarios where id=$idu");
        return($sql);
    }
	
}
?>