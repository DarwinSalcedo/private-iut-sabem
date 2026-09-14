<?php
/* @var $this CompetenciaController */
/* @var $model Competencia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_competencia'); ?>
		<?php echo $form->textField($model,'id_competencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_demuestra_eficaz'); ?>
		<?php echo $form->textField($model,'num_demuestra_eficaz',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_respetado_meritos'); ?>
		<?php echo $form->textField($model,'num_respetado_meritos',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_nunca_decisi_impul'); ?>
		<?php echo $form->textField($model,'num_nunca_decisi_impul',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_habla_diccion_cohe'); ?>
		<?php echo $form->textField($model,'num_habla_diccion_cohe',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_actualizado_bom'); ?>
		<?php echo $form->textField($model,'num_actualizado_bom',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_TotComPorc'); ?>
		<?php echo $form->textField($model,'num_TotComPorc',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_TotComNota'); ?>
		<?php echo $form->textField($model,'num_TotComNota',array('size'=>18,'maxlength'=>18)); ?>
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