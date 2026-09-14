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
			array('des_estatus_cond, fecha_proceso_asc, fecha_postulacion', 'required'),
			array('id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('des_proceso_asc, des_estatus_cond', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_conf_asc_fecha, fecha_proceso_asc, des_proceso_asc, des_estatus_cond, fecha_postulacion', 'safe', 'on'=>'search'),
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
			'id_conf_asc_fecha' => 'Id Conf Asc Fecha',
			'fecha_proceso_asc' => 'Fecha Proceso Asc',
			'des_proceso_asc' => 'Des Proceso Asc',
			'des_estatus_cond' => 'Des Estatus Cond',
			'fecha_postulacion' => 'Fecha Postulacion',
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
}
