<?php

/**
 * This is the model class for table "tbl_asc_espiritu_bomberil".
 *
 * The followings are the available columns in table 'tbl_asc_espiritu_bomberil':
 * @property double $id_espiritu_bom
 * @property double $Cedula
 * @property string $num_disciplinado
 * @property string $num_demuestra_mistica
 * @property string $num_abnegado
 * @property string $num_demuestra_inden
 * @property string $num_demuestra_comp
 * @property string $num_TotEspPorc
 * @property string $num_TotEspNota
 * @property double $id_evaluador
 * @property integer $id_conf_asc_fecha
 */
class EspirituBomberil extends CActiveRecord
{
	public $id;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_espiritu_bomberil';
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
			array('id_espiritu_bom, Cedula, id_evaluador', 'numerical'),
			array('num_disciplinado, num_demuestra_mistica, num_abnegado, num_demuestra_inden, num_demuestra_comp, num_TotEspPorc, num_TotEspNota', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_espiritu_bom, Cedula, num_disciplinado, num_demuestra_mistica, num_abnegado, num_demuestra_inden, num_demuestra_comp, num_TotEspPorc, num_TotEspNota, id_evaluador, id_conf_asc_fecha', 'safe', 'on'=>'search'),
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
			'id_espiritu_bom' => 'Numero de identificacion',
			'Cedula' => 'Cedula',
			'num_disciplinado' => 'Disciplina',
			'num_demuestra_mistica' => ' Demuestra  Mistica',
			'num_abnegado' => 'Abnegado',
			'num_demuestra_inden' => 'Demuestra Indentidad',
			'num_demuestra_comp' => 'Demuestra Competencia',
			'num_TotEspPorc' => 'Nota en porcentaje',
			'num_TotEspNota' => 'Nota total',
			'id_evaluador' => 'Identicador del Evaluador',
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

		$criteria->compare('id_espiritu_bom',$this->id_espiritu_bom);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('num_disciplinado',$this->num_disciplinado,true);
		$criteria->compare('num_demuestra_mistica',$this->num_demuestra_mistica,true);
		$criteria->compare('num_abnegado',$this->num_abnegado,true);
		$criteria->compare('num_demuestra_inden',$this->num_demuestra_inden,true);
		$criteria->compare('num_demuestra_comp',$this->num_demuestra_comp,true);
		$criteria->compare('num_TotEspPorc',$this->num_TotEspPorc,true);
		$criteria->compare('num_TotEspNota',$this->num_TotEspNota,true);
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
	 * @return EspirituBomberil the static model class
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
            $model=  EspirituBomberil::model()->find($criteria);
		
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
		$sql="SELECT MAX(`id_espiritu_bom`) FROM  `tbl_asc_espiritu_bomberil`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_espiritu_bom`)" ] + 1;
	}

	static	public function actualizar($id)
	{
		$sql="UPDATE  `bomgesh`.`tbl_asc_espiritu_bomberil` SET 
			 `num_disciplinado` =  '0.800',
			`num_demuestra_mistica` =  '0.800',
			`num_abnegado` =  '0.800',
			`num_demuestra_inden` =  '0.800',
			`num_demuestra_comp` =  '0.800',
			`num_TotEspPorc` =  '4.000',
			`num_TotEspNota` =  '20.000'
			 WHERE CONCAT(  `tbl_asc_espiritu_bomberil`.`id_espiritu_bom` ) =  '$id';";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

		static public function insertar($cedula,$recepcion)
	{
		$id = EspirituBomberil::buscarUltimo();
		$fecha=FechaAsc::obtenerUltimoId();

		/* ----------evaluador ---------- */
		$evaluador=new Evaluador;
			
			$ide = $evaluador->buscarUltimo();
		
		  
		    $evaluador->guardar($ide,
		    	$cedula ,
		    	$recepcion,
		    	$fecha );
		/* ----------evaluador ---------- */
		$sql="INSERT INTO  `tbl_asc_espiritu_bomberil` (
		`id_espiritu_bom` ,
		`Cedula` ,
		`num_disciplinado` ,
		`num_demuestra_mistica` ,
		`num_abnegado` ,
		`num_demuestra_inden` ,
		`num_demuestra_comp` ,
		`num_TotEspPorc` ,
		`num_TotEspNota` ,
		`id_evaluador` ,
		`id_conf_asc_fecha`
		)
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
