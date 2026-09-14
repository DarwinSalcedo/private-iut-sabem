<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <!--Vista Invitado-->
          <?php if (Yii::app()->user->isGuest): ?>
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="<?php echo yii::app()->createUrl('site/index'); ?>"><img src="<?php echo $baseUrl;?>/img/logo.png" width="30">SABEM</a>
              </div>
  </div>
</div>

<div class="subnav navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">

            </div><!-- container -->
          </div><!-- navbar-inner -->
      </div><!-- subnav -->
      <?php endif?>

          <!--Vista Administrador-->
          <?php if (yii::app()->user->checkAccess('admin')): ?>

          <a class="brand" href= " <?php echo yii::app()->createUrl('site/principal'); ?>">
          <img src="<?php echo $baseUrl;?>/img/logo.png" width="30"> SABEM</a>
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                       array('label'=>'Funcionarios <span class="caret"></span>', 'url'=>'#',
           'itemOptions'=>array('class'=>'dropdown','tabindex'=>"1"),
           'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Registrar nuevo', 'url'=>array('funcionarios/create')),
              array('label'=>'Listar ', 'url'=>array('funcionarios/index')),
              array('label'=>'Buscar ', 'url'=>array('funcionarios/admin')),
              array('label'=>'Reportes de jerarquia', 'url'=>array('funcionarios/reportes')),
              //array('label'=>'One more separated link', 'url'=>'funcionarios/reportes'),
                        )
            ,'visible'=> !Yii::app()->user->isGuest),
        
      
        
        array('label'=>'Evaluaciones <span class="caret"></span>','url'=>'#',
         'itemOptions'=>array('class'=>'dropdown','tabindex'=>"1"),
        'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
        'items'=>array(
          array('label'=>'Funcionarios a cargo', 'url'=>array('postulados/postulados')),
          
           /*      #     array('label'=>'Funcionario de Recepción', 'url'=>array('evaluador/create')),    
              array('label'=>'Desempeños', ),                     
                      array('label'=>'Espiritu Bomberil', 'url'=>array('espirituBomberil/create')),
                      array('label'=>'Competencia', 'url'=>array('competencia/create')),
                      array('label'=>'Desempeño', 'url'=>array('desempenho/create')),                     
                      array('label'=>'Aptitud-Actitud', 'url'=>array('aptitudActitud/create')),
                      array('label'=>'Habilidad', 'url'=>array('habilidad/create')),
                        
              array('label'=>'Examenes', ),
              array('label'=>'Aptitud Fisica', 'url'=>array('fisica/create')),                      
              array('label'=>'Medico', 'url'=>array('examenmedico/create')),
              array('label'=>'Antidoping', 'url'=>array('antidoping/create')),
              array('label'=>'Psiquica', 'url'=>array('psiquica/create')),
              #array('label'=>'Actitud Fisica', 'url'=>array('/create')),  
          */         
              array('label'=>'Ver evaluaciones', 'url'=>array('Funcionarios/evaluaciones')),   
              ),
        'visible'=> !Yii::app()->user->isGuest),
        
        array('label'=>'Postulacion<span class="caret"></span>','url'=>'#',
         'itemOptions'=>array('class'=>'dropdown','tabindex'=>"1"),
        'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
        'items'=>array(
                                                array('label'=>'Postularse', 'url'=>array('Postularse/create')),                      
                        array('label'=>'<li  class="divider"></li>'),

                                        //array('label'=>'configurar'),                                                                  
                                                array('label'=>'Fecha de postulacion', 'url'=>array('fechaAsc/index')),                      
                                                array('label'=>'Numero de plazas a postular', 'url'=>array('configplaza/index')),                      
                                         
                        array('label'=>'<li  class="divider"></li>'),
                                        array('label'=>'Solicitudes de Postulación', 'url'=>array('postularse/index')),                     
                        array('label'=>'<li  class="divider"></li>'),
                              array('label'=>'Postulados', 'url'=>array('postulados/index')),
                              array('label'=>'Gestionar Postulados', 'url'=>array('postulados/admin')),
                                    ),'visible'=> !Yii::app()->user->isGuest),     

                  
        array('label'=>'Ascenso<span class="caret"></span>','url'=>'#',
         'itemOptions'=>array('class'=>'dropdown','tabindex'=>"1"),
        'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
        'items'=>array(


                                                #array('label'=>'Listar', 'url'=>array('ascenso/view')),
                                                array('label'=>'Listar', 'url'=>array('tblascnotatotal/results')), 
                                                 array('label'=>'Finalizar Ascenso', 'url'=>array('FechaAsc/ppal')),
                                                  array('label'=>'Ascender a funcionario', 'url'=>array('tblascnotatotal/create')),
                                                #array('label'=>'nueva opcion', 'url'=>array('tblascnotatotal/admin')),
                                                 array('label'=>'Procesos anteriores','url'=>array('tblascnotatotal/index')),                     
                                            #   array('label'=>'reporte', 'url'=>array('/create')),                     
                  

                                              ),'visible'=> !Yii::app()->user->isGuest), 
      
        array('label'=>'Control de usuarios','url'=>array('/usuario/index'),'visible'=> !Yii::app()->user->isGuest),
        
        array('label'=>'Notificación<span class="caret"></span>','url'=>'#',
         'itemOptions'=>array('class'=>'dropdown','tabindex'=>"1"),
        'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
        'items'=>array(
          array('label'=>'Enviar notificación', 'url'=>array('notificacion/create')),
		  array('label'=>'Notificaciones enviadas', 'url'=>array('notificacion/index')),
		   #array('label'=>'notificacion personalizada', 'url'=>array('notificacion/personalizar')),
              
                  ),
              ),
        
        
             array('label'=>'Cuenta <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Mis Datos ', 'url'=>array('/usuario/datos')),
              array('label'=>'Cambio de Contraseña ', 'url'=>array('/usuario/CambiarContrasena')),
              array('label'=>'Bloquear sistema ', 'url'=>array('/sistema/view',"id"=>1)),
               array('label'=>'Auditoria sistema ', 'url'=>array('/auditoria/index')),
              array('label'=>'Salir ', 'url'=>array('/site/logout')),
                        )),
      
         ),      
       ));  ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
           <form class="navbar-search pull-right" action="">
           
           </form>

                       <?php
            date_default_timezone_set ('America/Caracas' );
            setlocale(LC_TIME, 'spanish');


            $this->widget('zii.widgets.CMenu',array(
                   'items'=>array(        
                    array('label'=>' |  Bienvenido '.Yii::app()->user->name.' |  '.strftime("  %#d de %B del %Y   ")." | hora ".date(' h:i A'), 'visible'=>!Yii::app()->user->isGuest),),     
                   // array('label'=>' '.strftime("  %#d de %B del %Y   ")." | hora ".date(' h:i A'),),                      ),
                   ));
             ?>
    	</div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->

