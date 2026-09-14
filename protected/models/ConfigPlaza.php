<?php

/**
 * This is the model class for table "tbl_asc_config_nota_plaza".
 *
 * The followings are the available columns in table 'tbl_asc_config_nota_plaza':
 * @property integer $id_config_nota_plaza
 * @property integer $Cod_Jerarquia
 * @property integer $num_plazas
 * @property string $num_nota_minima
 * @property string $num_nota_final
 * @property string $des_orden_general
 * @property string $des_jerarq_orden
 * @property integer $id_conf_asc_fecha
 * @property integer $num_tiempo_jerar
 */
class ConfigPlaza extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_config_nota_plaza';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cod_Jerarquia, id_conf_asc_fecha, num_tiempo_jerar', 'required'),
			array('id_config_nota_plaza, Cod_Jerarquia, num_plazas, id_conf_asc_fecha, num_tiempo_jerar', 'numerical', 'integerOnly'=>true),
			array('num_nota_minima, num_nota_final', 'length', 'max'=>18),
			array('des_orden_general, des_jerarq_orden', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_config_nota_plaza, Cod_Jerarquia, num_plazas, num_nota_minima, num_nota_final, des_orden_general, des_jerarq_orden, id_conf_asc_fecha, num_tiempo_jerar', 'safe', 'on'=>'search'),
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
			'id_config_nota_plaza' => 'Id Config Nota Plaza',
			'Cod_Jerarquia' => 'Cod Jerarquia',
			'num_plazas' => 'Num Plazas',
			'num_nota_minima' => 'Num Nota Minima',
			'num_nota_final' => 'Num Nota Final',
			'des_orden_general' => 'Des Orden General',
			'des_jerarq_orden' => 'Des Jerarq Orden',
			'id_conf_asc_fecha' => 'Id Conf Asc Fecha',
			'num_tiempo_jerar' => 'Num Tiempo Jerar',
		);
	}

	public function listJerarquias()
	{		
		return CHtml::listData(Jerarquia::model()->findAll(),'Cod_Jerarquia','Descripcion_Jerarquia') ;
	}

	public function listAscFechas()
	{		
		return CHtml::listData(FechaAsc::model()->findAll(),'id_conf_asc_fecha','fecha_postulacion') ;
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

		$criteria->compare('id_config_nota_plaza',$this->id_config_nota_plaza);
		$criteria->compare('Cod_Jerarquia',$this->Cod_Jerarquia);
		$criteria->compare('num_plazas',$this->num_plazas);
		$criteria->compare('num_nota_minima',$this->num_nota_minima,true);
		$criteria->compare('num_nota_final',$this->num_nota_final,true);
		$criteria->compare('des_orden_general',$this->des_orden_general,true);
		$criteria->compare('des_jerarq_orden',$this->des_jerarq_orden,true);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);
		$criteria->compare('num_tiempo_jerar',$this->num_tiempo_jerar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConfigPlaza the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
