<?php

/**
 * This is the model class for table "tbl_asc_evaluador".
 *
 * The followings are the available columns in table 'tbl_asc_evaluador':
 * @property double $id_evaluador
 * @property double $Cedula
 * @property double $CedEvaluador
 * @property integer $id_conf_asc_fecha
 */
class Evaluador extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_evaluador';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_evaluador, Cedula, CedEvaluador, id_conf_asc_fecha', 'required'),
			array('id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('id_evaluador, Cedula, CedEvaluador', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_evaluador, Cedula, CedEvaluador, id_conf_asc_fecha', 'safe', 'on'=>'search'),
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
			'cedula' => array(self::BELONGS_TO, 'Funcionarios', 'cedula'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_evaluador' => 'Id Evaluador',
			'Cedula' => 'Cedula',
			'CedEvaluador' => 'Ced Evaluador',
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

		$criteria->compare('id_evaluador',$this->id_evaluador);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('CedEvaluador',$this->CedEvaluador);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evaluador the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
                 public static function CargarModelo($cedula)
	{
            $model= Evaluador::model()->find("(cedula)=?",array($cedula));		
		if($model===null)
                        return false;
			#throw new CHttpException(404,' not exist.');
		return $model;  		
	}


	public function buscarUltimo()
	{
		$sql="SELECT MAX(`id_evaluador`) FROM  `tbl_asc_evaluador`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_evaluador`)" ] + 1;
	}



	public function getNombreCedula()
	{	
		 $model= new Funcionarios;
		$data=$model::CargarModelo($this->CedEvaluador);
		return $data->Nombre.' '.$data->Apellidos.' '.$this->CedEvaluador ;
	}


	public function guardar($id = null,$cedula,$CedEvaluador,$fecha)
	{
		$conexion=yii::app()->db;		
		
		#if($id===null)
			#$id=$this->buscarUltimo();

		$consulta="insert into tbl_asc_evaluador(id_evaluador,Cedula,CedEvaluador,id_conf_asc_fecha)";
		$consulta .="values (".$id.",'$cedula','$CedEvaluador','$fecha')";
		$resultado=$conexion->createCommand($consulta)->execute();

		
		
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
