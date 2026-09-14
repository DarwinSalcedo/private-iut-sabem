<?php

class EspirituBomberilController extends Controller
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
				'actions'=>array('create','update','CargarVeinte'),
				'roles'=>array('admin','Evaluador'),
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


	public function actionCargarVeinte($cedula,$recepcion)
	{
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$model->Cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = EspirituBomberil::model()->find($criteria);
            	#var_dump($cedula);
            	#var_dump($recepcion);
				Yii::app()->user->setFlash('success', "Ha sido registrado exitosamente");

				#$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EspirituBomberil;

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'espiritu-bomberil-form' )
			{
			echo CActiveForm::validate($model);
			#var_dump($_POST['desempenho-form']);
			yii::app()->end();
			}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EspirituBomberil']))
		{
			$evaluador=new Evaluador;
			$CedEvaluador=$_POST['EspirituBomberil']['id_evaluador'];
			$id = $evaluador->buscarUltimo();
			$_POST['EspirituBomberil']['id_evaluador']=$id;
		  
		    $evaluador->guardar($id,
		    	$cedula = $_POST['EspirituBomberil']['Cedula'],
		    	$CedEvaluador,
		    	$fecha = $_POST['EspirituBomberil']['id_conf_asc_fecha']);
			$model->attributes=$_POST['EspirituBomberil'];
			if($model->save()){
				$alerta= new alerta;
				$alerta->generar('EspirituBomberil',$cedula);
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
				
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EspirituBomberil']))
		{
			$model->attributes=$_POST['EspirituBomberil'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_espiritu_bom));
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('EspirituBomberil');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EspirituBomberil('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EspirituBomberil']))
			$model->attributes=$_GET['EspirituBomberil'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EspirituBomberil the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EspirituBomberil::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EspirituBomberil $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='espiritu-bomberil-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
