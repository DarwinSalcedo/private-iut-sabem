<?php

/**
 *
 */
class SalvarForm extends CFormModel
{
	
	public $correo;	
	public $cedula;	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		
			array('correo,cedula', 'required'),
			array('correo', 'email','message'=>'Formato del correo esta incorrecto ',),
			array('cedula', 'match','pattern'=>'/^[0-9]+$/i','message'=>'Solo numeros ',),			
		);
	}
	
	
	}


