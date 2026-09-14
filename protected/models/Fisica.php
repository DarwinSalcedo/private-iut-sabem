<?php

/**
 * This is the model class for table "tbl_asc_fisica".
 *
 * The followings are the available columns in table 'tbl_asc_fisica':
 * @property double $id_fisica
 * @property double $Cedula
 * @property string $des_fisica_asistencia
 * @property string $des_fisica_siglas_asistencia
 * @property string $des_fisica_condicion
 * @property string $num_fisica
 * @property integer $id_conf_asc_fecha
 */
class Fisica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_fisica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('id_fisica, Cedula', 'numerical'),
			array('des_fisica_asistencia, des_fisica_siglas_asistencia, des_fisica_condicion', 'length', 'max'=>255),
			array('num_fisica', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_fisica, Cedula, des_fisica_asistencia, des_fisica_siglas_asistencia, des_fisica_condicion, num_fisica, id_conf_asc_fecha', 'safe', 'on'=>'search'),
			array('id_conf_asc_fecha', 'validarCedula'),
		);
	}
public function validarCedula($attributes,$params)
	{
		$conexion=yii::app()->db;
		$sql="SELECT cedula FROM tbl_asc_fisica WHERE cedula = '".$this->Cedula."' and id_conf_asc_fecha = ".$this->id_conf_asc_fecha."";
		$resultado=$conexion->createCommand($sql);   
		$filas=$resultado->query();
		
		foreach($filas as $fila)
		{
			if ($this->Cedula === $fila['cedula'])
			{				
				$this->addError('Cedula','Ya existe un examen registrado en este proceso');			
				break;
			}
		}	
	
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
			'id_fisica' => 'Identificacion de  Fisica',
			'Cedula' => 'Cedula',
			'des_fisica_asistencia' => 'Asistencia',
			'des_fisica_siglas_asistencia' => 'Siglas Asistencia',
			'des_fisica_condicion' => 'Condicion',
			'num_fisica' => 'Resultado',
			'id_conf_asc_fecha' =>'Fecha de postulacion',
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

		$criteria->compare('id_fisica',$this->id_fisica);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('des_fisica_asistencia',$this->des_fisica_asistencia,true);
		$criteria->compare('des_fisica_siglas_asistencia',$this->des_fisica_siglas_asistencia,true);
		$criteria->compare('des_fisica_condicion',$this->des_fisica_condicion,true);
		$criteria->compare('num_fisica',$this->num_fisica,true);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fisica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
            public static function CargarModelo($cedula)
	{
            $model= Fisica::model()->find("(cedula)=?",array($cedula));		
		if($model===null)
                        return false;
			#throw new CHttpException(404,' not exist.');
		return $model;  		
	}

		public function MenuCedula()
	{		
		return CHtml::listData(Funcionarios::model()->findAll(),'Cedula','NombreCedula') ;
	}
		public function MenuFecha()
	{		
		return CHtml::listData(FechaAsc::model()->findAll(),'id_conf_asc_fecha','descripcion') ;
	}
	static	public function buscarUltimo()
	{
		$sql="SELECT MAX(`id_fisica`) FROM  `tbl_asc_fisica`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_fisica`)" ] + 1;
	}

	static	public function actualizar($id)
	{
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		$sql="UPDATE  `$cadena[1]`.`tbl_asc_fisica` SET 
		 `des_fisica_asistencia` =  'ASISTENTE',
			`des_fisica_siglas_asistencia` =  'A',
			`des_fisica_condicion` =  'APTO',
			`num_fisica` =  '20.000' 
			WHERE CONCAT(  `tbl_asc_fisica`.`id_fisica` ) =  '$id';";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

		static public function insertar($cedula,$recepcion)
	{
		$id = Fisica::buscarUltimo();
		$fecha=FechaAsc::obtenerUltimoId();
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		$sql="INSERT INTO  `$cadena[1]`.`tbl_asc_fisica` (
		`id_fisica` ,
		`Cedula` ,
		`des_fisica_asistencia` ,
		`des_fisica_siglas_asistencia` ,
		`des_fisica_condicion` ,
		`num_fisica` ,
		`id_conf_asc_fecha`
		)
		VALUES ('$id',  '$cedula',   'ASISTENTE' , 'A' , 'APTO', '20.000' , '$fecha') ;";
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
