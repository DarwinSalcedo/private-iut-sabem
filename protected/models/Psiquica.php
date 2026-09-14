<?php

/**
 * This is the model class for table "tbl_asc_psiquica".
 *
 * The followings are the available columns in table 'tbl_asc_psiquica':
 * @property double $id_psiquica
 * @property double $Cedula
 * @property string $des_psi_asistencia
 * @property string $des_psi_siglas_asistencia
 * @property string $des_psi_condicion
 * @property integer $id_conf_asc_fecha
 */
class Psiquica extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_psiquica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_conf_asc_fecha, des_psi_asistencia, des_psi_condicion', 'required'),
			array('id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('id_psiquica, Cedula', 'numerical'),
			array('des_psi_asistencia, des_psi_siglas_asistencia, des_psi_condicion', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_psiquica, Cedula, des_psi_asistencia, des_psi_siglas_asistencia, des_psi_condicion, id_conf_asc_fecha', 'safe', 'on'=>'search'),
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
			'id_psiquica' => 'Id Psiquica',
			'Cedula' => 'Cedula',
			'des_psi_asistencia' => 'Asistencia',
			'des_psi_siglas_asistencia' => 'Sigla de asistencia',
			'des_psi_condicion' => 'Condición',
			'id_conf_asc_fecha' => 'Fecha de proceso de ascenso',
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

		$criteria->compare('id_psiquica',$this->id_psiquica);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('des_psi_asistencia',$this->des_psi_asistencia,true);
		$criteria->compare('des_psi_siglas_asistencia',$this->des_psi_siglas_asistencia,true);
		$criteria->compare('des_psi_condicion',$this->des_psi_condicion,true);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Psiquica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



	public function MenuFecha()
	{		
		return CHtml::listData(FechaAsc::model()->findAll(),'id_conf_asc_fecha','descripcion') ;
	}

	public function MenuCedula()
	{		
		return CHtml::listData(Funcionarios::model()->findAll(),'Cedula','NombreCedula') ;
	}

	//carga con la ultima configuracion ascenso fecha
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
		
		$model= Psiquica::model()->find($criteria);
		return $model;	
	}
		public function behaviors()
{
    return array(
        // Classname => path to Class
        'ActiveRecordLogableBehavior'=>
            'application.behaviors.ActiveRecordLogableBehavior',
    );
}

static	public function buscarUltimo()
	{
		$sql="SELECT MAX(`id_psiquica`) FROM  `tbl_asc_psiquica`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_psiquica`)" ] + 1;
	}
	static	public function actualizar($id)
	{
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		$sql="UPDATE  `$cadena[1]`.`tbl_asc_psiquica` SET 
		 `des_psi_asistencia` =  'ASISTENTE',
		`des_psi_siglas_asistencia` =  'A',
		`des_psi_condicion` =  'APTO' 
		WHERE CONCAT(  `tbl_asc_psiquica`.`id_psiquica` ) =  '$id';";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

		static public function insertar($cedula,$recepcion)
	{
		$id = ExamenMedico::buscarUltimo();
		$fecha=FechaAsc::obtenerUltimoId();
		$cadena = explode("dbname=", yii::app()->db->connectionString);
		$sql="INSERT INTO  `$cadena[1]`.`tbl_asc_psiquica` (
			`id_psiquica` ,
			`Cedula` ,
			`des_psi_asistencia` ,
			`des_psi_siglas_asistencia` ,
			`des_psi_condicion` ,
			`id_conf_asc_fecha`	)

			VALUES ('$id',  '$cedula','ASISTENTE' , 'A' , 'APTO',  '$fecha'	);";
		$num=yii::app()->db->createCommand($sql)->execute();
		if($num===null)
			return false;
		return true;
	}

}
