<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog5',
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
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aptitud-actitud-form',
	'action'=>yii::app()->createUrl('AptitudActitud/create'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Los campos con  <span class="required">*</span> son requeridos.</p>
	
	<?php echo $form->errorSummary($model); ?>
<div class="row">
		<?php #echo $form->labelEx($model,'id_competencia'); ?>
		<?php  if ($model->isNewRecord) echo $form->hiddenField($model,'id_aptitud',array('value'=>$model->buscarUltimo())); ?>
		<?php #echo $form->error($model,'id_competencia'); ?>

	</div>
<div class="row" >
		<?php #echo $form->labelEx($model,'Cedula',array('label' =>'Elige el funcionario que se le asignaran puntaje' , )); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php  echo $form->hiddenField($model,'Cedula', array('value' =>$cedula)); ?>
		<?php echo $form->error($model,'Cedula'); ?>
	</div>
	

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_puntualidad_asist'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_puntualidad_asist', array(
		'value'=>0,
		'uncheckValue'=>null));;echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_puntualidad_asist', array(
		'value'=>0.2,
		'uncheckValue'=>null));;echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_puntualidad_asist', array(
		'value'=>0.4,
		'uncheckValue'=>null));;echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_puntualidad_asist', array(
		'value'=>0.6,
		'uncheckValue'=>null));;echo "<span>3</span>";

		echo $form->radioButton($model, 'num_puntualidad_asist', array(
		'value'=>0.8,
		'uncheckValue'=>null)); ;echo "<span>4</span>";
		
		?>		
		<?php echo $form->error($model,'num_puntualidad_asist'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_presentacion_apar'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_presentacion_apar', array(
		'value'=>0,
		'uncheckValue'=>null));;echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_presentacion_apar', array(
		'value'=>0.2,
		'uncheckValue'=>null));;echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_presentacion_apar', array(
		'value'=>0.4,
		'uncheckValue'=>null)); ;echo "<span>2</span>";
		
		echo $form->radioButton($model, 'num_presentacion_apar', array(
		'value'=>0.6,
		'uncheckValue'=>null));;echo "<span>3</span>";

		echo $form->radioButton($model, 'num_presentacion_apar', array(
		'value'=>0.8,
		'uncheckValue'=>null)); ;echo "<span>4</span>";
		
		?>	
		<?php echo $form->error($model,'num_presentacion_apar'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_actitud_institucion'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_actitud_institucion', array(
		'value'=>0,
		'uncheckValue'=>null));;echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_actitud_institucion', array(
		'value'=>0.2,
		'uncheckValue'=>null));;echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_actitud_institucion', array(
		'value'=>0.4,
		'uncheckValue'=>null)); ;echo "<span>2</span>";
		
		echo $form->radioButton($model, 'num_actitud_institucion', array(
		'value'=>0.6,
		'uncheckValue'=>null));;echo "<span>3</span>";

		echo $form->radioButton($model, 'num_actitud_institucion', array(
		'value'=>0.8,
		'uncheckValue'=>null));;echo "<span>4</span>"; 
		
		?>	
		<?php echo $form->error($model,'num_actitud_institucion'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_actitud_superiores'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_actitud_superiores', array(
		'value'=>0,
		'uncheckValue'=>null));;echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_actitud_superiores', array(
		'value'=>0.2,
		'uncheckValue'=>null));;echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_actitud_superiores', array(
		'value'=>0.4,
		'uncheckValue'=>null));;echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_actitud_superiores', array(
		'value'=>0.6,
		'uncheckValue'=>null));;echo "<span>3</span>";

		echo $form->radioButton($model, 'num_actitud_superiores', array(
		'value'=>0.8,
		'uncheckValue'=>null));;echo "<span>4</span>"; 
		
		?>	
		<?php echo $form->error($model,'num_actitud_superiores'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_cooperacion'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_cooperacion', array(
		'value'=>0,
		'uncheckValue'=>null));;echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_cooperacion', array(
		'value'=>0.2,
		'uncheckValue'=>null));;echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_cooperacion', array(
		'value'=>0.4,
		'uncheckValue'=>null));;echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_cooperacion', array(
		'value'=>0.6,
		'uncheckValue'=>null));;echo "<span>3</span>";

		echo $form->radioButton($model, 'num_cooperacion', array(
		'value'=>0.8,
		'uncheckValue'=>null));;echo "<span>4</span>"; 
		
		?>	
		<?php echo $form->error($model,'num_cooperacion'); ?>
	</div>


		<div class="row-check">
		<div  id="aveaa" lass="aveaa" >RESULTADOS</div>
		</div>

	<div class="row-check">
		<?php #echo $form->labelEx($model,'num_TotApPorc'); ?>
		<?php echo $form->hiddenField($model,'num_TotApPorc',array('size'=>18,'maxlength'=>18)); ?>
		<?php #echo $form->error($model,'num_TotApPorc'); ?>
	</div>

	<div class="row-check">
		<?php #echo $form->labelEx($model,'num_TotAcNota'); ?>
		<?php echo $form->hiddenField($model,'num_TotAcNota',array('size'=>18,'maxlength'=>18)); ?>
		<?php #echo $form->error($model,'num_TotAcNota'); ?>
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
					</div><br>

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
$this->endWidget('zii.widgets.jui.CJuiDialog');?>

</div><!-- form -->