<?php

class PostuladosController extends Controller
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
				'actions'=>array('create','update', 'postulados'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
			$model = $this->loadModel($id);

			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('Cedula=:ced'); 
            $criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            $criteria->params=array(':ced'=>$model->Cedula,':asc_fecha'=>$model->id_conf_asc_fecha);                   
            $Espiritu_bomb = EspirituBomberil::model()->find($criteria);
            $AptitudActitud = AptitudActitud::model()->find($criteria);
            $Competencia = Competencia::model()->find($criteria);
            $Desempenho = Desempenho::model()->find($criteria);
            $Habilidad = Habilidad::model()->find($criteria);
            $Fisica = Fisica::model()->find($criteria);
            $Medico = ExamenMedico::model()->find($criteria);
            $Antidoping = Antidoping::model()->find($criteria);

            $this->render('view',array(
			'model'=>$model,'Espiritu_bomb'=>$Espiritu_bomb,'AptitudActitud'=>$AptitudActitud,
			'Competencia'=>$Competencia,'Desempenho'=>$Desempenho,
			'Habilidad'=>$Habilidad,'Fisica'=>$Fisica,
			'Medico'=>$Medico,'Antidoping'=>$Antidoping,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($cedula)
	{
		$model = new Postulados;
		$model_evaluador = new Evaluador;
		//print_r($cedula);
		//yii::app()->end();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Postulados']))
		{
			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('cedula=:ced'); 
            $criteria->params=array(':ced'=>$cedula);
            $Postulado = Postularse::model()->find($criteria);                    
            $Funcionario = Funcionarios::model()->find($criteria);
            
            yii::app()->end();
            $model->id_conf_asc_fecha = $model->getConfAscFecha();
            $model->Cedula = $Funcionario->Cedula;
			$model->fecha_postulacion = date("Y-m-d");
			$model->hora_postulacion = date('h:i:s');
			$model->cedula_fun_recepcion = $_POST['Postulados']['cedula_fun_recepcion'];
			$model->des_datos_receptor = $_POST['Postulados']['des_datos_receptor'];
			$model->Cod_Jerarquia = $Funcionario->Cod_Jerarquia;
			$model->id_asc_fecha = 1010; //No se que datos van aquí
			$model->id_fecha_ingreso = 1010; //Prueba
			//$model->id_fecha_ingreso = $model->getFechaIngreso($cedula);
			$model->num_modificar = 1; //No se que datos van aquí

			//Cambiar el status del postulado
			$Postulado->id_status = 1;
			$Postulado->save();

			//Crear relacion evaluador - evaluado
			$model_evaluador->Cedula = $cedula;
			$model_evaluador->CedEvaluador = $_POST['Postulados']['cedula_fun_recepcion'];
			$model_evaluador->id_conf_asc_fecha = $model->getConfAscFecha();
			$model_evaluador->save();

			//Asignar rol a evaluador
			$Evaluador = $model->getUser($_POST['Postulados']['cedula_fun_recepcion']);
			if($Evaluador)
			{
				if(yii::app()->authManager->checkAccess('demo',$Evaluador->id))//Verifica que tenga permisos de usuario
				{	yii::app()->authManager->revoke('demo',$Evaluador->id);//Quita el items        	
					yii::app()->authManager->assign('Evaluador',$Evaluador->id);//asigna el items        	
				}
			}
			//$model->attributes=$_POST['Postulados'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_postulados));
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

		if(isset($_POST['Postulados']))
		{
			$model->attributes=$_POST['Postulados'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_postulados));
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
		$dataProvider=new CActiveDataProvider('Postulados');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionPostulados()
	{
		$model = new Postulados;
		$criteria = new CDbCriteria;                                      
        $criteria->addCondition('cedula_fun_recepcion=:ced'); 
        $criteria->addCondition('id_conf_asc_fecha=:fecha_asc'); 
        $criteria->params=array(':ced'=>yii::app()->user->getState('cedula'),':fecha_asc'=>$model->getLastConfAscFecha());

		$dataProvider=new CActiveDataProvider('Postulados', array(
            'criteria'=>$criteria,
    ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Postulados('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Postulados']))
			$model->attributes=$_GET['Postulados'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Postulados the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Postulados::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Postulados $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='postulados-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
