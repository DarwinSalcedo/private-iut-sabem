<?php

/**
 * This is the model class for table "tbl_asc_antiguedad".
 *
 * The followings are the available columns in table 'tbl_asc_antiguedad':
 * @property double $id_antiguedad
 * @property double $Cedula
 * @property integer $num_anos
 * @property string $num_TotAntigPorc
 * @property string $num_TotAntigNota
 * @property integer $id_conf_asc_fecha
 */
class Antiguedad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_antiguedad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_conf_asc_fecha', 'required'),
			array('num_anos, id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('id_antiguedad, Cedula', 'numerical'),
			array('num_TotAntigPorc, num_TotAntigNota', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_antiguedad, Cedula, num_anos, num_TotAntigPorc, num_TotAntigNota, id_conf_asc_fecha', 'safe', 'on'=>'search'),
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
			'id_antiguedad' => 'Id Antiguedad',
			'Cedula' => 'Cedula',
			'num_anos' => 'Num Anos',
			'num_TotAntigPorc' => 'Num Tot Antig Porc',
			'num_TotAntigNota' => 'Num Tot Antig Nota',
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

		$criteria->compare('id_antiguedad',$this->id_antiguedad);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('num_anos',$this->num_anos);
		$criteria->compare('num_TotAntigPorc',$this->num_TotAntigPorc,true);
		$criteria->compare('num_TotAntigNota',$this->num_TotAntigNota,true);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Antiguedad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
		public  function cargarCedula($cd)
	{
		$model=Antiguedad::model()->find("(cedula)=?",array($cd));
		
		if($model=== null)
			return null;
			#throw new CHttpException(404,' no existe antiguedad asociada a el funcionario');
		return $model;
	}

	public function buscarUltimo()
	{
		$sql="SELECT MAX(`id_antiguedad`) FROM  `tbl_asc_antiguedad`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_antiguedad`)" ] + 1;
	}

		public function guardarAntiguedad($cedula,$fecha)
	{
		$conexion=yii::app()->db;		
		$id=$this->buscarUltimo();
		$anos=$this->calcularAnos($fecha);
		$consulta="insert into tbl_asc_antiguedad(id_antiguedad,Cedula,num_anos,num_TotAntigPorc,num_TotAntigNota,id_conf_asc_fecha)";
		$consulta .="values (".$id.",'$cedula','$anos','$anos','$anos','$anos')";
		$resultado=$conexion->createCommand($consulta)->execute();

		
		
	}

	public function calcularAnos($fecha)
	{
		$date= explode('-', $fecha);   
	    $anio = $date[0];  
	    $anioc =date("Y"); 
	  return  $anos =  $anioc-$anio;
	}

}
