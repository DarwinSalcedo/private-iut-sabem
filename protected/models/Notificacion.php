<?php

/**
 * This is the model class for table "tbl_notificacion".
 *
 * The followings are the available columns in table 'tbl_notificacion':
 * @property string $id
 * @property double $cedula
 * @property string $asunto
 * @property string $mensaje
 * @property string $fecha_hora
 * @property string $email
 * @property double $cedula_enviado
 */
class Notificacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_notificacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('asunto, mensaje,  email', 'required'),
			array('cedula, cedula_enviado', 'numerical'),
			array('asunto', 'length', 'max'=>50),
			array('email', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cedula, asunto, mensaje, fecha_hora, email, cedula_enviado', 'safe', 'on'=>'search'),
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
			'asunto' => 'Asunto',
			'mensaje' => 'Mensaje',
			'fecha_hora' => 'Fecha Hora',
			'email' => 'Email',
			'cedula_enviado' => 'Cedula Enviado',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('fecha_hora',$this->fecha_hora,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('cedula_enviado',$this->cedula_enviado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notificacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
