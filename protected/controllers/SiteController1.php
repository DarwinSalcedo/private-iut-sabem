<?php

class SiteController extends Controller
{
	
#public $layout='//layouts/column1';


	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
	   
	   if (Yii::app()->user->isGuest and  is_null(Yii::app()->user->getState('cedula'))){
				$this->actionLogin();		
			}
		else{
			$this->actionPrincipal();			
		}

	}
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->redirect(Yii::app()->user->returnUrl);  #con esta vista van los errores para el log 
				#$this->render('error', $error);
		}

	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{ $this->layout='//layouts/column1';
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Gracias por contactarnos. Te responderemos lo más pronto posible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				#si esta bloqueado
				if (yii::app()->user->getState('acceso')=='INACTIVO')
					{				
					Yii::app()->user->logout();
					Yii::app()->user->setFlash('error',' TU CUENTA ESTA DESACTIVADA');					
					}
					else
						$this->redirect(Yii::app()->baseUrl.'/Funcionarios/saludo');}
		}
		$this->layout='//layouts/column1';
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionRegistrar()
	{
		$this->layout='//layouts/column1';
		$model=new RegistroForm;
		
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'registro-form' )
			{
			echo CActiveForm::validate($model);
			yii::app()->end();
			}
		
		if(isset($_POST['RegistroForm']))
		{
			$model->attributes=$_POST['RegistroForm'];
			if(!$model->validate())
				{
				$model->addError('error','Error al enviar formulario');
				}
			else
				{				
                                $guardar= new Usuario;
                                $guardar->guardarUsuario($model->username,$model->password,$model->cedula,$model->correo);                                
                               
                                Yii::app()->user->setFlash('success','Gracias por registrarte '.$model->username);
                                unset($model);#libero el objeto
			#	$this->refresh(); 
			$this->redirect(Yii::app()->homeUrl);                               
				}
		}
		
		$this->render('registrar',array('model'=>$model));
	}
	
	public function actionReiniciarContrasena()
	{
		$this->layout='//layouts/column1';
		$model=new SalvarForm;
		
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'SalvarForm' )
			{
			echo CActiveForm::validate($model);
			yii::app()->end();
			}
		
		if(isset($_POST['SalvarForm']))
		{
			$model->attributes=$_POST['SalvarForm'];
			if(!$model->validate())
				{
				$model->addError('salvar','Error al enviar formulario');
				}
			else
				{	

					$usuario=Usuario::model();
					$aux=Usuario::model();
					$aux=$usuario::cargarCedula($model->cedula);
					#$msg='La contraseña de '."$aux->username $aux->cedula".' ha sido reiniciada satisfactoriamente ';
					$contrasena=md5($aux->cedula);
					$aux->updateByPk($aux->id,array('password'=>$contrasena));			
                    
					$alerta= new Alerta();
					$alerta->contrasena();	

                    Yii::app()->user->setFlash('success','tu contraseña ha sido reiniciada con tu numero de cedula ');
                    unset($model);#libero el objeto
					$this->refresh();                                
				}
		}
		
		$this->render('salvar',array('model'=>$model));
	}

	protected function nombremes($month)
	{
 		setlocale(LC_TIME, 'spanish');  
 		$nombre=strftime("%B",mktime(0, 0, 0, $month, 1, 2000)); 
 		return $nombre;
	}
	protected function getDate($date)
	{
			$month = date("m", strtotime($date));
			$day = date("d", strtotime($date));
			$Mes = $this->nombremes($month);
			$Fecha = $Mes.' '.$day; 

		return $Fecha;
	}
	public function actionPrincipal()
	{
		$model = new FechaAsc;

		$PostulationDate = $model->getLastPostulationDate();
		$PromotionDate = $model->getLastPromotionDate();

		if($PostulationDate)
		{
			$FechaPost = $this->getDate($PostulationDate->fecha_postulacion);
			$StatusPost = $PostulationDate->des_estatus_cond;
		}
		else
		{
			$FechaPost = "No Disponible";
			$StatusPost = " ";
		}

		if($PromotionDate)
		{
			$FechaPro= $this->getDate($PromotionDate->fecha_proceso_asc);
			$StatusPro = $PromotionDate->des_proceso_asc;
		}
		else
		{
			$FechaPro = "No Disponible";
			$StatusPro = " ";
		}

		if(is_null(Yii::app()->user->getState('cedula')))
			$this->actionLogin();		              
		else{
			$this->render('index', array('FechaPostulacion' => $FechaPost, 'StatusPost' => $StatusPost,
										'FechaAscenso' => $FechaPro, 'StatusPro' => $StatusPro,));
		}
		
		
	}

	public function actionHelp(){
		$this->layout='//layouts/column1';
		$this->render('help');
	}

	public function actionDevelopers(){
		$this->layout='//layouts/column1';
		$this->render('developers');
	}

	public function actionReglamento(){
		
		$this->render('reglamento');
		//$this->render('Reglamento-Ascensos-Bomberos-2012');
	}
	
}
