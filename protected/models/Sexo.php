<?php

/**
 * This is the model class for table "tbl_sexo".
 *
 * The followings are the available columns in table 'tbl_sexo':
 * @property integer $Cod_sexo
 * @property string $Descripcion_sexo
 */
class Sexo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_sexo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cod_sexo', 'required'),
			array('Cod_sexo', 'numerical', 'integerOnly'=>true),
			array('Descripcion_sexo', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Cod_sexo, Descripcion_sexo', 'safe', 'on'=>'search'),
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
			'Cod_sexo' => 'Cod Sexo',
			'Descripcion_sexo' => 'Descripcion Sexo',
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

		$criteria->compare('Cod_sexo',$this->Cod_sexo);
		$criteria->compare('Descripcion_sexo',$this->Descripcion_sexo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sexo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
