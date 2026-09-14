<?php
/* @var $this AntidopingController */
/* @var $model Antidoping */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_antidoping'); ?>
		<?php echo $form->textField($model,'id_antidoping'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_antid_asistencia'); ?>
		<?php echo $form->textField($model,'des_antid_asistencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_antid_siglas_asistencia'); ?>
		<?php echo $form->textField($model,'des_antid_siglas_asistencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_antid_condicion'); ?>
		<?php echo $form->textField($model,'des_antid_condicion',array('size'=>60,'maxlength'=>255)); ?>
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