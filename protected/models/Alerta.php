<?php

/**
 * This is the model class for table "tbl_alerta".
 *
 * The followings are the available columns in table 'tbl_alerta':
 * @property integer $id
 * @property integer $cedula_funcionario
 * @property string $titulo
 * @property string $descripcion
 */
class Alerta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_alerta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula_funcionario, titulo, descripcion', 'required'),
			array('cedula_funcionario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cedula_funcionario, titulo, descripcion', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'cedula_funcionario' => 'Cedula Funcionario',
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('cedula_funcionario',$this->cedula_funcionario);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alerta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	*funcion numero simplemente lo que hace es calcular cuantos alertas estan asociadas a un funcionario 
	*de tal forma que retornara un numero ,relacionado a dichas alertas,cuyo fin es hacer visible el numero
	*alertas en el menu principal.
	*/
	public  function numero()
	{
		$cedulaTemporal = (yii::app()->user->getState('cedula'))?yii::app()->user->getState('cedula'):0;
		$sql=" SELECT COUNT(*) FROM tbl_alerta WHERE cedula_funcionario = ".$cedulaTemporal.";";

		$estatus=yii::app()->db->createCommand($sql)->queryAll();
		if($estatus===null)
			return False;
		if ($estatus[0]['COUNT(*)']>0) return $estatus[0]['COUNT(*)'];
			else  return 0;   
	}

		public function buscarUltimo()
	{
		$sql="SELECT MAX(`id`) FROM  `tbl_alerta`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id`)" ] + 1;
	}



	public  function paramsCContrasena()
	{
		return array('CAMBIO DE CONTRASEÑA','TU CONTRASEÑA HA SIDO CAMBIADA.');
	}

	public  function paramsContrasena()
	{
		return array('CONTRASEÑA','TU CONTRASEÑA HA SIDO RESTAURADA POR TU NUMERO DE CEDULA,POR MOTIVOS DE SEGURIDAD TE RECORDAMOS CAMBIAR TU CONTRASEÑA MAS SEGUIDO.');
	}

	public  function paramsNombre()
	{
		return array('NOMBRE DE USUARIO','TU NOMBRE DE USUARIO HA SIDO CAMBIADO RECUERDA QUE PARA EL PROXIMO INICIO DE SESION DEBES TENERLO EN CUENTA.');
	}

		public  function paramsCorreo()
	{
		return array('CORREO','TU CORREO HA SIDO CAMBIADO RECUERDA QUE PARA EL PROXIMO INICIO DE SESION DEBES TENERLO EN CUENTA.');
	}


	public  function paramsAntidoping()
	{
		return array('ANTIDOPING','TU RESULTADO DE ANTIDOPING HA SIDO CARGADO EN EL SISTEMA.');
	}

	public  function paramsAptitudActitud()
	{
		return array('APTITUD-ACTITUD','TU RESULTADO DE APTITUD-ACTITUD HA SIDO CARGADO EN EL SISTEMA.');
	}	

	public  function paramsCompetencia()
	{
		return array('COMPETENCIA','TU RESULTADO EN COMPETENCIA HA SIDO CARGADO EN EL SISTEMA.');
	}

	public  function paramsDesempeno()
	{
		return array('DESEMPEÑO','TU RESULTADO EN DESEMPEÑO HA SIDO CARGADO EN EL SISTEMA.');
	}
	public  function paramsEspirituBomberil()
	{
		return array('ESPIRITU BOMBERIL','TU RESULTADO EN ESPIRITU BOMBERIL HA SIDO CARGADO EN EL SISTEMA.');
	}
	public  function paramsExamenMedico()
	{
		return array('EXAMEN MEDICO','TU RESULTADO EN EXAMEN MEDICO HA SIDO CARGADO EN EL SISTEMA.');
	}
		public  function paramsFisica()
	{
		return array('EXAMEN FISICO','TU RESULTADO EN EXAMEN FISICO HA SIDO CARGADO EN EL SISTEMA.');
	}
		public  function paramsHabilidad()
	{
		return array('HABILIDAD','TU RESULTADO EN HABILIDADES HA SIDO CARGADO EN EL SISTEMA.');
	}

		public  function paramsPsiquica()
	{
		return array('PSIQUICA','TU RESULTADO EN PSIQUICA HA SIDO CARGADO EN EL SISTEMA.');
	}

	public  function CONSULTADB($param,$cedula = null)
	{	
		if (empty($cedula)) {
			$cedula=yii::app()->user->getState('cedula');
		}
		
		$id=$this->buscarUltimo();

		$sql="INSERT INTO tbl_alerta (`id`, `cedula_funcionario`, `titulo`, `descripcion`)";
		$sql .="values ($id, '$cedula', ".$param.");";
		
		$conexion=yii::app()->db;
		$resultado=$conexion->createCommand($sql)->execute();
	}

	public  function contrasena()
	{	$paramametros=$this->paramsContrasena();		
		$sql ="'$paramametros[0]', '$paramametros[1]'";
		$this->CONSULTADB($sql);		
	}
		public  function cambioContrasena()
	{	$paramametros=$this->paramsCContrasena();		
		$sql ="'$paramametros[0]', '$paramametros[1]'";
		$this->CONSULTADB($sql);		
	}

		public  function nombre()
	{	$paramametros=$this->paramsNombre();		
		$sql ="'$paramametros[0]', '$paramametros[1]'";
		$this->CONSULTADB($sql);		
	}

			public  function correo()
	{	$paramametros=$this->paramsCorreo();		
		$sql ="'$paramametros[0]', '$paramametros[1]'";
		$this->CONSULTADB($sql);		
	}


				public  function Generar($caso,$cedula)
	{	switch ($caso) 
		{
			case 'Antidoping':
				$paramametros=$this->paramsAntidoping();
				break;

			case 'EspirituBomberil':
				$paramametros=$this->paramsEspirituBomberil();
				break;

			case 'Fisica':
				$paramametros=$this->paramsFisica();
				break;

			case 'Habilidad':
				$paramametros=$this->paramsHabilidad();
				break;

			case 'AptitudA':
				$paramametros=$this->paramsAptitudActitud();
				break;

			case 'Desempeno':
				$paramametros=$this->paramsDesempeno();
				break;

			case 'Competencia':
				$paramametros=$this->paramsCompetencia();
				break;

			case 'ExamenMedico':
				$paramametros=$this->paramsExamenMedico();
				break;

			case 'Psiquica':
				$paramametros=$this->paramsPsiquica();
				break;	

			
		}

		$sql ="'$paramametros[0]', '$paramametros[1]'";
		$this->CONSULTADB($sql,$cedula);		
	}


}

