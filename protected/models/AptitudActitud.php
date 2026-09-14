<?php

/**
 * This is the model class for table "tbl_asc_aptitud_actitud".
 *
 * The followings are the available columns in table 'tbl_asc_aptitud_actitud':
 * @property double $id_aptitud
 * @property double $Cedula
 * @property string $num_puntualidad_asist
 * @property string $num_presentacion_apar
 * @property string $num_actitud_institucion
 * @property string $num_actitud_superiores
 * @property string $num_cooperacion
 * @property string $num_TotApPorc
 * @property string $num_TotAcNota
 * @property double $id_evaluador
 * @property integer $id_conf_asc_fecha
 */
class AptitudActitud extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_aptitud_actitud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_evaluador, id_conf_asc_fecha', 'required'),
			array('id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('id_aptitud, Cedula, id_evaluador', 'numerical'),
			array('num_puntualidad_asist, num_presentacion_apar, num_actitud_institucion, num_actitud_superiores, num_cooperacion, num_TotApPorc, num_TotAcNota', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_aptitud, Cedula, num_puntualidad_asist, num_presentacion_apar, num_actitud_institucion, num_actitud_superiores, num_cooperacion, num_TotApPorc, num_TotAcNota, id_evaluador, id_conf_asc_fecha', 'safe', 'on'=>'search'),
		);
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
		'evaluador' => array(self::BELONGS_TO, 'Evaluador', 'id_evaluador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_aptitud' => 'Identificador de Aptitud',
			'Cedula' => 'Cedula',
			'num_puntualidad_asist' => 'Puntualidad y Asistencia',
			'num_presentacion_apar' => 'Presentacion/Personalidad',
			'num_actitud_institucion' => 'Actitud con Institucion',
			'num_actitud_superiores' => 'Actitud con Superiores',
			'num_cooperacion' => 'Cooperacion',
			'num_TotApPorc' => 'Nota en porcentaje',
			'num_TotAcNota' => 'Nota total',
			'id_evaluador' => 'Identificacion de Evaluador',
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

		$criteria->compare('id_aptitud',$this->id_aptitud);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('num_puntualidad_asist',$this->num_puntualidad_asist,true);
		$criteria->compare('num_presentacion_apar',$this->num_presentacion_apar,true);
		$criteria->compare('num_actitud_institucion',$this->num_actitud_institucion,true);
		$criteria->compare('num_actitud_superiores',$this->num_actitud_superiores,true);
		$criteria->compare('num_cooperacion',$this->num_cooperacion,true);
		$criteria->compare('num_TotApPorc',$this->num_TotApPorc,true);
		$criteria->compare('num_TotAcNota',$this->num_TotAcNota,true);
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
	 * @return AptitudActitud the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
		  $model= AptitudActitud::model()->find($criteria);
		
		if($model===null)
			return false;#throw new CHttpException(404,' not exist.');
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
		$sql="SELECT MAX(`id_aptitud`) FROM  `tbl_asc_aptitud_actitud`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_aptitud`)" ] + 1;
	}

	static	public function actualizar($id)
	{
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		$sql="UPDATE  `$cadena[1]`.`tbl_asc_aptitud_actitud` SET 
		 `num_puntualidad_asist` =  '0.800',
		`num_presentacion_apar` =  '0.800',
		`num_actitud_institucion` =  '0.800',
		`num_actitud_superiores` =  '0.800',
		`num_cooperacion` =  '0.800',
		`num_TotApPorc` =  '4.000',
		`num_TotAcNota` =  '20.000' 
		WHERE CONCAT(  `tbl_asc_aptitud_actitud`.`id_aptitud` ) =  '$id';";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

		static public function insertar($cedula,$recepcion)
	{
		$id = AptitudActitud::buscarUltimo();
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
		$sql="INSERT INTO  `$cadena[1]`.`tbl_asc_aptitud_actitud` (
		`id_aptitud` ,
		`Cedula` ,
		`num_puntualidad_asist` ,
		`num_presentacion_apar` ,
		`num_actitud_institucion` ,
		`num_actitud_superiores` ,
		`num_cooperacion` ,
		`num_TotApPorc` ,
		`num_TotAcNota` ,
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
