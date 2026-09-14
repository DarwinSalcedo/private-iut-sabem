<?php

/**
 * This is the model class for table "tbl_ingreso".
 *
 * The followings are the available columns in table 'tbl_ingreso':
 * @property integer $id_usuario
 * @property double $Cedula
 * @property integer $Equipo
 * @property string $Login
 * @property string $Clave
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Condicion
 * @property string $TipoUsuario
 * @property integer $cod_institucion
 * @property integer $cod_nivel_acceso
 * @property string $des_cambio_contraseña
 */
class Ingreso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ingreso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario, Login, Clave, Nombre, Apellidos, TipoUsuario, cod_nivel_acceso, des_cambio_contraseña', 'required'),
			array('id_usuario, Equipo, cod_institucion, cod_nivel_acceso', 'numerical', 'integerOnly'=>true),
			array('Cedula', 'numerical'),
			array('Login, Clave, Nombre, Apellidos, Condicion, TipoUsuario', 'length', 'max'=>50),
			array('des_cambio_contraseña', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, Cedula, Equipo, Login, Clave, Nombre, Apellidos, Condicion, TipoUsuario, cod_institucion, cod_nivel_acceso, des_cambio_contraseña', 'safe', 'on'=>'search'),
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
			'id_usuario' => 'Id Usuario',
			'Cedula' => 'Cedula',
			'Equipo' => 'Equipo',
			'Login' => 'Login',
			'Clave' => 'Clave',
			'Nombre' => 'Nombre',
			'Apellidos' => 'Apellidos',
			'Condicion' => 'Condicion',
			'TipoUsuario' => 'Tipo Usuario',
			'cod_institucion' => 'Cod Institucion',
			'cod_nivel_acceso' => 'Cod Nivel Acceso',
			'des_cambio_contraseña' => 'Des Cambio Contraseña',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('Equipo',$this->Equipo);
		$criteria->compare('Login',$this->Login,true);
		$criteria->compare('Clave',$this->Clave,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Apellidos',$this->Apellidos,true);
		$criteria->compare('Condicion',$this->Condicion,true);
		$criteria->compare('TipoUsuario',$this->TipoUsuario,true);
		$criteria->compare('cod_institucion',$this->cod_institucion);
		$criteria->compare('cod_nivel_acceso',$this->cod_nivel_acceso);
		$criteria->compare('des_cambio_contraseña',$this->des_cambio_contraseña,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ingreso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
