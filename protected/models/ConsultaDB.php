<?php


class ConsultaDb 
{
	#public $codigo;
	
	public function guardarUsuario($username,$password,$cedula,$correo)
	{
		$conexion=yii::app()->db;
		#$codigo=sha1();
		$contrasenha=md5($password);
		$consulta="insert into tbl_users(username,password,cedula,correo,estatus)";
		$consulta .="values ('$username','$contrasenha','$cedula','$correo','ACTIVO')";
		$resultado=$conexion->createCommand($consulta)->execute();

		
	}

	
}
