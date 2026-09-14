<?php

/**
 * This is the model class for table "tbl_asc_config_fecha_asc".
 *
 * The followings are the available columns in table 'tbl_asc_config_fecha_asc':
 * @property integer $id_conf_asc_fecha
 * @property string $fecha_proceso_asc
 * @property string $des_proceso_asc
 * @property string $des_estatus_cond
 * @property string $fecha_postulacion
 * @property tinyint $porc_academico
 * @property tinyint $porc_antiguedad
 * @property tinyint $porc_desempenho
 * @property tinyint $porc_mejoram_prof
 * @property tinyint $porc_cursos
 * @property tinyint $porc_condecor
 */
class FechaAsc extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_config_fecha_asc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('des_estatus_cond, fecha_proceso_asc, fecha_postulacion, porc_academico, porc_antiguedad, porc_desempenho, porc_mejoram_prof, porc_cursos, porc_condecor', 'required'),
			array('id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('des_proceso_asc, des_estatus_cond', 'length', 'max'=>15),
			array('porc_academico, porc_antiguedad, porc_desempenho, porc_mejoram_prof, porc_cursos, porc_condecor', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_conf_asc_fecha, fecha_proceso_asc, des_proceso_asc, des_estatus_cond, fecha_postulacion', 'safe', 'on'=>'search'),
			array('porc_condecor','validarPorcentajeCompleto'),//Validacion propia que permite sumar para verificar si da 100%
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
			'id_conf_asc_fecha' => 'Código de Ascenso',
			'fecha_proceso_asc' => 'Fecha de proceso de ascenso',
			'des_proceso_asc' => 'Descripción de proceso',
			'des_estatus_cond' => 'Estado del proceso',
			'fecha_postulacion' => 'Fecha de postulación',
			'porc_academico' => 'Porcentaje de nota de nivel académico',
			'porc_antiguedad' => 'Porcentaje de nota de antigüedad',
			'porc_desempenho' => 'Porcentaje de nota de desempeño',
			'porc_mejoram_prof' => 'Porcentaje de nota de mejora profesional',
			'porc_cursos' => 'Porcentaje de nota de cursos',
			'porc_condecor' => 'Porcentaje de nota de condecoraciones',
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

		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);
		$criteria->compare('fecha_proceso_asc',$this->fecha_proceso_asc,true);
		$criteria->compare('des_proceso_asc',$this->des_proceso_asc,true);
		$criteria->compare('des_estatus_cond',$this->des_estatus_cond,true);
		$criteria->compare('fecha_postulacion',$this->fecha_postulacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function getLastConfAscFecha()
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('des_proceso_asc=:des1', 'OR');
            $criteria->addCondition('des_estatus_cond=:des2', 'OR');  
            $criteria->params=array(':des1'=>'FINALIZADO', ':des2'=>'INACTIVO');
            $criteria->order = 'id_conf_asc_fecha DESC';
            $criteria->limit = 1;                    
            $Fecha_Asc = FechaAsc::model()->find($criteria);

            if($Fecha_Asc)
            	return $Fecha_Asc;
            else
            	return null;
	}

	/**
	 * Permite validar si los porcentajes ingresados dan 100% exactamente. De no ser así se muestra un error.
	 */
	public function validarPorcentajeCompleto(){
		$acum = 0;

		$acum += $this->porc_academico;
		$acum += $this->porc_antiguedad;
		$acum += $this->porc_desempenho;
		$acum += $this->porc_mejoram_prof;
		$acum += $this->porc_cursos;
		$acum += $this->porc_condecor;

		if ($acum != 100){
			$this->addError('','La suma de los porcentajes no es 100%');
		}

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FechaAsc the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getDescripcion(){
		return $this->fecha_proceso_asc.' '.$this->des_proceso_asc;
	}
	
	public function getLastPostulationDate()
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'fecha_postulacion DESC';
		$LastDate = FechaAsc::model()->find($criteria);

		if($LastDate)
		{
			$year = date('Y', strtotime($LastDate->fecha_postulacion));

			if($year == date('Y'))
				return $LastDate;
			else
				return null;
		}
		else
			return null;
	}

	public function getLastPromotionDate()
	{
		$criteria = new CDbCriteria;
		$criteria->order = 'fecha_proceso_asc DESC';
		$LastDate = FechaAsc::model()->find($criteria);

		if($LastDate)
		{
			$year = date('Y', strtotime($LastDate->fecha_proceso_asc));

			if($year == date('Y'))
				return $LastDate;
			else
				return null;
		}
		else
			return null;
	}
	public static function setFechaAscenso($cedula, $new_cod_jer, $fecha_proceso_asc, $des_ascenso){
		
		$FechaAscenso = FechaAscenso::model()->find('Cedula='.$cedula);
			
		if(is_null($FechaAscenso))
			$FechaAscenso = new FechaAscenso;
					
		$FechaAscenso->Cedula = $cedula;
		$FechaAscenso->Cod_Jerarquia = $new_cod_jer;
		if (is_null($fecha_proceso_asc))
			$FechaAscenso->fecha_ascenso = date('Y:i:s') ;
		else
			$FechaAscenso->fecha_ascenso = $fecha_proceso_asc;
		$FechaAscenso->des_ascenso = $des_ascenso;

		return $FechaAscenso;

	}

	public function check_in_range($start_date, $end_date, $evaluame) 
	{
	    $start_ts = strtotime($start_date);
	    $end_ts = strtotime($end_date);
	    $user_ts = strtotime($evaluame);
	    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
	}
	
	public static function obtenerUltimoId(){

		$sql = "SELECT MAX(`id_conf_asc_fecha`) AS ultimo FROM `tbl_asc_config_fecha_asc`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]['ultimo'];
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
