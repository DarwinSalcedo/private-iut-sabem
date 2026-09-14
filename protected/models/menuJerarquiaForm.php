<?php class menuJerarquiaForm extends CFormModel
{
	
	public $codigo;



	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(			
			array('codigo', 'safe'),
		);
	}


} ?>
