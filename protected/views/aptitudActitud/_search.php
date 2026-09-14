<?php
/* @var $this AptitudActitudController */
/* @var $model AptitudActitud */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_aptitud'); ?>
		<?php echo $form->textField($model,'id_aptitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_puntualidad_asist'); ?>
		<?php echo $form->textField($model,'num_puntualidad_asist',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_presentacion_apar'); ?>
		<?php echo $form->textField($model,'num_presentacion_apar',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_actitud_institucion'); ?>
		<?php echo $form->textField($model,'num_actitud_institucion',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_actitud_superiores'); ?>
		<?php echo $form->textField($model,'num_actitud_superiores',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_cooperacion'); ?>
		<?php echo $form->textField($model,'num_cooperacion',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_TotApPorc'); ?>
		<?php echo $form->textField($model,'num_TotApPorc',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_TotAcNota'); ?>
		<?php echo $form->textField($model,'num_TotAcNota',array('size'=>18,'maxlength'=>18)); ?>
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