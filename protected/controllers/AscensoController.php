<?php

class AscensoController extends Controller{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','ListarProcAnt'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionObtenerPostulados(){
		
		$criteria = new CDbCriteria(
			array(
				'condition'=>'id_conf_asc_fecha=:id',
				'params'=>array(
							':id'=>FechaAsc::obtenerUltimoId()
						)
			)
		);


		$postulados = Postularse::model()->findAll($criteria);
		var_dump($criteria,$postulados);
	}

	public function actionView(){

		ini_set('max_execution_time', 300); //Aumentar el tiempo para la solicitud

		$aprobados = Ascenso::obtenerPostuladosAAscender();

		//if (is_null($aprobados)) $aprobados = "No hay data";


		// OBTENER PRIMERO TODOS LOS POSTULADOS DE LA FECHA ACTUAL DE ASCENSO (cedula, nombre, jerarquia)

		// DETERMINAR CUALES DE ELLOS ESTAN APTOS (Ya sea porque le falta una nota, o esta no apto de verdad, será agregado al arreglo de reprobados automaticamente, sino al de aprobados y se les calcula sus notas)

		// CALCULAR LAS NOTAS (faltaria nivel academico, condecoraciones y etc) PARA OBTENER LA FINAL QUE ES LA UNICA QUE SE MOSTRARÁ

		// ORDENAR EL ARREGLO POR NOTAS

		// MOSTRAR POSICION, CEDULA, NOMBRE, APELLIDO Y NOTA

		//$aprobados = "Todos los aprobados <br>";
		$reprobados = "Todos los reprobados<br>";
		//$aprobados = Ascenso::temporalObtenerPostulado(6081498,2);

		$this->render(
				'view',
				array(
					'aprobados'=>$aprobados,
					'reprobados'=>$reprobados
				)
		);
	}

	public function obtenerPostulados(){

		$criteria = new CDbCriteria(
			array(
				'select'=>'Cedula,id_conf_asc_fecha',
				'condition'=>'id_conf_asc_fecha=:id',
				'params'=>array(
							':id'=>2//FechaAsc::obtenerUltimoId()
						)
			)
		);
		$postulados=Postulados::model()->findAll($criteria);
		var_dump($postulados);


	}

	public function actionCreate(){

		ini_set('max_execution_time', 300); //Aumentar el tiempo para la solicitud
		//$var="asdgljhyasdjkhgjhasdh";
		//var_dump($var);

		/*$criteria = new CDbCriteria(
			array(
				'select'=>'Cedula,id_conf_asc_fecha',
				'condition'=>'id_conf_asc_fecha=:id',
				'params'=>array(
							':id'=>FechaAsc::obtenerUltimoId()
						)
			)
		);
		$postulados=Postulados::model()->findAll($criteria);
		
		foreach($postulados as $row): 
			$apto = AscensoController::isApto($row->Cedula,$row->id_conf_asc_fecha);
 			var_dump($row,$apto);
		endforeach; 
		*/
		echo Ascenso::obtenerNotaAnosServicios(6081498) . " puntos por años de servicio.<br>"; //Prueba de nota por años de servicios
		echo Ascenso::getnotaEspirituBomberilFinal(6081498,2) . " puntos (porcentuado) de espiritu bomberil.<br>"; //Prueba de nota por espiritu bomberil
		echo Ascenso::getnotaCompetenciaFinal(6081498,2) . " puntos (porcentuado) de competencia.<br>"; //Prueba de nota por competencia
		echo Ascenso::getnotaDesempenhoFinal(6081498,2) . " puntos (porcentuado) de desempeño.<br>"; //Prueba de nota por desempeño
		echo Ascenso::getnotaAptitudActitudFinal(6081498,2) . " puntos (porcentuado) de aptitud-actitud.<br>"; //Prueba de nota por actitud_aptitud
		echo Ascenso::getnotaHabilidadFinal(6081498,2) . " puntos (porcentuado) de habilidad.<br>"; //Prueba de nota por habilidad
		var_dump(Ascenso::mediApto(6081498,2));
		//echo Ascenso::mediApto(6081498,1)." Resultado de MEDIAPTO<br>"; //PRUEBA
		echo "----------------------------------------------------<br>";
		echo "El promedio es: ". Ascenso::obtenerNotaFinalDesempenho(6081498,2) . "<br><br>";

		echo "Nota final de ascenso: " . Ascenso::obtenerNotaFinalDeAscenso(6081498,2);

		//$aprobados = Ascenso::temporalObtenerPostulado(6081498,2);

		//var_dump($aprobados);

		//$nota = Ascenso::getnotaEspirituBomberil(13727546,1);
		//$nota.= " puntos (porcentaje).";
		//var_dump($nota);

	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('FechaAsc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionListarProcAnt($id){
		ini_set('max_execution_time', 300); //Aumentar el tiempo para la solicitud

		$aprobados = Ascenso::obtenerPostuladosAAscenderByPK($id);

		//if (is_null($aprobados)) $aprobados = "No hay data";


		// OBTENER PRIMERO TODOS LOS POSTULADOS DE LA FECHA ACTUAL DE ASCENSO (cedula, nombre, jerarquia)

		// DETERMINAR CUALES DE ELLOS ESTAN APTOS (Ya sea porque le falta una nota, o esta no apto de verdad, será agregado al arreglo de reprobados automaticamente, sino al de aprobados y se les calcula sus notas)

		// CALCULAR LAS NOTAS (faltaria nivel academico, condecoraciones y etc) PARA OBTENER LA FINAL QUE ES LA UNICA QUE SE MOSTRARÁ

		// ORDENAR EL ARREGLO POR NOTAS

		// MOSTRAR POSICION, CEDULA, NOMBRE, APELLIDO Y NOTA

		//$aprobados = "Todos los aprobados <br>";
		$reprobados = "Todos los reprobados<br>";
		//$aprobados = Ascenso::temporalObtenerPostulado(6081498,2);

		$this->render(
				'view',
				array(
					'aprobados'=>$aprobados,
					'reprobados'=>$reprobados
				)
		);
	}
	
	/*public function obtenerPostulados(){

		$criteria = new CDbCriteria(
			array(
				'select'=>'Cedula,id_conf_asc_fecha',
				'condition'=>'id_conf_asc_fecha=:id',
				'params'=>array(
							':id'=>FechaAsc::obtenerUltimoId()
						)
			)
		);
		$postulados=Postulados::model()->findAll($criteria);
		var_dump($postulados);
	}

	public function isApto($ci_funcionario,$conf_asc_fecha){	

		return 	(AscensoController::mediApto($ci_funcionario,$conf_asc_fecha))
			&&	(AscensoController::fisiApto($ci_funcionario,$conf_asc_fecha)) //Si todo verdadero, es apto (true)
			&&	(AscensoController::dopingApto($ci_funcionario,$conf_asc_fecha)) //A la primera falsa, se corta la busqueda y no es apto (false)
			&&	(AscensoController::psiquiApto($ci_funcionario,$conf_asc_fecha)); 


	}

	public static function mediApto($ci_funcionario,$conf_asc_fecha){

		$criteria_medica = new CDbCriteria(
			array(
				'select'=>'Cedula,des_asist_exa_medico,des_asist_exa_condicion,id_conf_asc_fecha',
				'condition'=>'id_conf_asc_fecha=:conf_fech AND Cedula=:ci',
				'params'=>array(
							':conf_fech'=>$conf_asc_fecha,
							':ci'=>$ci_funcionario
						)
			)
		);
		
		if (!ExamenMedico::model()->exists($criteria_medica))
			return false;
		else{//si existe
			$medica = ExamenMedico::model()->find($criteria_medica); //leer el valor de la bdd
			if ($medica->des_asist_exa_medico == "INASISTENTE")//si inasistente
				return false;
			else{//si asistente
				if ($medica->des_asist_exa_condicion == "NO APTO")
					return false;
			}
		}
		return true;
	}

	public static function fisiApto($ci_funcionario,$conf_asc_fecha){
		$criteria_fisica = new CDbCriteria(
			array(
				'select'=>'Cedula,des_fisica_asistencia,des_fisica_condicion,id_conf_asc_fecha',
				'condition'=>'id_conf_asc_fecha=:conf_fech AND Cedula=:ci',
				'params'=>array(
							':conf_fech'=>$conf_asc_fecha,
							':ci'=>$ci_funcionario
						)
			)
		);
		//$fisica = Fisica::model()->exists($criteria_fisica);//find($criteria_fisica);

		if (!Fisica::model()->exists($criteria_fisica))
			return false;
		else{//si existe
			$fisica = Fisica::model()->find($criteria_fisica); //leer el valor de la bdd
			if ($fisica->des_fisica_asistencia == "INASISTENTE")//si inasistente
				return false;
			else{//si asistente
				if ($fisica->des_fisica_condicion == "NO APTO")
					return false;
			}
		}
		return true;
	}

	public static function dopingApto($ci_funcionario,$conf_asc_fecha){
		$criteria_antidoping = new CDbCriteria(
			array(
				'select'=>'Cedula,des_antid_asistencia,des_antid_condicion,id_conf_asc_fecha',
				'condition'=>'id_conf_asc_fecha=:conf_fech AND Cedula=:ci',
				'params'=>array(
							':conf_fech'=>$conf_asc_fecha,
							':ci'=>$ci_funcionario
						)
			)
		);
		//$antidoping = Antidoping::model()->exists($criteria_antidoping); //find($criteria_antidoping);
		if (!Antidoping::model()->exists($criteria_antidoping))
			return false;
		else{//si existe
			$antidoping = Antidoping::model()->find($criteria_antidoping); //leer el valor de la bdd
			if ($antidoping->des_antid_asistencia == "INASISTENTE")//si inasistente
				return false;
			else{//si asistente
				if ($antidoping->des_antid_condicion == "NO APTO")
					return false;
			}
		}
		return true;

	}

	public static function psiquiApto($ci_funcionario,$conf_asc_fecha){
		$criteria_psiquica = new CDbCriteria(
			array(
				'select'=>'Cedula,des_psi_asistencia,des_psi_condicion,id_conf_asc_fecha',
				'condition'=>'id_conf_asc_fecha=:conf_fech AND Cedula=:ci',
				'params'=>array(
							':conf_fech'=>$conf_asc_fecha,
							':ci'=>$ci_funcionario
						)
			)
		);
		//$psiquica = Psiquica::model()->exists($criteria_psiquica);// find($criteria_psiquica);
		if (!Psiquica::model()->exists($criteria_psiquica))
			return false;
		else{//si existe
			$psiquica = Psiquica::model()->find($criteria_psiquica); //leer el valor de la bdd
			if ($psiquica->des_psi_asistencia == "INASISTENTE")//si inasistente
				return false;
			else{//si asistente
				if ($psiquica->des_psi_condicion == "NO APTO")
					return false;
			}
		}
		return true;
	}

	*/


}