<?php

/**
 * This is the model class for table "tbl_asc_fecha_asc".
 *
 * The followings are the available columns in table 'tbl_asc_fecha_asc':
 * @property integer $id_asc_fecha
 * @property double $Cedula
 * @property integer $Cod_Jerarquia
 * @property string $fecha_ascenso
 * @property string $des_ascenso
 */
class FechaAscenso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_fecha_asc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('des_ascenso', 'required'),
			array('id_asc_fecha, Cod_Jerarquia', 'numerical', 'integerOnly'=>true),
			array('Cedula', 'numerical'),
			array('des_ascenso', 'length', 'max'=>250),
			array('fecha_ascenso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_asc_fecha, Cedula, Cod_Jerarquia, fecha_ascenso, des_ascenso', 'safe', 'on'=>'search'),
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
			'id_asc_fecha' => 'Id Asc Fecha',
			'Cedula' => 'Cedula',
			'Cod_Jerarquia' => 'Cod Jerarquia',
			'fecha_ascenso' => 'Fecha Ascenso',
			'des_ascenso' => 'Des Ascenso',
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

		$criteria->compare('id_asc_fecha',$this->id_asc_fecha);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('Cod_Jerarquia',$this->Cod_Jerarquia);
		$criteria->compare('fecha_ascenso',$this->fecha_ascenso,true);
		$criteria->compare('des_ascenso',$this->des_ascenso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FechaAscenso the static model class
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
