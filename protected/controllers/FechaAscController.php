<?php

class FechaAscController extends Controller
{
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Ppal',),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','Bloquear'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FechaAsc;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FechaAsc']))
		{
				$model->attributes=$_POST['FechaAsc'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id_conf_asc_fecha));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

public function actionBloquear($id)
	{  
		ini_set('max_execution_time', 1000);

		$aux=FechaAsc::model()->findByPk($id);	

			
		if($aux!=null){
			

			//$nota_final = new TblAscNotaTotal;//("",$ascendidos[0]['funcionario']->Cedula,$ascendidos[0]['nota_porc'],$ascendidos[0]['funcionario']->Cod_Jerarquia,"2016/03/13","REVISADO",$ascendidos[0]['funcionario']->id_conf_asc_fecha);
			
			/*$nota_final->Cedula=$ascendidos[0]['funcionario']->Cedula;
			$nota_final->num_nota_total = $ascendidos[0]['nota_porc'];
			$nota_final->Cod_Jerarquia = $ascendidos[0]['funcionario']->Cod_Jerarquia;
			$nota_final->Fecha_Ingreso = "2016/03/13";
			$nota_final->des_revisar = "REVISADO";
			$nota_final->id_conf_asc_fecha = $ascendidos[0]['funcionario']->id_conf_asc_fecha;
			$nota_final->save(false);*/
			/*var_dump($nota_final);
			Yii::app()->end();
			*/
			/*foreach($ascendidos as $funcionario){
				$nota_final = new TblAscNotaTotal("",$funcionario['funcionario']->Cedula,$funcionario['nota_porc'],$funcionario['funcionario']->Cod_Jerarquia,"2016/03/13","REVISADO",$funcionario['funcionario']->id_conf_asc_fecha);
			}
			*/

			/*$sql = "INSERT INTO `tbl_asc_nota_total` (`Cedula`, `num_nota_total`, `Cod_Jerarquia`, `Fecha_Ingreso`, `des_revisar`, `id_conf_asc_fecha`) VALUES\n";
			

			foreach($ascendidos as $funcionario){
				$sql.= "(";
				$sql.= $funcionario['funcionario']->Cedula.",";
				$sql.= $funcionario['nota_porc'].",";
				$sql.= $funcionario['funcionario']->Cod_Jerarquia.",";
				$sql.= "2016/03/13".",";
				$sql.= "REVISADO".",";
				$sql.= $funcionario['funcionario']->id_conf_asc_fecha."),\n";
			}
			$sql[strlen($sql)-2]=";";

			var_dump($sql);
			Yii::app()->end();
			*/

			//Se cambia el estado del proceso de ascenso
			if ($aux->attributes['des_estatus_cond']=='ACTIVO')#activo
			{

				//Obtenemos los postulados ascendidos
				$ascendidos = Ascenso::obtenerPostuladosAAscender();

				foreach($ascendidos as $funcionario){//Guardamos su nota final en la tabla tbl_asc_nota_total
					$cod_jerarquia = $funcionario['funcionario']->Cod_Jerarquia-1;
					$nota_final = new TblAscNotaTotal;
					$fechaingreso = FechaIngreso::model()->find('(cedula)=?',array($funcionario['funcionario']->Cedula));
					$nota_final->Cedula = $funcionario['funcionario']->Cedula;
					$nota_final->num_nota_total = $funcionario['nota_porc'];
					$nota_final->Cod_Jerarquia = $cod_jerarquia;
					$nota_final->Fecha_Ingreso = $fechaingreso->fecha_ingreso;//"2016/03/13";
					$nota_final->des_revisar = "REVISADO";
					$nota_final->id_conf_asc_fecha = $funcionario['funcionario']->id_conf_asc_fecha;

					if($nota_final->save(false))
					{
						$func = Funcionarios::model()->find('Cedula='.$funcionario['funcionario']->Cedula);
						$func->Cod_Jerarquia = $cod_jerarquia;
						$func->save(false);

						$FechaAscenso = FechaAsc::setFechaAscenso($funcionario['funcionario']->Cedula, $cod_jerarquia, null, 'EVALUACION');
						$FechaAscenso->save(false);
					}
					//var_dump($nota_final);
				}
				//Yii::app()->end();

				$aux->updateByPk($id,array('des_proceso_asc'=>'FINALIZADO','des_estatus_cond'=>'INACTIVO'));		
				Yii::app()->user->setFlash('error','El proceso acaba de finalizar, exitosamente');
			}			
			#else {
					
					#$aux->updateByPk($id,array('des_proceso_asc'=>'EN PROCESO','des_estatus_cond'=>'ACTIVO'));		
					#var_dump($aux);
					#yii::app()->end();

			#	}  
				#$aux->updateByPk($id,array('valor'=>'ACTIVO'));	
		$this->redirect(array("tblascnotatotal/index","id"=>$id));
		}
		
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	public function getUltimaFecha()
	{
		$criteria = new CDbCriteria;                                      
        $criteria->addCondition("des_proceso_asc='EN PROCESO'", 'OR'); 
        $criteria->addCondition("des_estatus_cond='ACTIVO'", 'OR'); 
        $Fecha_asc = FechaAsc::model()->find($criteria);

        if($Fecha_asc)
        	return $Fecha_asc->check_in_range($Fecha_asc->fecha_postulacion, $Fecha_asc->fecha_proceso_asc, date('Y-m-d'));
		else
			return false;
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FechaAsc']))
		{
			$model->attributes=$_POST['FechaAsc'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_conf_asc_fecha));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('FechaAsc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

		
	}

	public function actionPpal()
	{
		/**$dataProvider=new CActiveDataProvider('FechaAsc');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/

		$model = new  FechaAsc();
		$id = $model->obtenerUltimoId();

		 $fecha=FechaAsc::model()->findByPk($id);
		 if($fecha != null) {
		 	$this->render('finalizar',array(
			'model'=>$fecha,
		));
		 }else
		 {
		 	Yii::app()->user->setFlash('error','No hay proces de ascenso activo');
		 	$dataProvider=new CActiveDataProvider('FechaAsc');
		 	$this->render('index',array(
		 	'dataProvider'=>$dataProvider,
		 	));
		 }

	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		

		$model=new FechaAsc('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FechaAsc']))
			$model->attributes=$_GET['FechaAsc'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FechaAsc the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FechaAsc::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FechaAsc $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fecha-asc-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
