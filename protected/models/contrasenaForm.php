<?php

/**
 *
 */
class ContrasenaForm extends CFormModel
{
	
	public $passActual;
	public $password;
	public $repetirPassword;
	


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		
			array('passActual,password,repetirPassword', 'required'),			
			#array('password,passActual ', 'match','pattern'=>'/^[a-z0-9]+$/i','message'=>'Solo numeros y letras',),
			array('password','length','min'=>8,'tooShort'=>'La contraseña debe tener minimo 8 caracteres'),
			array('repetirPassword', 'compare','compareAttribute'=>'password','message'=>' La contraseña no coincide ',),			
			array('passActual', 'ValidarActual'  ),
			);
	}

	
	public function validarActual($attributes,$params)
	{
		$conexion=yii::app()->db;
		$sql="SELECT password FROM tbl_users WHERE `cedula` = '".yii::app()->user->getState('cedula')."';";
		$resultado=$conexion->createCommand($sql);   
		$filas=$resultado->query();
		$pass=strtolower(md5($this->passActual));

		foreach($filas as $fila)
		{
			if ($pass !== strtolower($fila['password']))
			{				
				$this->addError('passActual','Contraseña no valida');			
				break;
			}
		}	
	

		
                
	}

	public function validarContrasena()
	{	
		$pass=md5($password);
		$conexion=yii::app()->db;
		$sql="UPDATE `tbl_users` SET `password`='".$pass."' WHERE `cedula` = '".yii::app()->user->getState('cedula')."';";		
		$resultado=$conexion->createCommand($sql);   
		$resultado->query();		
		
	}

	
	public function guardarContrasena($password)
	{	
		$pass=md5($password);
		$conexion=yii::app()->db;
		$sql="UPDATE `tbl_users` SET `password`='".$pass."' WHERE `cedula` = '".yii::app()->user->getState('cedula')."';";		
		$resultado=$conexion->createCommand($sql);   
		$resultado->query();		
		
	}

		public function attributeLabels()
	{
		return array(
			'passActual' => 'Contraseña actual',
			'password' => 'Contraseña nueva',
			'repetirPassword' => 'Repita contraseña',
		
		);
	}

} 