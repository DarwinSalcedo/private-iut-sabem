<?php

class TblAscNotaTotalController extends Controller
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
				'actions'=>array('admin','delete', 'results'),
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
		$Fun_Jer = $this->getAscendidos($id);

		$this->render('view',array(
			'dataProvider'=>$Fun_Jer,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TblAscNotaTotal;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblAscNotaTotal']))
		{
			
			
			$fec_asc = FechaAsc::getLastConfAscFecha();
			$cedula = $_POST['TblAscNotaTotal']['Cedula'];
			$Funcionario = Funcionarios::model()->find('Cedula='.$cedula);
			$new_cod_jer = $Funcionario->Cod_Jerarquia-1;
			$NotaTotal = TblAscNotaTotal::model()->find('Cedula='.$cedula.' AND id_conf_asc_fecha='.$fec_asc->id_conf_asc_fecha);
			
			if(!is_null($NotaTotal))
			{
				$MaximoRango = Postularse::getMaximoRango($Funcionario);
				if($Funcionario->Cod_Jerarquia > $MaximoRango)
				{
					$model->Cedula = $cedula;
					$model->num_nota_total = 0;
					$model->Cod_Jerarquia = $new_cod_jer;
					$model->Fecha_Ingreso = $Funcionario->Fecha_Ingreso;
					$model->des_revisar = 'REVISADO';

					if(!is_null($fec_asc))
						$model->id_conf_asc_fecha = $fec_asc->id_conf_asc_fecha;
					else
						$model->id_conf_asc_fecha = 0;
					
					$FechaAscenso = FechaAscenso::setFechaAscenso($cedula, $new_cod_jer, $fecha_proceso_asc, $_POST['TblAscNotaTotal']['des_ascenso']);
					$FechaAscenso->save(false);

					if($model->save(false))
					{
						$Funcionario->Cod_Jerarquia = $new_cod_jer;
						$Funcionario->save(false);

						$this->redirect(array('view','id'=>$model->id_nota_total));
					}
				}else
					Yii::app()->user->setFlash('notice','El funcionario ya ha alcanzado el máximo rango permitido de jerarquía' );	
				
			}else
				Yii::app()->user->setFlash('error','El funcionario ya ha ascendido en el último proceso de ascenso');
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

		if(isset($_POST['TblAscNotaTotal']))
		{
			$model->attributes=$_POST['TblAscNotaTotal'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_nota_total));
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
	 * List of all models.
	 */
	public function actionIndex()
	{
		
		$dataProvider=new CActiveDataProvider('FechaAsc');

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists of results order by num_total.
	 */
	public function actionResults()
	{
		if(FechaAsc::getLastConfAscFecha())
			$id_cfa = FechaAsc::getLastConfAscFecha()->id_conf_asc_fecha;
		else
			$id_cfa = null;
		
		$Fun_Jer = $this->getAscendidos($id_cfa);

		$this->render('view',array(
			'dataProvider'=>$Fun_Jer,
		));
	}

	public function getAscendidos($id_cfa)
	{
		if($id_cfa)
		{
			$jerarquias = Jerarquia::model()->findAll();
			$Fun_Jer = array();
			foreach ($jerarquias as $jerarquia)
			{
				$ascendidos = array();
				#$NotasPorJeraquia = TblAscNotaTotal::getNotasPorJerarquia($jerarquia, $id_cfa);

            	$NotasPorJeraquia = TblAscNotaTotal::model()->findAll(TblAscNotaTotal::getNotasPorJerarquia($jerarquia, $id_cfa));

	            foreach ($NotasPorJeraquia as $NotaFuncionario)
	            {
	            	$ascendido = Funcionarios::model()->find('Cedula='.$NotaFuncionario->Cedula);
	            	$ascendido->num_nota_total = $NotaFuncionario->num_nota_total;
	            	array_push($ascendidos, $ascendido);
	            }
	            $func_notas = array('cod_jerarquia'=>$jerarquia->Cod_Jerarquia, 'des_jerarquia'=>$jerarquia->Descripcion_Jerarquia, 'funcionarios'=>$ascendidos);
	            array_push($Fun_Jer, $func_notas);
	            unset($func_notas);
	            unset($ascendidos);
			}

		}else
			$Fun_Jer = null;

		return $Fun_Jer;
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblAscNotaTotal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblAscNotaTotal']))
			$model->attributes=$_GET['TblAscNotaTotal'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblAscNotaTotal the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblAscNotaTotal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblAscNotaTotal $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-asc-nota-total-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
