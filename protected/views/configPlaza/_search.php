<?php
/* @var $this ConfigPlazaController */
/* @var $model ConfigPlaza */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_config_nota_plaza'); ?>
		<?php echo $form->textField($model,'id_config_nota_plaza'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cod_Jerarquia'); ?>
		<?php echo $form->textField($model,'Cod_Jerarquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_plazas'); ?>
		<?php echo $form->textField($model,'num_plazas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_nota_minima'); ?>
		<?php echo $form->textField($model,'num_nota_minima',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_nota_final'); ?>
		<?php echo $form->textField($model,'num_nota_final',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_orden_general'); ?>
		<?php echo $form->textField($model,'des_orden_general',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_jerarq_orden'); ?>
		<?php echo $form->textField($model,'des_jerarq_orden',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_conf_asc_fecha'); ?>
		<?php echo $form->textField($model,'id_conf_asc_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_tiempo_jerar'); ?>
		<?php echo $form->textField($model,'num_tiempo_jerar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->