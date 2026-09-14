<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
	
		$user=Usuario::model()->find("LOWER(username)=?",array(strtolower($this->username)));

		
		//verifica que el sistema no este bloqueado != null
		$sistema =Sistema::model()->find("LOWER(valor)=?",array(strtolower("activo")));
		
		if ($user == null) {
			$numero = 0;
		}else{
			$numero = $user->id;
		}

		$privilegio = TipoRol::model()->find("LOWER(userid)=?",array(strtolower($numero)));
			


		//var_dump($privilegio->itemname);
		//yii::app()->end();
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(md5($this->password)!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			//verifica que el sistema no este bloqueado != null
			$sistema =Sistema::model()->find("LOWER(valor)=?",array(strtolower("activo")));
			$privilegio = TipoRol::model()->find("LOWER(userid)=?",array(strtolower($user->id)));

/**nueva*/	if($sistema===null &&  $privilegio->itemname!= "admin"  ){
				$this->errorCode=self::ERROR_NONE;
				
				$this->setState("acceso","SYSTEM");			
				}
			else
			{
				$this->_id=$user->id;
				#$this->setState("correo",$user->correo);			
				$this->setState("cedula",$user->cedula);
				$this->setState("acceso",$user->estatus);			
				$this->errorCode=self::ERROR_NONE;
			}
		}
		return !$this->errorCode;
			
	}
	public function getId()
	{ 
		return $this->_id;
	}
}