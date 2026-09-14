<?php

/**
 * This is the model class for table "tbl_asc_antidoping".
 *
 * The followings are the available columns in table 'tbl_asc_antidoping':
 * @property double $id_antidoping
 * @property double $Cedula
 * @property string $des_antid_asistencia
 * @property string $des_antid_siglas_asistencia
 * @property string $des_antid_condicion
 * @property integer $id_conf_asc_fecha
 */
class Antidoping extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_antidoping';
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
			array('id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('id_antidoping, Cedula', 'numerical'),
			array('des_antid_asistencia, des_antid_siglas_asistencia, des_antid_condicion', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_antidoping, Cedula, des_antid_asistencia, des_antid_siglas_asistencia, des_antid_condicion, id_conf_asc_fecha', 'safe', 'on'=>'search'),
			#array('id_conf_asc_fecha', 'validarCedula'),
		);
	}

	public function validarCedula($attributes,$params)
	{
		$conexion=yii::app()->db;
		$sql="SELECT cedula FROM tbl_asc_antidoping WHERE cedula = '".$this->Cedula."' and id_conf_asc_fecha = ".$this->id_conf_asc_fecha."";
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
		return array('cedula' => array(self::BELONGS_TO, 'Funcionarios', 'Cedula'),
		'fecha' => array(self::BELONGS_TO, 'FechaAsc', 'id_conf_asc_fecha'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_antidoping' => 'Identificacion de  Antidoping',
			'Cedula' => 'Cedula',
			'des_antid_asistencia' => 'Asistencia',
			'des_antid_siglas_asistencia' => 'Siglas Asistencia',
			'des_antid_condicion' => 'Condicion',
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

		$criteria->compare('id_antidoping',$this->id_antidoping);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('des_antid_asistencia',$this->des_antid_asistencia,true);
		$criteria->compare('des_antid_siglas_asistencia',$this->des_antid_siglas_asistencia,true);
		$criteria->compare('des_antid_condicion',$this->des_antid_condicion,true);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Antidoping the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
            public static function CargarModelo($cedula)
	{
            $model= Antidoping::model()->find("(cedula)=?",array($cedula));		
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
static		public function buscarUltimo()
	{
		$sql="SELECT MAX(`id_antidoping`) FROM  `tbl_asc_antidoping`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_antidoping`)" ] + 1;
	}

		static	public function actualizar($id)
	{
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		$sql="UPDATE  `$cadena[1]`.`tbl_asc_antidoping` SET  
				`des_antid_asistencia` =  'ASISTENTE',
				`des_antid_siglas_asistencia` =  'A',
				`des_antid_condicion` =  'NEGATIVO'
				 WHERE CONCAT(  `tbl_asc_antidoping`.`id_antidoping` ) =  '$id';";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

		static public function insertar($cedula,$recepcion)
	{
		$id = Antidoping::buscarUltimo();
		$fecha=FechaAsc::obtenerUltimoId();
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		$sql="INSERT INTO  `$cadena[1]`.`tbl_asc_antidoping` (
			`id_antidoping` ,
			`Cedula` ,
			`des_antid_asistencia` ,
			`des_antid_siglas_asistencia` ,
			`des_antid_condicion` ,
			`id_conf_asc_fecha`	)
		VALUES ('$id',  '$cedula',   'ASISTENTE' , 'A' , 'NEGATIVO', '$fecha') ;";
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