<?php endif?>


        <!--######################Vista Usuario###############################-->
          <?php if (yii::app()->user->checkAccess('demo')): ?>
          <a class="brand" href='site/index.jsp'><img src="<?php echo $baseUrl;?>/img/logo.png" width="30"> SABEM</a>
          
          <div class="nav-collapse">
      <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
          'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Principal', 'url'=>array('/site/principal')),
                        array('label'=>'Postularse', 'url'=>array('/Postularse/create')),
                       // array('label'=>'Evaluación', 'url'=>array('/site/page', 'view'=>'tables')),
            //array('label'=>'Usuarios', 'url'=>array('/site/page', 'view'=>'interface')),
                        //array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
                        /*array('label'=>'Gii generated', 'url'=>array('customer/index')),*/
                       
              //array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
              //array('label'=>'Separated link', 'url'=>'#'),
              //array('label'=>'One more separated link', 'url'=>'#'),
                       
						
                            array('label'=>'Cuenta <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Mis Datos ', 'url'=>array('/usuario/datos')),
              array('label'=>'Cambio de Contraseña ', 'url'=>array('/usuario/CambiarContrasena')),
              array('label'=>'Salir ', 'url'=>array('/site/logout')),
                        )),
						
                    ),
                )); ?>
      </div>
    </div>
  </div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
            <?php
            date_default_timezone_set ('America/Caracas' );
            setlocale(LC_TIME, 'spanish');


            $this->widget('zii.widgets.CMenu',array(
                   'items'=>array(        
                    array('label'=>' |  Bienvenido '.Yii::app()->user->name.' |  '.strftime("  %#d de %B del %Y   ")." | hora ".date(' h:i A'), 'visible'=>!Yii::app()->user->isGuest),),     
                   // array('label'=>' '.strftime("  %#d de %B del %Y   ")." | hora ".date(' h:i A'),),                      ),
                   ));
             ?>
      </div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->

