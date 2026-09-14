<?php
/* @var $this PsiquicaController */
/* @var $model Psiquica */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_psiquica'); ?>
		<?php echo $form->textField($model,'id_psiquica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_psi_asistencia'); ?>
		<?php echo $form->textField($model,'des_psi_asistencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_psi_siglas_asistencia'); ?>
		<?php echo $form->textField($model,'des_psi_siglas_asistencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_psi_condicion'); ?>
		<?php echo $form->textField($model,'des_psi_condicion',array('size'=>60,'maxlength'=>255)); ?>
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