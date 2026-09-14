<?php

/**
 * This is the model class for table "tbl_asc_postulados".
 *
 * The followings are the available columns in table 'tbl_asc_postulados':
 * @property integer $id_postulados
 * @property integer $id_conf_asc_fecha
 * @property double $Cedula
 * @property string $fecha_postulacion
 * @property string $hora_postulacion
 * @property double $cedula_fun_recepcion
 * @property string $des_datos_receptor
 * @property integer $Cod_Jerarquia
 * @property integer $id_asc_fecha
 * @property integer $id_fecha_ingreso
 * @property integer $num_modificar
 */
class Postulados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_asc_postulados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula_fun_recepcion, des_datos_receptor', 'required'),
			array('id_postulados, id_conf_asc_fecha, Cod_Jerarquia, id_asc_fecha, id_fecha_ingreso, num_modificar', 'numerical', 'integerOnly'=>true),
			array('Cedula, cedula_fun_recepcion', 'numerical'),
			array('des_datos_receptor', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_postulados, id_conf_asc_fecha, Cedula, fecha_postulacion, hora_postulacion, cedula_fun_recepcion, des_datos_receptor, Cod_Jerarquia, id_asc_fecha, id_fecha_ingreso, num_modificar', 'safe', 'on'=>'search'),
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
			'id_postulados' => 'Id Postulados',
			'id_conf_asc_fecha' => 'Id Conf Asc Fecha',
			'Cedula' => 'Cedula',
			'fecha_postulacion' => 'Fecha Postulacion',
			'hora_postulacion' => 'Hora Postulacion',
			'cedula_fun_recepcion' => 'Cedula Fun Recepcion',
			'des_datos_receptor' => 'Des Datos Receptor',
			'Cod_Jerarquia' => 'Cod Jerarquia',
			'id_asc_fecha' => 'Id Asc Fecha',
			'id_fecha_ingreso' => 'Id Fecha Ingreso',
			'num_modificar' => 'Num Modificar',
		);
	}


		public function getConfAscFecha()
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('des_proceso_asc=:des1');
            $criteria->addCondition('des_estatus_cond=:des2');  
            $criteria->params=array(':des1'=>'EN PROCESO', ':des2'=>'ACTIVO');                    
            $Fecha_Asc = FechaAsc::model()->find($criteria);

            return $Fecha_Asc->id_conf_asc_fecha;
	}

	public function listFuncionarios()
	{		
		return CHtml::listData(Funcionarios::model()->findAll(),'Cedula','NombreCedula') ;
	}

	public function listPostulados()
	{		
		$id=new FechaAsc;				
		return CHtml::listData(Postulados::model()->findAll('id_conf_asc_fecha = '.$id->obtenerUltimoId()),'Cedula','Nombre') ;
	}

	public function listPostuladosEvaluador()
	{		
			$criteria = new CDbCriteria(
					array(						
						'condition'=>'cedula_fun_recepcion =:ci and id_conf_asc_fecha=:ult',
						'params'=>array(
									':ci'=>Yii::app()->user->getState('cedula'),
									':ult'=>FechaAsc::obtenerUltimoId(),
								)
					)
		);
		$id=new FechaAsc;				
		return CHtml::listData(Postulados::model()->findAll($criteria),'Cedula','Nombre') ;
	}

	
	public function getNombre()
	{	return Funcionarios::model()->getNombreCedulaBD($this->Cedula);
		
	}

	public  function cargarCedula($cd)
	{
		$criteria = new CDbCriteria(
					array(						
						'condition'=>'Cedula =:ci and id_conf_asc_fecha=:ult',
						'params'=>array(
									':ci'=>$cd,
									':ult'=>FechaAsc::obtenerUltimoId(),
								)
					));
		$model=Postulados::model()->find($criteria);
		
		if($model===null)
			return false;
		return $model;
	}
	public function getFechaIngreso($cedula)
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced');
            $criteria->params=array(':ced'=>$cedula);                    
            $Fecha_Ingreso = FechaIngreso::model()->find($criteria);

            return $Fecha_Ingreso->id_fecha_ingreso;
	}
	/*
	*Funcion que  recibe un parametro cedula*
	* y realiza una busqueda en la bd , 	*
	*encontrando coincidencia con la cedula *
	* del funcionario 						*
	* retornando la cedula del funcionario 	*
	*  de recepcion sino retorna null       *
	*/
		public function getFuncionarioRecepcion($cedula)
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced');
            $criteria->params=array(':ced'=>$cedula);                    
            $funcionario = Postulados::model()->find($criteria);
			if($funcionario)
            	return $funcionario->cedula_fun_recepcion;
            elseif($funcionario == null)
            	return null;
            
	}

	public function getUser($cedula)
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced');
            $criteria->params=array(':ced'=>$cedula);                    
            $Usuario = Usuario::model()->find($criteria);
            if($Usuario)
            	return $Usuario;
            elseif($Usuario == null)
            	return null;
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

		$criteria->compare('id_postulados',$this->id_postulados);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('fecha_postulacion',$this->fecha_postulacion,true);
		$criteria->compare('hora_postulacion',$this->hora_postulacion,true);
		$criteria->compare('cedula_fun_recepcion',$this->cedula_fun_recepcion);
		$criteria->compare('des_datos_receptor',$this->des_datos_receptor,true);
		$criteria->compare('Cod_Jerarquia',$this->Cod_Jerarquia);
		$criteria->compare('id_asc_fecha',$this->id_asc_fecha);
		$criteria->compare('id_fecha_ingreso',$this->id_fecha_ingreso);
		$criteria->compare('num_modificar',$this->num_modificar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Postulados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
