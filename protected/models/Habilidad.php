<?php

/**
 * This is the model class for table "tbl_asc_habilidad".
 *
 * The followings are the available columns in table 'tbl_asc_habilidad':
 * @property double $id_habilidad
 * @property double $Cedula
 * @property string $num_carisma_lider
 * @property string $num_iniciativa_crea
 * @property string $num_manejo_conflitos
 * @property string $num_coordinacion
 * @property string $num_toma_decisiones
 * @property string $num_TotHaPorc
 * @property string $num_TotHaNota
 * @property double $id_evaluador
 * @property integer $id_conf_asc_fecha
 */
class Habilidad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_habilidad';
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
			array('id_habilidad, Cedula, id_evaluador', 'numerical'),
			array('num_carisma_lider, num_iniciativa_crea, num_manejo_conflitos, num_coordinacion, num_toma_decisiones, num_TotHaPorc, num_TotHaNota', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_habilidad, Cedula, num_carisma_lider, num_iniciativa_crea, num_manejo_conflitos, num_coordinacion, num_toma_decisiones, num_TotHaPorc, num_TotHaNota, id_evaluador, id_conf_asc_fecha', 'safe', 'on'=>'search'),
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
			'id_habilidad' => 'Identificacion de Habilidad',
			'Cedula' => 'Cedula',
			'num_carisma_lider' => 'Carisma de Lider',
			'num_iniciativa_crea' => 'Iniciativa/Creatividad',
			'num_manejo_conflitos' => 'Manejo de Conflitos',
			'num_coordinacion' => 'Coordinacion',
			'num_toma_decisiones' => 'Toma Decisiones',
			'num_TotHaPorc' => 'Nota en porcentaje',
			'num_TotHaNota' => 'Nota total',
			'id_evaluador' => 'Identificacion del Evaluador',
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

		$criteria->compare('id_habilidad',$this->id_habilidad);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('num_carisma_lider',$this->num_carisma_lider,true);
		$criteria->compare('num_iniciativa_crea',$this->num_iniciativa_crea,true);
		$criteria->compare('num_manejo_conflitos',$this->num_manejo_conflitos,true);
		$criteria->compare('num_coordinacion',$this->num_coordinacion,true);
		$criteria->compare('num_toma_decisiones',$this->num_toma_decisiones,true);
		$criteria->compare('num_TotHaPorc',$this->num_TotHaPorc,true);
		$criteria->compare('num_TotHaNota',$this->num_TotHaNota,true);
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
	 * @return Habilidad the static model class
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
		 $model= Habilidad::model()->find($criteria);
		
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
		$sql="SELECT MAX(`id_habilidad`) FROM  `tbl_asc_habilidad`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_habilidad`)" ] + 1;
	}

		static	public function actualizar($id)
	{	$cadena = explode("dbname=", yii::app()->db->connectionString);
		
		$sql="UPDATE  `$cadena[1]`.`tbl_asc_habilidad` SET  
		`num_carisma_lider` =  '0.80',
		`num_iniciativa_crea` =  '0.80',
		`num_manejo_conflitos` =  '0.80',
		`num_coordinacion` =  '0.80',
		`num_toma_decisiones` =  '0.80',
		`num_TotHaPorc` =  '4.00',
		`num_TotHaNota` =  '20.00' WHERE CONCAT(  `tbl_asc_habilidad`.`id_habilidad` ) =  '$id';";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

		static public function insertar($cedula,$recepcion)
	{
		$id = Habilidad::buscarUltimo();
		$fecha=FechaAsc::obtenerUltimoId();

		/* ----------evaluador ---------- */
		$evaluador=new Evaluador;
			
			$ide = $evaluador->buscarUltimo();
		
		  
		    $evaluador->guardar($ide,
		    	$cedula ,
		    	$recepcion,
		    	$fecha );
		/* ----------evaluador ---------- */
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		$sql="INSERT INTO  `$cadena[1]`.`tbl_asc_habilidad` (
		`id_habilidad` ,
		`Cedula` ,
		`num_carisma_lider` ,
		`num_iniciativa_crea` ,
		`num_manejo_conflitos` ,
		`num_coordinacion` ,
		`num_toma_decisiones` ,
		`num_TotHaPorc` ,
		`num_TotHaNota` ,
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
