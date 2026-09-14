<?php

class UsuarioController extends Controller
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
				'actions'=>array('index','view','obtenerEtiqueta','AjaxActivador',
				'ReiniciarPass','cambiarContrasena'),				
				'roles'=>array('admin'),				
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','cambiarContrasena','datos'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','asignarPermiso','Bloquear','username',),
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
		$role=new RoleForm;
		
		if (isset($_POST["RoleForm"]))
		{
			$role->attributes=$_POST["RoleForm"];
			if($role->validate())
			{
				yii::app()->authManager->createRole($role->name,$role->description);
				yii::app()->authManager->assign($role->name,$id);
				$this->redirect(array("view","id"=>$id));
			}
		}		
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'role'=>$role,//envio mi formulario
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuario;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
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

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
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
	public function actionIndex(){
	
		$dataProvider=new CActiveDataProvider('Usuario', array(
			'criteria'=>array(
				'condition'=>'id<>'.Yii::app()->user->getId())));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionAsignarPermiso($id)
	{
		foreach(yii::app()->authManager->getAuthItems() as $data)
		{

        
	        if ($data->name==$_GET["item"]){
					if(yii::app()->authManager->checkAccess($data->name,$id)) //si llega el item lo elmina	
							yii::app()->authManager->revoke($_GET["item"],$id);//lo quita
					else
							yii::app()->authManager->assign($_GET["item"],$id);//asigna el items        	
		    }else{
	        		#if(yii::app()->authManager->checkAccess($data->name,$id))//si llega el item lo elmina	
							yii::app()->authManager->revoke($data->name,$id);//lo quita			
		 
	        } 
	     }		
		$this->redirect(array("view","id"=>$id));	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	 // en la controladora o componente:
	public function obtenerEtiqueta($model){
		#var_dump($model->attributes['estatus']);
		
		if(($model->attributes['estatus']=='ACTIVO') or ($model->attributes['estatus']==='ACTIVO')){
			return "Desactivado";
		}else{
			return "Activado";
		}
	}
	public function actionAjaxActivador($id){
		// activara al usuario en la sesion de ejemplo, pudimos haber dicho aqui:
		//   "por favor activa este usuario en la nomina seleccionada"
		
		$etiqueta = "";
		$model=Usuario::model();
		$aux=Usuario::model();
		$aux=$model::cargar($id);
		if ($aux->attributes['estatus']=='ACTIVO')#activo
		{
		$aux->updateByPk($id,array('estatus'=>'INACTIVO'));
		$etiqueta = "Activado";
		
		
		}			
		else { 
			 $aux->updateByPk($id,array('estatus'=>'ACTIVO'));
				$etiqueta = "Desactivado";
		}
		
		
		echo $etiqueta;
	}

	
	
	public function actionBloquear($id)
	{  $model=Usuario::model();
		$aux=Usuario::model();
		$aux=$model::cargar($id);
		if ($aux->attributes['estatus']=='ACTIVO')#activo
		{
		$aux->updateByPk($id,array('estatus'=>'INACTIVO'));		
		}			
		else   $aux->updateByPk($id,array('estatus'=>'ACTIVO'));	
		$this->redirect(array("view","id"=>$id));
	}
	
	public function actionDatos(){
		$Username= new UsernameForm();
		$Correo= new CorreoForm();
		

		
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'UsernameForm' )
			{
			echo CActiveForm::validate($Username);
			yii::app()->end();
			}

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'CorreoForm' )
			{
			echo CActiveForm::validate($Correo);
			yii::app()->end();
			}


		
		if(isset($_POST['UsernameForm']))
		{
			$Username->attributes=$_POST['UsernameForm'];
			$Username->guardarNombreUsuario();	
			$alerta= new Alerta();
			$alerta->nombre();		
			Yii::app()->user->setFlash('success','Nombre de usuario actualizado satisfactoriamente');	
		}

		if(isset($_POST['CorreoForm']))
		{
			$Correo->attributes=$_POST['CorreoForm'];
			$Correo->guardarCorreo();
			$alerta= new Alerta();
			$alerta->correo();	
			Yii::app()->user->setFlash('success','Correo actualizado satisfactoriamente');	
		}
		
		$this->render('Datos',array('Username'=>$Username,'Correo'=>$Correo,'datos'=>$d=Usuario::model()->cargarCedula(yii::app()->user->getState('cedula'))));
		
	}
	
	public function actionCambiarContrasena(){
		$model= new ContrasenaForm();
		$alerta= new Alerta();
		$msg='La contraseña ha sido cambiada';		
		$usuario=Usuario::model()->cargarCedula(yii::app()->user->getState('cedula'));
		
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'ContrasenaForm' )
			{
			echo CActiveForm::validate($model);
			yii::app()->end();
			}
		
		if(isset($_POST['ContrasenaForm']))
		{
			$model->attributes=$_POST['ContrasenaForm'];
			$model->guardarContrasena($model->attributes['password']);
			$alerta->cambioContrasena();
			#$this->refresh();	
			$model->passActual='';$model->password='';
			$model->repetirPassword='';
			Yii::app()->user->setFlash('success',$msg );	
		}
		
			
			$this->render('Contrasena',
		array('model'=>$model,'usuario'=>$usuario));
		
	}
	
	public function actionReiniciarPass($id)
	{
		
		$model=Usuario::model();
		$aux=Usuario::model();
		$aux=$model::cargar($id);
		$msg='La contraseña de '."$aux->username $aux->cedula".' ha sido reiniciada satisfactoriamente ';
		$contrasena=md5($aux->cedula);
		$aux->updateByPk($aux->id,array('password'=>$contrasena));
		Yii::app()->user->setFlash('notice',$msg );	
		$this->actionAdmin();
		#bandera
		#enviar notificacion usuario
		#bandera para el usurio que cambien su clave	
		
	}



		public function actionusername(){
		$model= new DatosForm();
		$msg='tus Datos han sido actualizados';
		
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'DatosForm' )
			{
			echo CActiveForm::validate($model);
			yii::app()->end();
			}
		
		if(isset($_POST['DatosForm']))
		{
			$model->attributes=$_POST['DatosForm'];
			#$model->guardarContrasena($model->attributes['password']);
			
			Yii::app()->user->setFlash('success',$msg );	
		}
		
		$this->render('_datos',array('model'=>$model,'datos'=>$d=Usuario::model()->cargarCedula(yii::app()->user->getState('cedula'))));
		
	}

}
