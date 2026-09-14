<?php

class AuditoriaController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','Reporte'),
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
		$model=new Auditoria;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Auditoria']))
		{
			$model->attributes=$_POST['Auditoria'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Auditoria']))
		{
			$model->attributes=$_POST['Auditoria'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Auditoria');
		$model=Auditoria::model()->findAll('',array());
		#var_dump($model);
		#yii::app()->end();
		$this->actionReporte('reportepdf',$model);
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Auditoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Auditoria']))
			$model->attributes=$_GET['Auditoria'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Auditoria the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Auditoria::model()->findByPk($id);
		$this->actionReporte('reportepdf',$model);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Auditoria $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='auditoria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

		public function actionReporte($vista,$data)
	{
			ini_set('max_execution_time', 300);#aumento el tiempo de esperar en generar mi pdf de esta  manera no ocaciona problemas equivale a max_execution_time=30 en php.ini
			$mPDF1 = Yii::app()->ePdf->mpdf();	
			#$header='<img src="'.'images/logo.png"/>';
			$header='
 <table width="100%"><tr>
 <td width="60%" style="color:black;"><span style="font-weight: bold; font-size: 14pt;">
 Bomberos del Estado Miranda</span><br />Sistema de Ascenso de los Bomberos del Estado Miranda<br /><span style="font-size: 15pt;">
 </span>RIF:09432477230947jdas / TELF:0212-232355</td>
 <td width="40%" style="text-align: right;"><img src="'.'images/logo.png" width="60px"/></td>
 </tr></table>
 ';
			$mPDF1=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
				 //hacemos un render partial a una vista preparada, en este caso es la vista pdfRepor			
				$mPDF1->SetHTMLHeader($header);
				$mPDF1->SetFooter(' {DATE j/m/Y}|Página {PAGENO}|Reporte de Funcionarios');			
								 $mPDF1->WriteHTML($this->renderPartial($vista, array('model'=>$data), true));
				$mPDF1->Output('Auditoria.pdf','D');
		}

	
	
}
