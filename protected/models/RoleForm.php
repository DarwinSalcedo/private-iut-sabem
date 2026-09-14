<?php

/**
 *
 */
class RoleForm extends CFormModel
{
	public  static $types=array("operation","task","roles");
	public $name;
	public $description;
	public $type=2;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name required
			array('name, type', 'required'),
			// email has to be a valid email address
			array('description', 'safe'),
		);
	}


}