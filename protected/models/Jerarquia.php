<?php

/**
 * This is the model class for table "tbl_jerarquia".
 *
 * The followings are the available columns in table 'tbl_jerarquia':
 * @property integer $Cod_Jerarquia
 * @property string $Descripcion_Jerarquia
 *
 * The followings are the available model relations:
 * @property TblFuncionarios[] $tblFuncionarioses
 * @property TblFuncionarios $codJerarquia
 */
class Jerarquia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_jerarquia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cod_Jerarquia', 'required'),
			array('Cod_Jerarquia', 'numerical', 'integerOnly'=>true),
			array('Descripcion_Jerarquia', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Cod_Jerarquia, Descripcion_Jerarquia', 'safe', 'on'=>'search'),
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
			'tblFuncionarioses' => array(self::HAS_MANY, 'TblFuncionarios', 'Cod_Jerarquia'),
			'codJerarquia' => array(self::BELONGS_TO, 'TblFuncionarios', 'Cod_Jerarquia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Cod_Jerarquia' => 'Cod Jerarquia',
			'Descripcion_Jerarquia' => 'Descripcion Jerarquia',
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

		$criteria->compare('Cod_Jerarquia',$this->Cod_Jerarquia);
		$criteria->compare('Descripcion_Jerarquia',$this->Descripcion_Jerarquia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jerarquia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function jerarquiaAscender($codigo)
	{		
		$jerarquia=new Jerarquia;
		$numero=$codigo - 1;

		if ($numero >= 0) 
			{
				$resultado=$jerarquia->find("(Cod_Jerarquia)=?",array($numero));
				
			}
		else 
			return false;	
				
		if ($resultado !== null ) return $resultado->Cod_Jerarquia;
		else return false;	
	}
	
	
}
