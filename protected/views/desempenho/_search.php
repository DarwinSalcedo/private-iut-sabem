<?php
/* @var $this DesempenhoController */
/* @var $model Desempenho */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_desempe'); ?>
		<?php echo $form->textField($model,'id_desempe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_responsabilidad'); ?>
		<?php echo $form->textField($model,'num_responsabilidad',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_productividad'); ?>
		<?php echo $form->textField($model,'num_productividad',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_conocimiento'); ?>
		<?php echo $form->textField($model,'num_conocimiento',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_capacidad_delegar'); ?>
		<?php echo $form->textField($model,'num_capacidad_delegar',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_order_planificacion'); ?>
		<?php echo $form->textField($model,'num_order_planificacion',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_TotDesemPorc'); ?>
		<?php echo $form->textField($model,'num_TotDesemPorc',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_TotDesemNota'); ?>
		<?php echo $form->textField($model,'num_TotDesemNota',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evaluador'); ?>
		<?php echo $form->textField($model,'id_evaluador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_conf_asc_fecha'); ?>
		<?php echo $form->textField($model,'id_conf_asc_fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->