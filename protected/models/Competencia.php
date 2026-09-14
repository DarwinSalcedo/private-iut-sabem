<?php

/**
 * This is the model class for table "tbl_asc_competencia".
 *
 * The followings are the available columns in table 'tbl_asc_competencia':
 * @property double $id_competencia
 * @property double $Cedula
 * @property string $num_demuestra_eficaz
 * @property string $num_respetado_meritos
 * @property string $num_nunca_decisi_impul
 * @property string $num_habla_diccion_cohe
 * @property string $num_actualizado_bom
 * @property string $num_TotComPorc
 * @property string $num_TotComNota
 * @property double $id_evaluador
 * @property integer $id_conf_asc_fecha
 */
class Competencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_competencia';
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
			array('id_competencia, Cedula, id_evaluador', 'numerical'),
			array('num_demuestra_eficaz, num_respetado_meritos, num_nunca_decisi_impul, num_habla_diccion_cohe, num_actualizado_bom, num_TotComPorc, num_TotComNota', 'length', 'max'=>18),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_competencia, Cedula, num_demuestra_eficaz, num_respetado_meritos, num_nunca_decisi_impul, num_habla_diccion_cohe, num_actualizado_bom, num_TotComPorc, num_TotComNota, id_evaluador, id_conf_asc_fecha', 'safe', 'on'=>'search'),
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
			'id_competencia' => 'Identificacion de Competencia',
			'Cedula' => 'Cedula',
			'num_demuestra_eficaz' => 'Eficaz',
			'num_respetado_meritos' => 'Respeta Meritos',
			'num_nunca_decisi_impul' => 'Decisiones Impulsivas',
			'num_habla_diccion_cohe' => 'Habla/Diccion/Coherencia',
			'num_actualizado_bom' => 'Actualizado/Bombero',
			'num_TotComPorc' => 'Nota en porcentaje',
			'num_TotComNota' => 'Nota total',
			'id_evaluador' => 'Identicador del Evaluado',
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

		$criteria->compare('id_competencia',$this->id_competencia);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('num_demuestra_eficaz',$this->num_demuestra_eficaz,true);
		$criteria->compare('num_respetado_meritos',$this->num_respetado_meritos,true);
		$criteria->compare('num_nunca_decisi_impul',$this->num_nunca_decisi_impul,true);
		$criteria->compare('num_habla_diccion_cohe',$this->num_habla_diccion_cohe,true);
		$criteria->compare('num_actualizado_bom',$this->num_actualizado_bom,true);
		$criteria->compare('num_TotComPorc',$this->num_TotComPorc,true);
		$criteria->compare('num_TotComNota',$this->num_TotComNota,true);
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
	 * @return Competencia the static model class
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
            $model= Competencia::model()->find($criteria);		
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
		$sql="SELECT MAX(`id_competencia`) FROM  `tbl_asc_competencia`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_competencia`)" ] + 1;
	}
	static	public function actualizar($id)
	{
		$sql="UPDATE  `bomgesh`.`tbl_asc_competencia` SET 
		 `num_demuestra_eficaz` =  '0.800',
		`num_respetado_meritos` =  '0.800',
		`num_nunca_decisi_impul` =  '0.800',
		`num_habla_diccion_cohe` =  '0.800',
		`num_actualizado_bom` =  '0.800',
		`num_TotComPorc` =  '4.000',
		`num_TotComNota` =  '20.000' 
		WHERE CONCAT(  `tbl_asc_competencia`.`id_competencia` ) =  '$id';";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

		static public function insertar($cedula,$recepcion)
	{
		$id = Competencia::buscarUltimo();
		$fecha=FechaAsc::obtenerUltimoId();

		/* ----------evaluador ---------- */
		$evaluador=new Evaluador;
			
			$ide = $evaluador->buscarUltimo();
		
		  
		    $evaluador->guardar($ide,
		    	$cedula ,
		    	$recepcion,
		    	$fecha );
		/* ----------evaluador ---------- */
		$competencia = new Competencia;
		$competencia->Cedula = $cedula;
		$competencia->num_demuestra_eficaz = 0.800;
		$competencia->num_respetado_meritos = 0.800;
		$competencia->num_nunca_decisi_impul = 0.800;
		$competencia->num_habla_diccion_cohe = 0.800;
		$competencia->num_actualizado_bom = 0.800;
		$competencia->num_TotComPorc = 4.000;
		$competencia->num_TotComNota = 20.000;
		$competencia->id_evaluador = $ide;
		$competencia->id_conf_asc_fecha = $fecha;
		if($competencia->save(false))
			return true;
		else
			return false;

	/**	$sql="INSERT INTO  `bomgesh_test`.`tbl_asc_competencia` (		
		`Cedula` 
		`num_demuestra_eficaz` ,
		`num_respetado_meritos` ,
		`num_nunca_decisi_impul` ,
		`num_habla_diccion_cohe` ,
		`num_actualizado_bom` ,
		`num_TotComPorc` ,
		`num_TotComNota` ,
		`id_evaluador` ,
		`id_conf_asc_fecha`)
		VALUES ('$cedula',  '0.800',  '0.800',  '0.800',  '0.800',  '0.800', '4.000',  '20.000',  '$ide',  '".$fecha."');";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;**/
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

