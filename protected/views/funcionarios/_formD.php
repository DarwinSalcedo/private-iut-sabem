	<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog4',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Actualizar',
        'autoOpen'=>false,
        'width'=>700,
       # 'height'=>200,        
        'resizable'=>false,
        'modal'=>true,
        'overlay'=>array(
            'backgroundColor'=>'#000',
            'opacity'=>'0.5'
        ),
    ),
));
 
?>

				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'desempenho-form',
					'action'=>yii::app()->createUrl('Desempenho/create'),
					// Please note: When you enable ajax validation, make sure the corresponding
					// controller action is handling ajax validation correctly.
					// There is a call to performAjaxValidation() commented in generated controller code.
					// See class documentation of CActiveForm for details on this.
					#'enableClientValidation'=>true,
					'enableAjaxValidation'=>true,
					'clientOptions'=>array('validateOnSubmit'=>true),

				)); ?>

						<p class="note">Los campos con  <span class="required">*</span> son requeridos.</p>
						
					<?php echo $form->errorSummary($model); ?>

					<div class="row">
						<?php #echo $form->labelEx($model,'id_desempe'); ?>
						<?php  if ($model->isNewRecord) echo $form->hiddenField($model,'id_desempe',array('value'=>$model->buscarUltimo())); ?>
						<?php #echo $form->error($model,'id_desempe'); ?>

					</div>

					<div class="row" >
						<?php #echo $form->labelEx($model,'Cedula',array('label' =>'Elige el funcionario que se le asignaran puntaje' , )); ?>
						<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
						<?php  echo $form->hiddenField($model,'Cedula', array('value' =>$cedula)); ?>
						<?php echo $form->error($model,'Cedula'); ?>
					</div>

					<div id="row-check">
						<?php echo $form->labelEx($model,'Responsabilidad y cumplimiento de órdenes'); ?>
						<?php 
						
						echo $form->radioButton($model, 'num_responsabilidad', array(
						'value'=>0,
						'uncheckValue'=>null));echo "<span>0</span>";
						
						echo $form->radioButton($model, 'num_responsabilidad', array(
						'value'=>0.2,
						'uncheckValue'=>null));echo "<span>1</span>";
					
						echo $form->radioButton($model, 'num_responsabilidad', array(
						'value'=>0.4,
						'uncheckValue'=>null)); echo "<span>2</span>";
						
						echo $form->radioButton($model, 'num_responsabilidad', array(
						'value'=>0.6,
						'uncheckValue'=>null));echo "<span>3</span>";

						echo $form->radioButton($model, 'num_responsabilidad', array(
						'value'=>0.8,
						'uncheckValue'=>null));echo "<span>4</span>" ;
						
						?>		
						<?php echo $form->error($model,'Productividad en el trabajo'); ?>
					</div>

					<div class="row-check">
						<?php echo $form->labelEx($model,'Productividad en el trabajo'); ?>
						<?php 
						
						echo $form->radioButton($model, 'num_productividad', array(
						'value'=>0,
						'uncheckValue'=>true));echo "<span> 0 </span>" ;
						
						echo $form->radioButton($model, 'num_productividad', array(
						'value'=>0.2,
						'uncheckValue'=>null));echo "<span> 1 </span>" ;
					
						echo $form->radioButton($model, 'num_productividad', array(
						'value'=>0.4,
						'uncheckValue'=>null)); echo "<span> 2 </span>" ;
						
					echo $form->radioButton($model, 'num_productividad', array(
						'value'=>0.6,
						'uncheckValue'=>null));echo "<span>  3 </span>" ;

						echo $form->radioButton($model, 'num_productividad', array(
						'value'=>0.8,
						'uncheckValue'=>null)); echo "<span>  4 </span>" ;
						
						?>
						<?php echo $form->error($model,'num_productividad'); ?>
					</div>

					<div class="row-check">
						<?php echo $form->labelEx($model,'Grado de conocimiento para delegar funciones'); ?>
						<?php 
						
						echo $form->radioButton($model, 'num_conocimiento', array(
						'value'=>0,
						'uncheckValue'=>true));echo "<span>  0 </span>" ;
						
						echo $form->radioButton($model, 'num_conocimiento', array(
						'value'=>0.2,
						'uncheckValue'=>null));echo "<span> 1  </span>" ;
					
						echo $form->radioButton($model, 'num_conocimiento', array(
						'value'=>0.4,
						'uncheckValue'=>null)); echo "<span> 2  </span>" ;
						
						echo $form->radioButton($model, 'num_conocimiento', array(
						'value'=>0.6,
						'uncheckValue'=>null));echo "<span>  3 </span>" ;

						echo $form->radioButton($model, 'num_conocimiento', array(
						'value'=>0.8,
						'uncheckValue'=>null));echo "<span>  4 </span>" ;
						
						?>
						<?php echo $form->error($model,'num_conocimiento'); ?>
					</div>

					<div class="row-check">
						<?php echo $form->labelEx($model,'Capacidad para delegar funciones'); ?>
						<?php 
						
						echo $form->radioButton($model, 'num_capacidad_delegar', array(
						'value'=>0,
						'uncheckValue'=>true));echo "<span>  0 </span>" ;
						
						echo $form->radioButton($model, 'num_capacidad_delegar', array(
						'value'=>0.2,
						'uncheckValue'=>null));echo "<span> 1  </span>" ;
					
						echo $form->radioButton($model, 'num_capacidad_delegar', array(
						'value'=>0.4,
						'uncheckValue'=>null));echo "<span> 2  </span>" ; 
						
						echo $form->radioButton($model, 'num_capacidad_delegar', array(
						'value'=>0.6,
						'uncheckValue'=>null));echo "<span> 3  </span>" ;

						echo $form->radioButton($model, 'num_capacidad_delegar', array(
						'value'=>0.8,
						'uncheckValue'=>null));echo "<span> 4  </span>" ; 
						
						?>
						<?php echo $form->error($model,'num_capacidad_delegar'); ?>
					</div>

					<div class="row-check">
						<?php echo $form->labelEx($model,'Orden y planificacion del trabajo que realiza'); ?>
						<?php 
						
						echo $form->radioButton($model, 'num_order_planificacion', array(
						'value'=>0,
						'uncheckValue'=>true));echo "<span> 0 </span>" ; 
						
						echo $form->radioButton($model, 'num_order_planificacion', array(
						'value'=>0.2,
						'uncheckValue'=>null));echo "<span> 1  </span>" ; 
					
						echo $form->radioButton($model, 'num_order_planificacion', array(
						'value'=>0.4,
						'uncheckValue'=>null)); echo "<span> 2  </span>" ; 
						
						echo $form->radioButton($model, 'num_order_planificacion', array(
						'value'=>0.6,
						'uncheckValue'=>null));echo "<span> 3 </span>" ; 

						echo $form->radioButton($model, 'num_order_planificacion', array(
						'value'=>0.8,
						'uncheckValue'=>null));echo "<span> 4  </span>" ;  
						
						?>
						<?php echo $form->error($model,'num_order_planificacion'); ?>
					</div>
					<div class="row-check">
					<div  id="aved" class="aved" >RESULTADOS</div>
					</div>

					<div class="row-check">
						<?php #echo $form->labelEx($model,'num_TotDesemPorc'); ?>
						<?php echo $form->hiddenField($model,'num_TotDesemPorc',array('size'=>18,'maxlength'=>18)); ?>
						<?php #echo $form->error($model,'num_TotDesemPorc'); ?>
					</div>
				<?php # var_dump($model);?>
					<div class="row-check">
						<?php # echo $form->labelEx($model,'num_TotDesemNota'); ?>
						<?php echo $form->hiddenField($model,'num_TotDesemNota',array('size'=>18,'maxlength'=>18)); ?>
						<?php # echo $form->error($model,'num_TotDesemNota'); ?>
					</div>

					<div class="row-check">
						<?php if (yii::app()->user->checkAccess('Evaluador'))
								{
								echo $form->hiddenField($model,'id_evaluador', array('value' =>yii::app()->user->getState('cedula') , )); 
								}else{
									echo $form->hiddenField($model,'id_evaluador', array('value' =>$recepcion ));  
								}	

						# echo $form->dropDownList($model,'id_evaluador',$model->menuevaluador(),array('empty'=>' Seleccione ')); 
								?>						
						<?php echo $form->error($model,'id_evaluador'); ?>
					</div>

					<div class="row-check">
					<?php #echo'<br> '.$form->labelEx($model,'id_conf_asc_fecha'); ?>						
					<?php $id= new FechaAsc;
					echo $form->hiddenField($model,'id_conf_asc_fecha', array('value' =>$id->obtenerUltimoId() ));?>
					<?php #echo $form->error($model,'id_conf_asc_fecha'); ?>
				</div>

					<div class="row buttons">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar'); ?>
					</div>
					

				<?php $this->endWidget();
				$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>


				</div><!-- form -->



	
