<?php
/* @var $this EspirituBomberilController */
/* @var $model EspirituBomberil */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_espiritu_bom'); ?>
		<?php echo $form->textField($model,'id_espiritu_bom'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_disciplinado'); ?>
		<?php echo $form->textField($model,'num_disciplinado',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_demuestra_mistica'); ?>
		<?php echo $form->textField($model,'num_demuestra_mistica',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_abnegado'); ?>
		<?php echo $form->textField($model,'num_abnegado',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_demuestra_inden'); ?>
		<?php echo $form->textField($model,'num_demuestra_inden',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_demuestra_comp'); ?>
		<?php echo $form->textField($model,'num_demuestra_comp',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_TotEspPorc'); ?>
		<?php echo $form->textField($model,'num_TotEspPorc',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_TotEspNota'); ?>
		<?php echo $form->textField($model,'num_TotEspNota',array('size'=>18,'maxlength'=>18)); ?>
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