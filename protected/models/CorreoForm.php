<?php

/**
 *
 */
class CorreoForm extends CFormModel
{
	
		
	public $correo;

	


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		
			array('correo', 'required'),
			array('correo', 'email','message'=>'Formato del correo esta incorrecto ',),
			array('correo', 'validarCorreo'),			
		);
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

			public function guardarCorreo()
	{
		$conexion=yii::app()->db;
		$consulta="UPDATE `tbl_users` SET `correo`='".$this->correo."' WHERE `cedula` = '".yii::app()->user->getState('cedula')."';";		
		$resultado=$conexion->createCommand($consulta)->execute();
	}


}