<?php
/* @var $this DesempenhoController */
/* @var $model Desempenho */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'desempenho-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php #echo $form->labelEx($model,'id_desempe'); ?>
		<?php  if ($model->isNewRecord) echo $form->hiddenField($model,'id_desempe',array('value'=>$model->buscarUltimo())); ?>
		<?php #echo $form->error($model,'id_desempe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cedula'); ?>
		<?php echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php echo $form->error($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Responsabilidad y cumplimiento de órdenes'); ?>
		<?php 
		
		echo " 0 ".$form->radioButton($model, 'num_responsabilidad', array(
		'value'=>0,
		'uncheckValue'=>null));
		
		echo " 1 ".$form->radioButton($model, 'num_responsabilidad', array(
		'value'=>0.2,
		'uncheckValue'=>null));
	
		echo " 2 ".$form->radioButton($model, 'num_responsabilidad', array(
		'value'=>0.4,
		'uncheckValue'=>null)); 
		
		echo " 3 ".$form->radioButton($model, 'num_responsabilidad', array(
		'value'=>0.6,
		'uncheckValue'=>null));

		echo " 4 ".$form->radioButton($model, 'num_responsabilidad', array(
		'value'=>0.8,
		'uncheckValue'=>null)); 
		
		?>		
		<?php echo $form->error($model,'Productividad en el trabajo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Productividad en el trabajo'); ?>
		<?php 
		
		echo " 0 ".$form->radioButton($model, 'num_productividad', array(
		'value'=>0,
		'uncheckValue'=>true));
		
		echo " 1 ".$form->radioButton($model, 'num_productividad', array(
		'value'=>0.2,
		'uncheckValue'=>null));
	
		echo " 2 ".$form->radioButton($model, 'num_productividad', array(
		'value'=>0.4,
		'uncheckValue'=>null)); 
		
		echo " 3 ".$form->radioButton($model, 'num_productividad', array(
		'value'=>0.6,
		'uncheckValue'=>null));

		echo " 4 ".$form->radioButton($model, 'num_productividad', array(
		'value'=>0.8,
		'uncheckValue'=>null)); 
		
		?>
		<?php echo $form->error($model,'num_productividad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Grado de conocimiento para delegar funciones'); ?>
		<?php 
		
		echo " 0 ".$form->radioButton($model, 'num_conocimiento', array(
		'value'=>0,
		'uncheckValue'=>true));
		
		echo " 1 ".$form->radioButton($model, 'num_conocimiento', array(
		'value'=>0.2,
		'uncheckValue'=>null));
	
		echo " 2 ".$form->radioButton($model, 'num_conocimiento', array(
		'value'=>0.4,
		'uncheckValue'=>null)); 
		
		echo " 3 ".$form->radioButton($model, 'num_conocimiento', array(
		'value'=>0.6,
		'uncheckValue'=>null));

		echo " 4 ".$form->radioButton($model, 'num_conocimiento', array(
		'value'=>0.8,
		'uncheckValue'=>null)); 
		
		?>
		<?php echo $form->error($model,'num_conocimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Capacidad para delegar funciones'); ?>
		<?php 
		
		echo " 0 ".$form->radioButton($model, 'num_capacidad_delegar', array(
		'value'=>0,
		'uncheckValue'=>true));
		
		echo " 1 ".$form->radioButton($model, 'num_capacidad_delegar', array(
		'value'=>0.2,
		'uncheckValue'=>null));
	
		echo " 2 ".$form->radioButton($model, 'num_capacidad_delegar', array(
		'value'=>0.4,
		'uncheckValue'=>null)); 
		
		echo " 3 ".$form->radioButton($model, 'num_capacidad_delegar', array(
		'value'=>0.6,
		'uncheckValue'=>null));

		echo " 4 ".$form->radioButton($model, 'num_capacidad_delegar', array(
		'value'=>0.8,
		'uncheckValue'=>null)); 
		
		?>
		<?php echo $form->error($model,'num_capacidad_delegar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Orden y planificacion del trabajo que realiza'); ?>
		<?php 
		
		echo " 0 ".$form->radioButton($model, 'num_order_planificacion', array(
		'value'=>0,
		'uncheckValue'=>true));
		
		echo " 1 ".$form->radioButton($model, 'num_order_planificacion', array(
		'value'=>0.2,
		'uncheckValue'=>null));
	
		echo " 2 ".$form->radioButton($model, 'num_order_planificacion', array(
		'value'=>0.4,
		'uncheckValue'=>null)); 
		
		echo " 3 ".$form->radioButton($model, 'num_order_planificacion', array(
		'value'=>0.6,
		'uncheckValue'=>null));

		echo " 4 ".$form->radioButton($model, 'num_order_planificacion', array(
		'value'=>0.8,
		'uncheckValue'=>null)); 
		
		?>
		<?php echo $form->error($model,'num_order_planificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_TotDesemPorc'); ?>
		<?php echo $form->textField($model,'num_TotDesemPorc',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'num_TotDesemPorc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_TotDesemNota'); ?>
		<?php echo $form->textField($model,'num_TotDesemNota',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'num_TotDesemNota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_evaluador'); ?>
		<?php echo $form->textField($model,'id_evaluador'); ?>
		<?php echo $form->error($model,'id_evaluador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_conf_asc_fecha'); ?>
		<?php echo $form->textField($model,'id_conf_asc_fecha'); ?>
		<?php echo $form->error($model,'id_conf_asc_fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->