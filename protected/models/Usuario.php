<?php

/**
 * This is the model class for table "tbl_users".
 *
 * The followings are the available columns in table 'tbl_users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $correo
 * @property string $estatus
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, correo, estatus', 'required'),
			array('username', 'length', 'max'=>20),
			array('password, correo, estatus', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, correo, estatus , cedula', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cedula' => 'Cedula',
			'username' => 'Nombre de Usuario',
			'password' => 'Contraseña',
			'correo' => 'Correo',
			'estatus' => 'Estatus',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('estatus',$this->estatus,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function bloqueado($id)
	{
		$sql="SELECT estatus FROM  `tbl_users` where id='$id';";
		$estatus=yii::app()->db->createCommand($sql)->queryAll();
		if($estatus===null)
			return False;
			if ($estatus[0]["estatus" ]==='ACTIVO') return true;
			else  return False;
		
	}
	
		public static function cargar($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public static function cargarCedula($cedula)
	{
            $model= Usuario::model()->find("(cedula)=?",array($cedula));		
		if($model===null)
                        return false;
		return $model;  		
	}
	

		public function buscarUltimo()
	{
		$sql="SELECT MAX(`id`) FROM  `tbl_users`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id`)" ] + 1;
	}
		

		public function guardarUsuario($username,$password,$cedula,$correo)
	{
		$conexion=yii::app()->db;		
		$contrasenha=md5($password);
		$id=$this->buscarUltimo();

		$consulta="insert into tbl_users(id,username,password,cedula,correo,estatus)";
		$consulta .="values (".$id.",'$username','$contrasenha','$cedula','$correo','ACTIVO')";
		$resultado=$conexion->createCommand($consulta)->execute();

		$this->asignarRoleDefault($id);
		
	}

		public function asignarRoleDefault($id)
	{
		yii::app()->authManager->assign('demo',$id);//asigna el items        	
		
	}

	public function behaviors()
{
    return array(
        // Classname => path to Class
        'ActiveRecordLogableBehavior'=>
            'application.behaviors.ActiveRecordLogableBehavior',
    );
}

}
