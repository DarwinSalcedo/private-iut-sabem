<?php

class FuncionariosController extends Controller
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
				'actions'=>array('index','view','saludo','antidoping','Inasistente',
								'apto','noApto','resultados','ascenso','Evaluaciones',
								'EvaluacionesyExamenes','CargarVeinteB','CargarVeinteC'
								,'CargarVeinteD','CargarVeinteAA','CargarVeinteH',
								'CargarAF','CargarEM','CargarA','cargarPsiq',),
				'roles'=>array('admin','demo','Evaluador'),
				
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'roles'=>array('admin'),
				
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','saludo','Reporte',
                                                'Reportes','CargarDatosReporte','Postulacion',
                                                'desempenho','cargarModelo','suma',
                                                'Examen','Evaluador','VistaCompleta',
                                                'desactivarVistaCompleta'),
				'roles'=>array('admin'),
				
				
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	/**
	 * Muestra una vista preparada donde recibe como parametro.
	 * @param integer $id el ID del modelo que se cargara 
	 *llama a difentes funciones para setear las variables de envio 
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'data1' => $this->actionVistaEvaluador($id), #FuncRecepcion
			'desempeno' => $this->actionDesempenho($id), #desempeño
			'data2' => $this->actionExamen($id) , #resultados
		));
		
	}


		public function actionResultados()
	{
		$model=Funcionarios::model()->cargarCedula(yii::app()->user->getState('cedula'));
		$this->render('view',array(
			'model'=>$this->loadModel($model->id_funcionario),
	'data1' => $this->actionVistaEvaluador($model->id_funcionario), #FuncRecepcion
	'desempeno' => $this->actionDesempenho($model->id_funcionario), #desempeño
	'data2' => $this->actionExamen($model->id_funcionario) , #resultados
	));
		
	}

			public function actionAscenso()
	{
		$model=Funcionarios::model()->cargarCedula(yii::app()->user->getState('cedula'));
		$this->render('ascenso',array(
			'model'=>$this->loadModel($model->id_funcionario),));		
	}



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Funcionarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Funcionarios']))
		{
			$model->attributes=$_POST['Funcionarios'];
			if($model->save()){

				#asignar fecha ingreso
				$FechaIng = new FechaIngreso;
				$FechaIng->Cedula = $model->Cedula;
				$FechaIng->fecha_ingreso = $model->Fecha_Ingreso;
				$FechaIng->des_fecha_ingreso = 'Ingreso';
				if (!$FechaIng->save(false))
					throw new CDbException(Yii::t('yii','The active record cannot be inserted to database.'));
				
				#asignar nivel académico
				$NivAcademico = new FuncionarioNivelAcademico;
				$NivAcademico->Cedula = $model->Cedula;
				$NivAcademico->des_nivel_acade = $_POST['Funcionarios']['des_nivel_acade'];
				$NivAcademico->num_TotNivelAcaPorc = $NivAcademico->obtenerPuntos($_POST['Funcionarios']['des_nivel_acade']);
				$NivAcademico->num_TotNivelAcaNota = $NivAcademico->obtenerPuntos($_POST['Funcionarios']['des_nivel_acade']);
				$NivAcademico->id_conf_asc_fecha = 0;
				if (!$NivAcademico->save(false))
					throw new CDbException(Yii::t('yii','The active record cannot be inserted to database.'));

				#asignar antiguedad
				$antiguedad = new Antiguedad;
				$antiguedad->Cedula = $model->Cedula;
				$antiguedad->num_anos = $antiguedad->calcularAnos($model->Fecha_Ingreso);
				$antiguedad->num_TotAntigPorc = $antiguedad->calcularAnos($model->Fecha_Ingreso);
				$antiguedad->num_TotAntigNota = $antiguedad->calcularAnos($model->Fecha_Ingreso);
				$antiguedad->id_conf_asc_fecha = 0;
				if (!$antiguedad->save(false))
					throw new CDbException(Yii::t('yii','The active record cannot be inserted to database.'));


				Yii::app()->user->setFlash('success', "Ha sido registrado exitosamente");
				$this->redirect(array('view','id'=>$model->id_funcionario));}
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
		$nivel = new  FuncionarioNivelAcademico;
		$nivel1 = new  FuncionarioNivelAcademico;

		$nivel1=$nivel->cargarModelo($model->Cedula);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	

		if(isset($_POST['Funcionarios']))
		{
			$model->attributes=$_POST['Funcionarios'];
			$nivel->actualizarNivelAcademico($_POST['Funcionarios']['Cedula'],								
								$_POST['Funcionarios']['des_nivel_acade']);

			if($model->save()){
			//msj
			Yii::app()->user->setFlash('success', "Sus datos han sido actualizados");

				$this->redirect(array('view','id'=>$model->id_funcionario));}
		}

		$this->render('update',array(
			'model'=>$model,
			'nivel'=>$nivel1,
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
		Yii::app()->user->setFlash('success', "Eliminado satisfactoriamente");
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	
	# incializo 
		$dataProvider=new CActiveDataProvider('Funcionarios');
		
		if (isset($_GET['pdf'])){							
				$mPDF1 = Yii::app()->ePdf->mpdf();
				
				 $mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
				 //hacemos un render partial a una vista preparada, en este caso es la vista pdfRepor
						
				
				$mPDF1->Output();
		}
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionReportes()
	{
		$menu=new menuJerarquiaForm;
		
		if (isset($_POST["menuJerarquiaForm"]))
		{
			$menu->attributes=$_POST["menuJerarquiaForm"];
			if($menu->validate())
			{				
				$model=Funcionarios::model()->findAll('Cod_Jerarquia=:post_id ',array(
								':post_id'=>$_POST["menuJerarquiaForm"]['codigo'],									
								));# -->devuelve un array de Personas. (El modelo sobre el que se realiza la búsqueda)
				$this->actionReporte('reportepdf',$model);	
			}
		}	
	$this->render('reporte',array(
		'model'=>$menu,
	));
	}
	
	
	public function actionCargarDatosReporte($id)
	{
	$model=$this->loadModel($id);# -->devuelve un array de Personas. (El modelo sobre el que se realiza la búsqueda)
	
	$this->actionReporte('reportepdf',$model);
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
				$mPDF1->Output('Reporte.pdf','D');
		}
	
	


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Funcionarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Funcionarios']))
			$model->attributes=$_GET['Funcionarios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Funcionarios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Funcionarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	

	/**
	 * Performs the AJAX validation.
	 * @param Funcionarios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='funcionarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	
	public function actionSaludo()
	{	
	 $this->layout='//layouts/column2';
		$this->render('saludo',
		array('model'=>$model=Funcionarios::model()->cargarCedula(yii::app()->user->getState('cedula'))));
	}
	
	
	
	
	#cargo el modelo 
	#verifico si esta activo 
	#verfico años de antigueda
	#verificar ultimo año de postulacion
	
	public function actionPostulacion($id)
	{		 
	$model=$this->loadModel($id);
	$msg='';
	 if ($model->Cod_Condicion === '2' )#2 es que esta en conficion de inactivo
	 {	 
		$msg ='actualmente no se encuentra activo lo sentimos no puede proceder a postularse ';	 
	 }
	 else
	 {
		 $anos=new Antiguedad;
		 $antiguedad=new Antiguedad;
		 $antiguedad=$anos->cargarCedula($model->Cedula);

			 if ($antiguedad ===  null) 
			 {
				$msg .=' No pudimos encontrar la antiguedad asociada a tu identificacion ,actualmente no tienes el tiempo suficiente para optar por un ascenso';
			 
			 }
			 else
			 {
			  $jerarquiaAscender=$model->verificarJerarquia();#jerarquia inmediata a ascender 
				if ($model->cumpleAnhosAntiguedad($jerarquiaAscender,$antiguedad->num_anos))	
						$msg .=' Cumple con los requisitos minimos de tiempo  para postularse ';
					else
						$msg .=' No Cumple con los requisitos minimos de tiempo  para postularse ';
			 }
			
			 
		
	 }
	 
	Yii::app()->user->setFlash('notice',$msg );	
	$this->actionView($id);
	}
       
         public function suma($a=null,$b=null,$c=null,$d=null,$e=null)
	{
            return $suma = $a + $b + $c + $d + $e;
           #  return $suma = $espiritu->num_TotEspNota + $competencia->num_TotComNota + $desempenho->num_TotDesemNota + $aptitud->num_TotAcNota + $habilidad->num_TotHaNota;
	}
        
        /*Instanciar espiritu,competencia,desempeño,aptitud y habilidad 
         * tratamientos y sumatorias de notas
         * finalmente devuelve una nota final y una vista renderizada con todas las notas
         */
        public function actionDesempenho($id)
	{
            $model=$this->loadModel($id);
            $cedula=$model->Cedula;
            
            $espiritu = EspirituBomberil::model()->CargarModelo($cedula)? (double)EspirituBomberil::model()->CargarModelo($cedula)->num_TotEspNota :0;
            
          $competencia= Competencia::model()->CargarModelo($cedula) ? (double)Competencia::model()->CargarModelo($cedula)->num_TotComNota: 0;
           
          $desempenho= Desempenho::model()->CargarModelo($cedula) ?  (double)Desempenho::model()->CargarModelo($cedula)->num_TotDesemNota : 0; 
           
           $aptitud=  AptitudActitud::model()->CargarModelo($cedula) ?  (double)AptitudActitud::model()->CargarModelo($cedula)->num_TotAcNota : 0;
           
           $habilidad= Habilidad::model()->CargarModelo($cedula)? (double)Habilidad::model()->CargarModelo($cedula)->num_TotHaNota :0;
     
          
         $arrayD = array('EspirituBomberil'   =>  $espiritu,
                				'competencia'=>  $competencia,
                				'desempenho' =>  $desempenho,
                				'aptitud'    =>  $aptitud,
                				'habilidad'  =>  $habilidad,
                				'suma'  =>  $this->suma($espiritu,$competencia,$desempenho,$aptitud,$habilidad) );
  
        return $arrayD; 
	}  
        /*Instanciar  
         * tratamientos y sumatorias de notas
         * finalmente devuelve una nota final y una vista renderizada con todas las notas
         */
        public function actionExamen($id)
	{
		$examenes = array(0 => false,1 => false,2 => false,3 => '',4 => '',5 => '',6 => false,7 => '', );

            $model=$this->loadModel($id);
            $cedula=$model->Cedula;
            $msg='';
            $fisico= Fisica::model()->CargarModelo($cedula);
            $medico= ExamenMedico::model()->CargarModelo($cedula);
            $antidoping= Antidoping::model()->CargarModelo($cedula);
            $psiquico = Psiquica::model()->CargarModelo($cedula);
            //var_dump($psiquico);
          //  yii::app()->end();
      if($model->Cod_Condicion != 2)
      	{
            if (($fisico === null) or ($medico === null) or ($antidoping === null) or ($psiquico === null) )
            {
                $msg=' No hemos podido cargar los examenes medicos,revise si estan cargadas '; 
                $msg .='';
            }
           else
           {              
                    if ($fisico->des_fisica_condicion == 'APTO') {                       
                        $examenes[3] ='El resultado de Examenes :  Fisico '.$fisico->des_fisica_condicion;
                  			$examenes[0] = true;
                  			 
                  	 }
                   else{
                        $examenes[3] ='El resultado de Examenes :  Fisico '.$fisico->des_fisica_condicion;  
                  		$examenes[0] = false;
                    }
                    
                    if ($medico->des_asist_exa_condicion == 'APTO'){                        
                       $examenes[4] =' Medico '.$medico->des_asist_exa_condicion;
                       $examenes[1] = true;
                   		}
                    else{
                        $examenes[4] =' Medico '.$medico->des_asist_exa_condicion;
                  $examenes[1] = false;
                    }
                    if ($antidoping->des_antid_condicion === null or $antidoping->des_antid_condicion === "" ){

                       $examenes[5] =' Antidoping Inasistente'; 
						$examenes[2] = false;
                   }
                    else{
                        $examenes[5] =' Antidoping '.$antidoping->des_antid_condicion;             
                   		$examenes[2] = true;
                    }
                    if ($psiquico->des_psi_condicion == 'APTO') {                       
                        $examenes[7] ='El resultado de Examenes :  Psiquico '.$psiquico->des_psi_condicion;
                  			$examenes[6] = true;
                  			 
                  	 }
                   else{
                        $examenes[7] ='El resultado de Examenes :  Psiquico '.$psiquico->des_psi_condicion;  
                  		$examenes[6] = false;
                    }
                  $msg .='<br> <a href="'.yii::app()->createUrl('/notas/create', array('ced'=>'1')).'"> Ver Detalles </a>';	 
            }
        }   

            #  Yii::app()->user->setFlash('notice',$msg );
            # $this->render('view',array(
			#'model'=>$model,
		    # ));

		    return $examenes;      
	} 
   
        
        public function actionVistaEvaluador($id){
         
           $model=$this->loadModel($id); 
           $cedula=$model->Cedula;
           $buscarEval= Postulados::model()->getFuncionarioRecepcion($cedula);
           if ($buscarEval){
           		$evaluador = Funcionarios::model()->CargarModelo($buscarEval);
           		return $evaluador; 
           	}
           	else return null; 
 		
        }
        
       public function actionAntidoping(){

       	echo "Antidoping negativo";

       }

        public function actionApto(){

       	echo "Apto ";
       	
       }

        public function actionNoApto(){

       	echo "No Apto";
       	
       }

        public function actionInasistente(){

       	echo "Antidoping Inasistente";
       	
       }
      


       	public function actionEvaluaciones()
	{
		
		$menu=new menuPostuladosForm;
		
		if (isset($_POST["menuPostuladosForm"]))
		{
			$menu->attributes=$_POST["menuPostuladosForm"];
			if($menu->validate())
			{#cargar todas las notas	
						
			
			$this->actionEvaluacionesyExamenes($_POST["menuPostuladosForm"]['codigo']);
			Yii::app()->end();
			}
		}	
	$this->render('postulados',array(
		'model'=>$menu,
	));
	}



	public function actionEvaluacionesyExamenes($cedula)
	{
			$funcionario=Funcionarios::model()->cargarCedula($cedula);
			$postulados= new Postulados;
			$model = $postulados->cargarCedula($cedula);

			$criteria = new CDbCriteria;                                      
            $criteria->addCondition('Cedula=:ced'); 
            $criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            $criteria->params=array(':ced'=>$model->Cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            $Espiritu_bomb = EspirituBomberil::model()->find($criteria);
            $AptitudActitud = AptitudActitud::model()->find($criteria);
            $Competencia = Competencia::model()->find($criteria);
            $Desempenho = Desempenho::model()->find($criteria);
            $Habilidad = Habilidad::model()->find($criteria);
            $Fisica = Fisica::model()->find($criteria);
            $Medico = ExamenMedico::model()->find($criteria);
            $Antidoping = Antidoping::model()->find($criteria);
            $psiquico = Psiquica::model()->find($criteria);
             //var_dump($psiquico);
           //yii::app()->end();

			
            $this->render('vista',array(
			'model'=>$model,'funcionario'=>$funcionario,'Espiritu_bomb'=>$Espiritu_bomb,'AptitudActitud'=>$AptitudActitud,
			'Competencia'=>$Competencia,'Desempenho'=>$Desempenho,
			'Habilidad'=>$Habilidad,'Fisica'=>$Fisica,
			'Medico'=>$Medico,'Antidoping'=>$Antidoping,'Psiquica'=>$psiquico,
		));
	}
		public function actionCargarVeinteB($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = EspirituBomberil::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(EspirituBomberil::actualizar($model->id_espiritu_bom))
            			Yii::app()->user->setFlash('success', "Se ha actualizado espiritu bomberil");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(EspirituBomberil::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado espiritu bomberil");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}
		public function actionCargarVeinteC($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = Competencia::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(Competencia::actualizar($model->id_competencia))
            			Yii::app()->user->setFlash('success', "Se ha actualizado compentencia");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(Competencia::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado compentencia");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}

		public function actionCargarVeinteD($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = Desempenho::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(Desempenho::actualizar($model->id_desempe))
            			Yii::app()->user->setFlash('success', "Se ha actualizado espiritu bomberil");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(Desempenho::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado espiritu bomberil");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}
		
		public function actionCargarVeinteAA($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = AptitudActitud::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(AptitudActitud::actualizar($model->id_aptitud))
            			Yii::app()->user->setFlash('success', "Se ha actualizado espiritu bomberil");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(AptitudActitud::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado espiritu bomberil");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}	

	public function actionCargarVeinteH($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = Habilidad::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(Habilidad::actualizar($model->id_habilidad))
            			Yii::app()->user->setFlash('success', "Se ha actualizado espiritu bomberil");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(Habilidad::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado espiritu bomberil");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}

	public function actionCargarAF($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = Fisica::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(Fisica::actualizar($model->id_fisica))
            			Yii::app()->user->setFlash('success', "Se ha actualizado fisica");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(Fisica::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado fisica");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}	

	public function actionCargarEM($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = ExamenMedico::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(ExamenMedico::actualizar($model->id_exa_medico))
            			Yii::app()->user->setFlash('success', "Se ha actualizado examen medico");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(ExamenMedico::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado examen medico");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}

		public function actionCargarA($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = Antidoping::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(Antidoping::actualizar($model->id_antidoping))
            			Yii::app()->user->setFlash('success', "Se ha actualizado examen antidoping");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(Antidoping::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado examen antidoping");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}

		public function actionCargarPsiq($cedula,$recepcion)
	{
		
				$criteria = new CDbCriteria;                                      
            	$criteria->addCondition('Cedula=:ced'); 
            	$criteria->addCondition('id_conf_asc_fecha=:asc_fecha');
            	$criteria->params=array(':ced'=>$cedula,':asc_fecha'=>FechaAsc::obtenerUltimoId());                   
            	$model = Psiquica::model()->find($criteria);
            	
            	if($model)#actualizo
            	{
            		if(Psiquica::actualizar($model->id_psiquica))
            			Yii::app()->user->setFlash('success', "Se ha actualizado examen Psiquica");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	
            	}
            	else #inserto
            	{
					
					if(Psiquica::insertar($cedula,$recepcion))
						Yii::app()->user->setFlash('success', "Ha sido registrado examen Psiquica");
					else
						Yii::app()->user->setFlash('error', "Uds. ocurrio un error");	
            	}
            	
				$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));
	}
        
}
