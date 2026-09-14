<?php
/* @var $this PostuladosController */
/* @var $model Postulados */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_postulados'); ?>
		<?php echo $form->textField($model,'id_postulados'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_conf_asc_fecha'); ?>
		<?php echo $form->textField($model,'id_conf_asc_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_postulacion'); ?>
		<?php echo $form->textField($model,'fecha_postulacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_postulacion'); ?>
		<?php echo $form->textField($model,'hora_postulacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cedula_fun_recepcion'); ?>
		<?php echo $form->textField($model,'cedula_fun_recepcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_datos_receptor'); ?>
		<?php echo $form->textField($model,'des_datos_receptor',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cod_Jerarquia'); ?>
		<?php echo $form->textField($model,'Cod_Jerarquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_asc_fecha'); ?>
		<?php echo $form->textField($model,'id_asc_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_fecha_ingreso'); ?>
		<?php echo $form->textField($model,'id_fecha_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_modificar'); ?>
		<?php echo $form->textField($model,'num_modificar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->