<?php

/**
 * This is the model class for table "tbl_postularse".
 *
 * The followings are the available columns in table 'tbl_postularse':
 * @property integer $id_postularse
 * @property integer $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $cargo
 * @property integer $id_status
 */
class Postularse extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_postularse';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula', 'required'),
			//array('cedula','compare','compareValue'=>yii::app()->user->getState('cedula'),'operator'=>'==','message'=>'Cédula no es valida. Ingrese su cédula para postularse.'),
			//array('cedula','unique'),
			array('cedula', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, cargo', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_postularse, cedula, nombre, apellido, cargo', 'safe', 'on'=>'search'),
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
			'id_postularse' => 'Id Postularse',
			'cedula' => 'Cedula',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'cargo' => 'Cargo',
			'id_status' => 'Id Status',
			'id_conf_asc_fecha' => 'Id Conf Asc Fecha',
		);
	}

	public function getFuncionarioPost()
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced');
            $criteria->params=array(':ced'=>yii::app()->user->getState('cedula'));                    
            $Funcionario = Postularse::model()->find($criteria);
            if($Funcionario)
            	return true;
            elseif($Funcionario == null)
            	return false;
	}

	public function getStatus()
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced');
            $criteria->params=array(':ced'=>yii::app()->user->getState('cedula'));                    
            $Funcionario = Postularse::model()->find($criteria);
            if($Funcionario)
            	return $Funcionario->id_status;
            elseif($Funcionario == null)
            	return null;
	}

	public function getFechaAsc()
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('des_proceso_asc=:des1');
            $criteria->addCondition('des_estatus_cond=:des2');  
            $criteria->params=array(':des1'=>'EN PROCESO', ':des2'=>'ACTIVO');                    
            $Fecha_Asc = FechaAsc::model()->find($criteria);
            
            if($Fecha_Asc)
            	return $Fecha_Asc;
            else
            	return null;
	}

	public function getFuncionario()
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced');
            $criteria->params=array(':ced'=>yii::app()->user->getState('cedula'));                    
            $criteria->order ='id_postularse DESC';
            $criteria->limit = 1;
            $Funcionario = Postularse::model()->find($criteria);
            if($Funcionario)
            	return $Funcionario;
            elseif($Funcionario == null)
            	return null;
	}

	public function getFuncionarioCed($cedula)
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced'); 
            $criteria->params=array(':ced'=>$cedula);                     
            $Funcionario = Funcionarios::model()->find($criteria);

            if($Funcionario)
            	return $Funcionario;
            elseif($Funcionario == null)
            	return null;
	}

	public function getJerarquiaName($cod)
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('Cod_Jerarquia=:cod'); 
            $criteria->params=array(':cod'=>$cod);                     
            $Funcionario = Jerarquia::model()->find($criteria);
            
            if($Funcionario)
            	return $Funcionario->Descripcion_Jerarquia;
            elseif(is_null($Funcionario))
            	return " ";
	}

	public function getPostulante($cedula)
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced');
            $criteria->params=array(':ced'=>$cedula);                    
            $Funcionario = Postularse::model()->find($criteria);
            if($Funcionario)
            	return $Funcionario;
            elseif($Funcionario == null)
            	return null;
	}

	public function check_in_range($start_date, $end_date, $evaluame) 
	{
	    $start_ts = strtotime($start_date);
	    $end_ts = strtotime($end_date);
	    $user_ts = strtotime($evaluame);
	    return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
	}

	public function getUltimaFecha($cedula) 
	{
		$criteria = new CDbCriteria;                                      
        $criteria->addCondition('cedula=:ced');
        $criteria->order = 'fecha_ascenso DESC';
        $criteria->limit = 1;
        $criteria->params=array(':ced'=>$cedula);

        $FechaAscenso = FechaAscenso::model()->find($criteria);
        if($FechaAscenso)
        	return $FechaAscenso->fecha_ascenso;
        else
        	return $this->getFechaIngreso($cedula);
	}

	public function getFechaIngreso($cedula)
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced');
            $criteria->params=array(':ced'=>$cedula);                    
            $Fecha_Ingreso = FechaIngreso::model()->find($criteria);

            return $Fecha_Ingreso->id_fecha_ingreso;
	}

	public function getMaximoRango($Funcionario)
	{
			$MaximoRango = 0;
			
			if($Funcionario->num_categoria == 1)
				$MaximoRango = 0;
			if($Funcionario->num_categoria == 2)
				$MaximoRango = 1;
			if($Funcionario->num_categoria == 1)
				$MaximoRango = 3;

			return $MaximoRango;
	}

	public function anhosRequeridoJerarquia($numero)#años de jerarquia
	{			
		 $anhos=array(
		 '0'=>'3',	#3 años para comandante general
		 '1'=>'3', #3 años para coronel
		 '2'=>'3', #3 años teniente coronel
		 '3'=>'3', #3 años mayor
		 '4'=>'2', #2 años para capitan
		 '5'=>'2', #2 años para teniente
		 '6'=>'2', #2 años para subteniente
		 '7'=>'1', #1 año para Sargento Ayudante
		 '8'=>'1', #1 año para Sargento primero
		 '9'=>'1', #1 año para Sargento Segundo
		 '10'=>'1', #1 año para Cabo Primero
		 '11'=>'1', #1 año para Cabo Segundo
		 '12'=>'1', #1 año para Distinguido
		 );
		 return $anhos[$numero];
	}

/*	public function getStatusName($id)
	{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('id_status=:id');
            $criteria->params=array(':id'=>$id);                    
            $status = Status::model()->find($criteria);
            return $status;
	}
*/

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

		$criteria->compare('id_postularse',$this->id_postularse);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('id_status',$this->id_status);
		$criteria->compare('id_conf_asc_fecha',$this->id_conf_asc_fecha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Postularse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
