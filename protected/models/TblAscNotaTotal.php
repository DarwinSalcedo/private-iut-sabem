<?php

/**
 * This is the model class for table "tbl_asc_nota_total".
 *
 * The followings are the available columns in table 'tbl_asc_nota_total':
 * @property integer $id_nota_total
 * @property integer $Cedula
 * @property string $num_nota_total
 * @property integer $Cod_Jerarquia
 * @property string $Fecha_Ingreso
 * @property string $des_revisar
 * @property integer $id_conf_asc_fecha
 */
class TblAscNotaTotal extends CActiveRecord
{
	public $des_ascenso;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_nota_total';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_nota_total, id_conf_asc_fecha', 'required'),
			array('id_nota_total, Cedula, Cod_Jerarquia, id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('num_nota_total', 'length', 'max'=>18),
			array('des_revisar', 'length', 'max'=>255),
			array('Fecha_Ingreso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_nota_total, Cedula, num_nota_total, Cod_Jerarquia, Fecha_Ingreso, des_revisar, id_conf_asc_fecha', 'safe', 'on'=>'search'),
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
			'id_nota_total' => 'Id Nota Total',
			'Cedula' => 'Cedula',
			'num_nota_total' => 'Num Nota Total',
			'Cod_Jerarquia' => 'Cod Jerarquia',
			'Fecha_Ingreso' => 'Fecha Ingreso',
			'des_revisar' => 'Des Revisar',
			'id_conf_asc_fecha' => 'Id Conf Asc Fecha',
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

		$criteria->compare('id_nota_total',$this->id_nota_total);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('num_nota_total',$this->num_nota_total,true);
		$criteria->compare('Cod_Jerarquia',$this->Cod_Jerarquia);
		$criteria->compare('Fecha_Ingreso',$this->Fecha_Ingreso,true);
		$criteria->compare('des_revisar',$this->des_revisar,true);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getNotasPorJerarquia($jerarquia, $id_cfa){
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('Cod_Jerarquia=:des1', 'AND');
            $criteria->addCondition('id_conf_asc_fecha=:des2');
            $criteria->order = 'num_nota_total DESC';  
            $criteria->params=array(':des1'=>$jerarquia->Cod_Jerarquia, ':des2'=>$id_cfa);

            if($criteria)
            	return $criteria;
            else
            	return null;
	}

	public function listFuncionarios()
	{		          
    	return CHtml::listData(Funcionarios::model()->findAll(),'Cedula','NombreCedula') ;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblAscNotaTotal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
