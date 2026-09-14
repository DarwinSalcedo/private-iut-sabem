<?php

class PostularseController extends Controller
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
				'actions'=>array('create'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','rechazar'),
				'roles'=>array('super','admin'),
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

		if($model->id_status == 1)
		{
			Yii::app()->user->setFlash('success','Postulación aceptada' );	
			//$this->actionView($model->id_postularse);
		}
		if($model->id_status == 2)
		{
			Yii::app()->user->setFlash('error','Postulación rechazada' );	
			//$this->actionView($model->id_postularse);
		}
		if($model->id_status == 3)
		{
			Yii::app()->user->setFlash('notice','Postulación en revisión' );	
			//$this->actionView($model->id_postularse);
		}

		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	/*public function actionConsultar()
	{
		$model = new Postularse;
		$Postulante = $model->getFuncionario();

		if($Postulante->id_status == 1)
		{
			Yii::app()->user->setFlash('success','Su postulación ha sido aceptada' );	
			$this->actionView($Postulante->id_postularse);
		}
		if($Postulante->id_status == 2)
		{
			Yii::app()->user->setFlash('error','Su postulación ha sido rechazada' );	
			$this->actionView($Postulante->id_postularse);
		}
		if($Postulante->id_status == 3)
		{
			Yii::app()->user->setFlash('notice','Su postulación está en revisión' );	
			$this->actionView($Postulante->id_postularse);
		}
	}*/
	public function actionCreate()
	{
		$model=new Postularse;
		//$model2=$this->loadModel(1);
		$Fecha_Asc = $model->getFechaAsc();
		$PostExist = $model->getFuncionarioPost();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Postularse']))
		{
			$cedula=$_POST['Postularse']['cedula'];

			//print_r($cedula);
			//yii::app()->end();

			$Funcionario = $model->getFuncionarioCed($cedula);			
			$Antiguedad = $model->getUltimaFecha($cedula);

			// Se agrega la busqueda del nivel academico para conocer si es bachiller
			$NivelAcademico = $model->getNivelAcademicoPostularse($cedula);

			if($cedula == yii::app()->user->getState('cedula'))
			{
				if($Funcionario->Cod_Condicion == 1)
				{
					if($NivelAcademico)
					{
						if ($NivelAcademico != "NO BACHILLER")//Si es NO BACHILLER no puede postularse
						{
							$MaximoRango = $model->getMaximoRango($Funcionario);
							if($Funcionario->Cod_Jerarquia > $MaximoRango)
							{
								if($Antiguedad <= $this->AscensoYear($model->anhosRequeridoJerarquia($Funcionario->Cod_Jerarquia-1)))
								{
									//$model->cedula=$_POST['Postularse']['cedula'];
									if(!is_null($Funcionario))
									{	
										$model->cedula = $Funcionario->Cedula;
										$model->nombre = $Funcionario->Nombre;
										$model->apellido = $Funcionario->Apellidos;
										$model->cargo = $Funcionario->Cod_Jerarquia;
										$model->id_status = 3;
										$model->id_conf_asc_fecha = $model->getFechaAsc()->id_conf_asc_fecha;
									}
										if($model->save())
											$this->redirect(array('view','id'=>$model->id_postularse));
								}
								elseif($Funcionario->Cod_Jerarquia == $MaximoRango)
									Yii::app()->user->setFlash('error','Ud. no cumple con la antiguedad requerida para postularse' );	
							}
							else
								Yii::app()->user->setFlash('notice','Ud. ya ha alcanzado el máximo rango permitido de jerarquía' );					
						}
						else //Si es NO BACHILLER no puede postularse
							Yii::app()->user->setFlash('notice','Ud. no cuenta con el nivel académico mínimo permitido.' );
					}
					else //No cuenta con nivel académico
							Yii::app()->user->setFlash('notice','Ud. no cuenta con el nivel académico' );					
				}
				elseif($Funcionario->Cod_Condicion == 2)
					Yii::app()->user->setFlash('error','Ud. se encuentra inactivo.' );					
			}
			else
				Yii::app()->user->setFlash('error','Cédula no es valida. Ingrese su cédula para postularse.' );					
		}


		$this->render('create',array(
			'model'=>$model, 'Fecha_Asc'=>$Fecha_Asc, 'PostExist'=>$PostExist,
		));
	}

	public function actionRechazar($cedula)
	{
		$model = new Postularse;
		$Postulante = $model->getPostulante($cedula);

		$Postulante->id_status = 2;
		$Postulante->save();
		$this->redirect(array('view','id'=>$Postulante->id_postularse));
	}

	protected function AscensoYear($num)
	{
		if($num == 3)
			return date('Y-m-d', strtotime('-3 year'));
		if($num == 2)
			return date('Y-m-d', strtotime('-2 year'));
		if($num == 1)
			return date('Y-m-d', strtotime('-1 year'));
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

		if(isset($_POST['Postularse']))
		{
			$model->attributes=$_POST['Postularse'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_postularse));
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
		$criteria = new CDbCriteria;                                      
        $criteria->addCondition('id_status=2','OR'); 
        $criteria->addCondition('id_status=3','OR'); 
        
        $dataProvider=new CActiveDataProvider('Postularse', array(
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
		$model=new Postularse('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Postularse']))
			$model->attributes=$_GET['Postularse'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Postularse the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Postularse::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Postularse $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='postularse-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
