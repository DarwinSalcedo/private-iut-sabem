<?php

/**
 *
 */
class UsernameForm extends CFormModel
{
	
	public $username;	


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		
			array('username', 'required'),
			array('username', 'match','pattern'=>'/^[a-z0-9áéíóúàèìòùäëïöüñ\_]+$/i','message'=>'Solo numeros, letras y guion bajo ',),
			array('username', 'validarNombreUsuario'),
		);
	}
	public function validarNombreUsuario($attributes,$params)
	{
		$conexion=yii::app()->db;
		$sql="SELECT username FROM tbl_users WHERE username = '".$this->username."'";
		$resultado=$conexion->createCommand($sql);   
		$filas=$resultado->query();
		
		foreach($filas as $fila)
		{
			if ($this->username === $fila['username'])
			{				
				$this->addError('username','Nombre de usuario no disponible');			
				break;
			}
		}	
	
	}

		public function guardarNombreUsuario()
	{
		$conexion=yii::app()->db;
		$consulta="UPDATE `tbl_users` SET `username`='".$this->username."' WHERE `cedula` = '".yii::app()->user->getState('cedula')."';";		
		$resultado=$conexion->createCommand($consulta)->execute();
	}


}