<?php endif?>  

      <!-- #####################Vista evaluador####################################-->
          <?php if (yii::app()->user->checkAccess('Evaluador')): ?>
          <a class="brand" href='../site/principal'><img src="<?php echo $baseUrl;?>/img/logo.png" width="30"> SABEM</a>
          
          <div class="nav-collapse">
      <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
          'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'Principal', 'url'=>array('site/principal')),
                /*        array('label'=>'Postularse', 'url'=>array('/site/page', 'view'=>'graphs')),
                        array('label'=>'Status', 'url'=>array('/site/page', 'view'=>'forms')),
                       // array('label'=>'Evaluación', 'url'=>array('/site/page', 'view'=>'tables')),
            //array('label'=>'Usuarios', 'url'=>array('/site/page', 'view'=>'interface')),
                        //array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
                     
                        array('label'=>'Mi Cuenta <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Mis Mensajes <span class="badge badge-warning pull-right">26</span>', 'url'=>'#'),
              array('label'=>'is Tareas <span class="badge badge-important pull-right">112</span>', 'url'=>'#'),
              //array('label'=>'My Invoices <span class="badge badge-info pull-right">12</span>', 'url'=>'#'),
              //array('label'=>'Separated link', 'url'=>'#'),
              //array('label'=>'One more separated link', 'url'=>'#'),
                        )),*/
						
						 array('label'=>'Evaluaciones <span class="caret"></span>','url'=>'#',
         'itemOptions'=>array('class'=>'dropdown','tabindex'=>"1"),
        'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
        'items'=>array(
          
        /*      array('label'=>'Funcionarios a cargo', 'url'=>array('postulados/postulados')),
                #      array('label'=>'Evaluador', 'url'=>array('evaluador/create')),    
              array('label'=>'Desempeños', ),                     
                      array('label'=>'Espiritu Bomberil', 'url'=>array('espirituBomberil/create')),
                      array('label'=>'Competencia', 'url'=>array('competencia/create')),
                      array('label'=>'Desempeño', 'url'=>array('desempenho/create')),                     
                      array('label'=>'Aptitud-Actitud', 'url'=>array('aptitudActitud/create')),
                      array('label'=>'Habilidad', 'url'=>array('habilidad/create')),
                        
              array('label'=>'Examenes', ),
              array('label'=>'Aptitud Fisica', 'url'=>array('fisica/create')),                      
              array('label'=>'Medico', 'url'=>array('examenmedico/create')),
              array('label'=>'Antidoping', 'url'=>array('antidoping/create')),
              #array('label'=>'Actitud Fisica', 'url'=>array('/create')),   
         */             
              array('label'=>'Ver evaluaciones', 'url'=>array('Funcionarios/evaluaciones')),   
  
              ),
        'visible'=> !Yii::app()->user->isGuest),
                          array('label'=>'Postularse', 'url'=>array('/Postularse/create')),
       
                           array('label'=>'Cuenta <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'Mis Datos ', 'url'=>array('/usuario/datos')),
              array('label'=>'Cambio de Contraseña ', 'url'=>array('/usuario/CambiarContrasena')),
              array('label'=>'Salir ', 'url'=>array('/site/logout')),
                        )),
						),
                )); ?>
      </div>
    </div>
  </div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
            <?php
            date_default_timezone_set ('America/Caracas' );
            setlocale(LC_TIME, 'spanish');


            $this->widget('zii.widgets.CMenu',array(
                   'items'=>array(        
                    array('label'=>' |  Bienvenido '.Yii::app()->user->name.' |  '.strftime("  %#d de %B del %Y   ")." | hora ".date(' h:i A'), 'visible'=>!Yii::app()->user->isGuest),),     
                   // array('label'=>' '.strftime("  %#d de %B del %Y   ")." | hora ".date(' h:i A'),),                      ),
                   ));
             ?>
      </div><!-- container -->
    </div><!-- navbar-inner -->
</div><!-- subnav -->

<?php endif?>