<?php
/* @var $this FechaAscController */
/* @var $model FechaAsc */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_conf_asc_fecha'); ?>
		<?php echo $form->textField($model,'id_conf_asc_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_proceso_asc'); ?>
		<?php echo $form->textField($model,'fecha_proceso_asc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_proceso_asc'); ?>
		<?php echo $form->textField($model,'des_proceso_asc',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_estatus_cond'); ?>
		<?php echo $form->textField($model,'des_estatus_cond',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_postulacion'); ?>
		<?php echo $form->textField($model,'fecha_postulacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->