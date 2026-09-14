<?php
/* @var $this TblAscNotaTotalController */
/* @var $model TblAscNotaTotal */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_nota_total'); ?>
		<?php echo $form->textField($model,'id_nota_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_nota_total'); ?>
		<?php echo $form->textField($model,'num_nota_total',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cod_Jerarquia'); ?>
		<?php echo $form->textField($model,'Cod_Jerarquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Ingreso'); ?>
		<?php echo $form->textField($model,'Fecha_Ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_revisar'); ?>
		<?php echo $form->textField($model,'des_revisar',array('size'=>60,'maxlength'=>255)); ?>
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