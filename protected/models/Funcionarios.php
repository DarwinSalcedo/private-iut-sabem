<?php

/**
 * This is the model class for table "tbl_funcionarios".
 *
 * The followings are the available columns in table 'tbl_funcionarios':
 * @property double $id_funcionario
 * @property double $Cedula
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Fecha_Ingreso
 * @property integer $Cod_Jerarquia
 * @property string $Equipo
 * @property integer $num_categoria
 * @property integer $Cod_Condicion
 * @property integer $cod_institucion
 * @property string $Observacion
 * @property string $Sexo
 *
 * The followings are the available model relations:
 * @property TblJerarquia $codJerarquia
 * @property TblJerarquia $tblJerarquia
 * 
 * num_TotNivelAcaNota
 * des_nivel_acade
 */
class Funcionarios extends CActiveRecord
{
	#public  $num_TotNivelAcaNota  ;
    public $des_nivel_acade;
    public $num_nota_total;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_funcionarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cedula, Nombre, Apellidos, Fecha_Ingreso, Cod_Jerarquia, Equipo, num_categoria, Cod_Condicion, cod_institucion, Sexo , des_nivel_acade', 'required'),
			array('Cod_Jerarquia, num_categoria, Cod_Condicion, cod_institucion', 'numerical', 'integerOnly'=>true),
			array('id_funcionario, Cedula ,  Equipo,', 'numerical'),
			array('Nombre, Apellidos,  Observacion, des_nivel_acade', 'length', 'max'=>255 ,),
			array('Nombre, Apellidos,  Observacion, ', 'match','pattern'=>'/^[a-z \_]+$/i','message'=>'Solo letras  ',),
			array('Sexo', 'length', 'max'=>15),
			array('Cedula','unique','allowEmpty' => false, 'attributeName' => 'Cedula', 'attributes' => 'Cedula', 'className' => 'Funcionarios', 'caseSensitive' => true , 'skipOnError' => true ,'message'=>' Esta cedula existe '),
			array('Equipo','unique','allowEmpty' => false, 'attributeName' => 'Equipo', 'attributes' => 'Equipo', 'className' => 'Funcionarios', 'caseSensitive' => true , 'skipOnError' => true ,'message'=>' Esta credencial ya  existe '),
			array('num_categoria,','validarJerarquia'),
				array('Cedula,','numerical',
    'integerOnly'=>true,
    'min'=>99999,
    'max'=>999999999,
    'tooSmall'=>'No puede ser muy corta',
    'tooBig'=>'No existe una cedula con tal digitos'),	
    array('Equipo,','numerical',
    'integerOnly'=>true,
    'min'=>1,
    'max'=>999999999,
    'tooSmall'=>'No puede ser muy corta',
    'tooBig'=>'No puede pasar de 9 digitos'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_funcionario, Cedula, Nombre, Apellidos, Fecha_Ingreso, Cod_Jerarquia, Equipo, num_categoria, Cod_Condicion, cod_institucion, Observacion, Sexo', 'safe', 'on'=>'search'),
		);
	}

	public function validarJerarquia($attributes,$params)
	{
		#var_dump($this->num_categoria);var_dump($this->Cod_Jerarquia);
		#Yii::app()->end();

		if ($this->num_categoria === '2'){#categoria profesional voluntario
		        if($this->Cod_Jerarquia === '0') #si es igual a comandante general
		        	$this->addError('Cod_Jerarquia','Como profesional voluntario optas hasta  Coronel');		
		}

		if ($this->num_categoria === '3'){##categoria asimilado
		        if(($this->Cod_Jerarquia === '0')or($this->Cod_Jerarquia === '1')or($this->Cod_Jerarquia === '2')) #si es igual a comandante general
		        	$this->addError('Cod_Jerarquia','Como Asimilado optas hasta  Mayor');		
		}
		
			
	
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'genero' => array(self::BELONGS_TO, 'Sexo', 'Sexo'),
			'jerarquia' => array(self::BELONGS_TO, 'Jerarquia', 'Cod_Jerarquia'),
			'institucion' => array(self::BELONGS_TO, 'Institucion', 'cod_institucion'),
			'condicion' => array(self::BELONGS_TO, 'Condicion', 'Cod_Condicion'),
			'Categoria' => array(self::BELONGS_TO, 'Categoria', 'num_categoria'),
			'nivel' => array(self::BELONGS_TO, 'FuncionarioNivelAcademico', 'des_nivel_acade'),


		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_funcionario' => 'Id Funcionario',
			'Cedula' => 'Cedula',
			'Nombre' => 'Nombre',
			'Apellidos' => 'Apellidos',
			'Fecha_Ingreso' => 'Fecha Ingreso',
			'Cod_Jerarquia' => 'Jerarquia',
			'Equipo' => 'Equipo',
		#	'num_equipo_anterior' => 'Num Equipo Anterior',
			'num_categoria' => 'Categoria',
			'Cod_Condicion' => 'Condicion',
			'cod_institucion' => 'Institucion',
			'Observacion' => 'Observacion',
			'Sexo' => 'Sexo',
			#'num_TotNivelAcaNota' => 'Promedio academico',
            'des_nivel_acade' => 'Nivel academico',

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

		$criteria->compare('id_funcionario',$this->id_funcionario);
		$criteria->compare('Cedula',$this->Cedula);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Apellidos',$this->Apellidos,true);
		$criteria->compare('Fecha_Ingreso',$this->Fecha_Ingreso,true);
		$criteria->compare('Cod_Jerarquia',$this->Cod_Jerarquia);
		$criteria->compare('Equipo',$this->Equipo,true);
		#$criteria->compare('num_equipo_anterior',$this->num_equipo_anterior);
		$criteria->compare('num_categoria',$this->num_categoria);
		$criteria->compare('Cod_Condicion',$this->Cod_Condicion);
		$criteria->compare('cod_institucion',$this->cod_institucion);
		$criteria->compare('Observacion',$this->Observacion,true);
		$criteria->compare('Sexo',$this->Sexo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Funcionarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public  function cargarCedula($cd)
	{
		$model=Funcionarios::model()->find("(cedula)=?",array($cd));
		
		if($model===null)
			throw new CHttpException(404,' not exist.');
		return $model;
	}
	
	public function buscarUltimo()
	{
		$sql="SELECT MAX(`id_funcionario`) FROM  `tbl_funcionarios`;";
		$num=yii::app()->db->createCommand($sql)->queryAll();
		if($num===null)
			throw new CHttpException(404,' no se puede procesar.');
		return $num[0]["MAX(`id_funcionario`)" ] + 1;
	}
	
	
	public function MenuCategoria()
	{		
		return CHtml::listData(Categoria::model()->findAll(),'id','Descripcion_categoria') ;
	}

	public function MenuJerarquia()
	{		
		return CHtml::listData(Jerarquia::model()->findAll(),'Cod_Jerarquia','Descripcion_Jerarquia') ;
	}
	
	public function MenuCondicion()
	{		
		return CHtml::listData(Condicion::model()->findAll(),'Cod_Condicion','Descripcion_Condicion') ;
	}
	
		public function MenuInstitucion()
	{
		return CHtml::listData(Institucion::model()->findAll(),'cod_institucion','nombre_institucion');
	}

	public function MenuSexo()
	{
		return CHtml::listData(Sexo::model()->findAll(),'sexo','Descripcion_sexo');
	}
	
	
	public function MenuNivel()
	{
		return CHtml::listData(Nivelacademico::model()->findAll(),'des_nivel_acade','des_nivel_acade');
	}
	
	public function verificarJerarquia()
	{			
		$jerarquiaAscender=new Jerarquia;
		return $jerarquiaAscender->jerarquiaAscender($this->Cod_Jerarquia);#devuelve la jerarquia siguiente
		
	}

	#devuelve el minimo de años  que debo tener para ascender
		public function anhosRequeridoJerarquia($numero)#años de jerarquia
	{	

		 $anhos=array(
		 '0'=>'3',#1 de coronel a comandante general 3 años	
		 '1'=>'3',#1 de coronel a comandante general 3 años
		 '2'=>'3', # de teniente coronel a coronel 3 años 
		 '3'=>'3',#de mayor a teniente coronel 3 años 
		 '4'=>'3', #de capitan a mayor 3 años 	(cambie de 2)			 
		 '5'=>'2',#de teniente a capitan 2 años 
		 '6'=>'2', #de subteniente a teniente 2 años 
		 '7'=>'2', #de sargento ayudante a  subteniente 2 años (cambie de 1)
		 '8'=>'1',#de sargento primero a sargento ayudante 1 años
		 '9'=>'1', #de sargento segundo a sargento primer 1 año
		 '10'=>'1',#de cabo primero a sargento segundo 1 año
		 '11'=>'1',#de cabo segundo a cabo primero 1 años
		 '12'=>'1',#de distinguido a cabo segundo 1 año
		 '13'=>'1',#de bombero a distinguido 1 años
		 );
		 return $anhos[$numero];
	}


	public function cumpleAnhosAntiguedad($numero,$misAnhos)#años de jerarquia
	{
		if(($numero)and($misAnhos!=0)){
			$min=$this->anhosRequeridoJerarquia($numero);
			if ($misAnhos>$min or $misAnhos===$min) 
					return true;
		}
		return false;
			
	}		
				 

	
	 public static function CargarModelo($cedula)
	{
            $model= Funcionarios::model()->find("(cedula)=?",array($cedula));		
		if($model===null)
                        return false;
			#throw new CHttpException(404,' not exist.');
		return $model;  		
	}

	public static function CambiarFecha($value)
	{
         list($ano,$mes,$dia)=explode('-',$value);  
		 $fechaN = $dia.'-'.$mes.'-'.$ano;
		return $fechaN;  		
	}

	public function getNombreCedula()
	{		
		return $this->Nombre.' '.$this->Apellidos.' '.$this->Cedula ;
	}

	public function getNombreJerarquia($id)
	{	

		$jerarquia = Jerarquia::model()->findAll('Cod_Jerarquia = '.$id);	
		return $jerarquia[0]['Descripcion_Jerarquia'] ;
	}

	public static function getNivelAcademico($cedula){
		
		$nivel_aca = Nivelacademicoynota::model()->findAll('Cedula ='.$cedula);

		if($nivel_aca)
			return $nivel_aca[0]['des_nivel_acade'];
		else
			return null;
	
	}
	
	public static function getNotaNivelAcademico($cedula){		
		$nivel_aca = Nivelacademicoynota::model()->findAll('Cedula ='.$cedula);
		return $nivel_aca[0]['num_TotNivelAcaNota'];
	
	}

	public static function getNombre($cedula){
		$funcionario = Funcionarios::model()->findAll('Cedula = '.$cedula);
		return $funcionario[0]['Nombre'];
	}

	public static function getApellidos($cedula){
		$funcionario = Funcionarios::model()->findAll('Cedula = '.$cedula);
		return $funcionario[0]['Apellidos'];
	}

	public static function getNombreApellidos($cedula){
		$nombre_apellidos = array();
		$nombre_apellidos[]= Funcionarios::getNombre($cedula);
		$nombre_apellidos[]= Funcionarios::getApellidos($cedula);
		return $nombre_apellidos;
	}

	public function getNombreCedulaBD($cedula){
		$funcionario = Funcionarios::model()->findAll('Cedula = '.$cedula);
		return $funcionario[0]['Nombre']." ".$funcionario[0]['Apellidos']." ".$cedula;
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
