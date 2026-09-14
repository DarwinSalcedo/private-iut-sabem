<?php

/**
 * This is the model class for table "tbl_asc_nivel_academico".
 *
 * The followings are the available columns in table 'tbl_asc_nivel_academico':
 * @property double $id_nivel_academico
 * @property double $Cedula
 * @property integer $num_TotNivelAcaPorc
 * @property integer $num_TotNivelAcaNota
 * @property integer $id_conf_asc_fecha
 * @property string $des_nivel_acade
 */
class FuncionarioNivelAcademico extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_nivel_academico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_conf_asc_fecha, des_nivel_acade', 'required'),
			array('num_TotNivelAcaPorc, num_TotNivelAcaNota, id_conf_asc_fecha', 'numerical', 'integerOnly'=>true),
			array('id_nivel_academico, Cedula', 'numerical'),
			array('des_nivel_acade', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_nivel_academico, Cedula, num_TotNivelAcaPorc, num_TotNivelAcaNota, id_conf_asc_fecha, des_nivel_acade', 'safe', 'on'=>'search'),
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
						'nivel' => array(self::BELONGS_TO, 'Nivelacademico', 'des_nivel_acade'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_nivel_academico' => 'Id Nivel Academico',
			'Cedula' => 'Cedula',
			'num_TotNivelAcaPorc' => 'Num Tot Nivel Aca Porc',
			'num_TotNivelAcaNota' => 'Num Tot Nivel Aca Nota',
			'id_conf_asc_fecha' => 'Id Conf Asc Fecha',
			'des_nivel_acade' => 'Des Nivel Acade',
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

		$criteria->compare('id_nivel_academico',$this->id_nivel_academico);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('num_TotNivelAcaPorc',$this->num_TotNivelAcaPorc);
		$criteria->compare('num_TotNivelAcaNota',$this->num_TotNivelAcaNota);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);
		$criteria->compare('des_nivel_acade',$this->des_nivel_acade,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FuncionarioNivelAcademico the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

public function buscarUltimo()
	{
		$sql="SELECT MAX(`id_nivel_academico`) FROM  `tbl_asc_nivel_academico`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_nivel_academico`)" ] + 1;
	}

		public function obtenerPuntos($descripcion)
	{
				$puntos = Nivelacademico::model()->find("(des_nivel_acade)=?",array($descripcion));
            if($puntos)
            	return $puntos->puntos;
            elseif($puntos == null)
            	return false;		
		
	
	}

		public function guardarNivelAcademico($cedula,$descripcion)
	{
		$conexion=yii::app()->db;	
		$nota=$this->obtenerPuntos($descripcion);		
		$id=$this->buscarUltimo();
		$consulta="insert into tbl_asc_nivel_academico(id_nivel_academico,Cedula,num_TotNivelAcaPorc,num_TotNivelAcaNota,id_conf_asc_fecha,des_nivel_acade)";
		$consulta .="values ($id,'$cedula','$nota','$nota','0','$descripcion')";
		$resultado=$conexion->createCommand($consulta)->execute();		
		
	}

		public function actualizarNivelAcademico($cedula,$descripcion)
	{
		$nota=$this->obtenerPuntos($descripcion);	
		$conexion=yii::app()->db;	
		$consulta="UPDATE `tbl_asc_nivel_academico` SET  `num_TotNivelAcaPorc` =  '$nota',
		`num_TotNivelAcaNota` =  '$nota',
		`des_nivel_acade` =  '$descripcion' WHERE CONCAT( `tbl_asc_nivel_academico`.`Cedula` ) =  '$cedula';";
		
		$resultado=$conexion->createCommand($consulta)->execute();		
		
	}
	public function MenuNivel()
	{
		return CHtml::listData(Nivelacademico::model()->findAll(),'des_nivel_acade','des_nivel_acade');
	}

	public function cargarModelo($cedula)
	{
		$model=FuncionarioNivelAcademico::model()->find('Cedula='.$cedula);
		if($model===null)
			return false;
		return $model;
	}
}
