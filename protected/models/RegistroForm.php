<?php

/**
 *
 */
class RegistroForm extends CFormModel
{
	
	public $username;
	public $cedula;
	public $correo;
	public $password;
	public $repetirPassword;
	


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		
			array('username,cedula,correo,password,repetirPassword ', 'required'),
			array('username', 'match','pattern'=>'/^[a-z0-9áéíóúàèìòùäëïöüñ\_]+$/i','message'=>'Solo numeros, letras y guion bajo ',),
			array('correo', 'email','message'=>'Formato del correo esta incorrecto ',),
			
			array('cedula','exist','allowEmpty' => false, 'attributeName' => 'Cedula', 'attributes' => 'Cedula', 'className' => 'Funcionarios', 'caseSensitive' => true , 'skipOnError' => true ,'message'=>' Cédula no encontrada. Debe ingresar una cédula de funcionario válida'),
			array('cedula','unique','allowEmpty' => false, 'attributeName' => 'cedula', 'attributes' => 'cedula', 'className' => 'Usuario', 'caseSensitive' => true , 'skipOnError' => true ,'message'=>' Ya estas registrado '),
			
			array('cedula', 'match','pattern'=>'/^[0-9]+$/i','message'=>'Solo numeros ',),
			#array('password', 'match','pattern'=>'/^[a-z0-9]+$/i','message'=>'Solo numeros y letras',),
			array('password','length','min'=>8,'tooShort'=>'La contraseña debe tener minimo 8 caracteres'),
			array('repetirPassword', 'compare','compareAttribute'=>'password','message'=>' La contraseña no coincide ',),
			array('username', 'validarNombreUsuario'),
			
			array('correo', 'validarCorreo'),
			array('correo', 'length', 'max'=>100),
			
			
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
	public function validarCorreo($attributes,$params)
	{
		$conexion=yii::app()->db;
		$sql="SELECT correo FROM tbl_users WHERE correo = '".$this->correo."'";
		$resultado=$conexion->createCommand($sql);   
		$filas=$resultado->query();
		
		foreach($filas as $fila)
		{
			if ($this->correo === $fila['correo'])
			{				
				$this->addError('correo','Nombre de correo no disponible');			
				break;
			}
		}	
	
	}	

		public function attributeLabels()
	{
		return array(
			'username' => 'Nombre',
			'repetirPassword' => 'Repetir contraseña',
			'password' => 'Contraseña',
		);
	}


}