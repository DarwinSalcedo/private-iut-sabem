<?php

/**
 * This is the model class for table "tbl_asc_fecha_ingreso".
 *
 * The followings are the available columns in table 'tbl_asc_fecha_ingreso':
 * @property integer $id_fecha_ingreso
 * @property double $Cedula
 * @property string $fecha_ingreso
 * @property string $des_fecha_ingreso
 */
class FechaIngreso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_fecha_ingreso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_fecha_ingreso, Cedula', 'required'),
			array('id_fecha_ingreso', 'numerical', 'integerOnly'=>true),
			array('Cedula', 'numerical'),
			array('des_fecha_ingreso', 'length', 'max'=>15),
			array('fecha_ingreso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fecha_ingreso, Cedula, fecha_ingreso, des_fecha_ingreso', 'safe', 'on'=>'search'),
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
			'id_fecha_ingreso' => 'Id Fecha Ingreso',
			'Cedula' => 'Cedula',
			'fecha_ingreso' => 'Fecha Ingreso',
			'des_fecha_ingreso' => 'Des Fecha Ingreso',
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

		$criteria->compare('id_fecha_ingreso',$this->id_fecha_ingreso);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('des_fecha_ingreso',$this->des_fecha_ingreso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FechaIngreso the static model class
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
