<?php

/**
 * This is the model class for table "tbl_asc_desempenho".
 *
 * The followings are the available columns in table 'tbl_asc_desempenho':
 * @property double $id_desempe
 * @property double $Cedula
 * @property string $num_responsabilidad
 * @property string $num_productividad
 * @property string $num_conocimiento
 * @property string $num_capacidad_delegar
 * @property string $num_order_planificacion
 * @property string $num_TotDesemPorc
 * @property string $num_TotDesemNota
 * @property integer $id_evaluador
 * @property integer $id_conf_asc_fecha
 */
class Desempenho extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_desempenho';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_evaluador, id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('id_desempe, Cedula', 'numerical'),
			array('num_responsabilidad, num_productividad, num_conocimiento, num_capacidad_delegar, num_order_planificacion, num_TotDesemPorc, num_TotDesemNota', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_desempe, Cedula, num_responsabilidad, num_productividad, num_conocimiento, num_capacidad_delegar, num_order_planificacion, num_TotDesemPorc, num_TotDesemNota, id_evaluador, id_conf_asc_fecha', 'safe', 'on'=>'search'),
		  

          #array ( 'num_TotDesemNota' , 'filter' , 'filter' => array ( $this , ' keepProductCode ' ) ) ,

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
		'cedula' => array(self::BELONGS_TO, 'Funcionarios', 'Cedula'),
		'fecha' => array(self::BELONGS_TO, 'FechaAsc', 'id_conf_asc_fecha'),
		'evaluador' => array(self::BELONGS_TO, 'Evaluador', 'id_evaluador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_desempe' => 'Identificacion de Desempeño',
			'Cedula' => 'Cedula',
			'num_responsabilidad' => 'Responsabilidad',
			'num_productividad' => 'Productividad',
			'num_conocimiento' => 'Conocimiento',
			'num_capacidad_delegar' => 'Capacidad de Delegar',
			'num_order_planificacion' => 'Orden/Planificacion',
			'num_TotDesemPorc' => 'Notsa en porcentaje',
			'num_TotDesemNota' => 'Nota total',
			'id_evaluador' => 'Identificacion de  Evaluador',
			'id_conf_asc_fecha' => 'Fecha de postulacion',
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

		$criteria->compare('id_desempe',$this->id_desempe);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('num_responsabilidad',$this->num_responsabilidad,true);
		$criteria->compare('num_productividad',$this->num_productividad,true);
		$criteria->compare('num_conocimiento',$this->num_conocimiento,true);
		$criteria->compare('num_capacidad_delegar',$this->num_capacidad_delegar,true);
		$criteria->compare('num_order_planificacion',$this->num_order_planificacion,true);
		$criteria->compare('num_TotDesemPorc',$this->num_TotDesemPorc,true);
		$criteria->compare('num_TotDesemNota',$this->num_TotDesemNota,true);
		$criteria->compare('id_evaluador',$this->id_evaluador);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Desempenho the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	static public function buscarUltimo()
	{
		$sql="SELECT MAX(`id_desempe`) FROM  `tbl_asc_desempenho`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_desempe`)" ] + 1;
	}
        
	public function MenuCedula()
	{		
		return CHtml::listData(Funcionarios::model()->findAll(),'Cedula','NombreCedula') ;
	}
        
           //buscar por la bd la cd y cargar los atributos
        public static function CargarModelo($cedula)
	{
		$conf_asc_fecha=Postularse::model()->getFechaAsc();
		$num=($conf_asc_fecha == null)?0:$conf_asc_fecha->id_conf_asc_fecha;
		
		$criteria = new CDbCriteria(
			array(				
				'condition'=>'Cedula=:ci and id_conf_asc_fecha=:conf_fech',	
				'params'=>array(
							':ci'=>$cedula,
							':conf_fech'=>$num,
						)
			)
		);
            $model= Desempenho::model()->find($criteria);
		
		if($model===null)
			return false;# new CHttpException(404,' not exist.');
		return $model;     
		
	}


	public function MenuEvaluador()
	{		
		return CHtml::listData(Evaluador::model()->findAll(),'id_evaluador','nombreCedula') ;
	}
	public function MenuFecha()
	{		
		return CHtml::listData(FechaAsc::model()->findAll(),'id_conf_asc_fecha','descripcion') ;
	}

	static	public function actualizar($id)
	{
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		
		$sql="UPDATE  `$cadena[1]`.`tbl_asc_desempenho` SET 
		 `num_responsabilidad` =  '0.800',
		`num_productividad` =  '0.800',
		`num_conocimiento` =  '0.800',
		`num_capacidad_delegar` =  '0.800',
		`num_order_planificacion` =  '0.800',
		`num_TotDesemPorc` =  '4.000',
		`num_TotDesemNota` =  '20.000' WHERE CONCAT(  `tbl_asc_desempenho`.`id_desempe` ) =  '$id';";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

		static public function insertar($cedula,$recepcion)
	{
		$id = Desempenho::buscarUltimo();
		$fecha=FechaAsc::obtenerUltimoId();

		/* ----------evaluador ---------- */
		$evaluador=new Evaluador;
			
			$ide = $evaluador->buscarUltimo();
		
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		
		    $evaluador->guardar($ide,
		    	$cedula ,
		    	$recepcion,
		    	$fecha );
		/* ----------evaluador ---------- */
		$sql="INSERT INTO  `$cadena[1]`.`tbl_asc_desempenho` (
			`id_desempe` ,
			`Cedula` ,
			`num_responsabilidad` ,
			`num_productividad` ,
			`num_conocimiento` ,
			`num_capacidad_delegar` ,
			`num_order_planificacion` ,
			`num_TotDesemPorc` ,
			`num_TotDesemNota` ,
			`id_evaluador` ,
			`id_conf_asc_fecha`)
			VALUES ('$id',  '$cedula',  '0.800',  '0.800',  '0.800',  '0.800',  '0.800', '4.000',  '20.000',  '$ide',  '".$fecha."');";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
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
