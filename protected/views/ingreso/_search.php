<?php
/* @var $this IngresoController */
/* @var $model Ingreso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Equipo'); ?>
		<?php echo $form->textField($model,'Equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Login'); ?>
		<?php echo $form->textField($model,'Login',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Clave'); ?>
		<?php echo $form->textField($model,'Clave',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Apellidos'); ?>
		<?php echo $form->textField($model,'Apellidos',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Condicion'); ?>
		<?php echo $form->textField($model,'Condicion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TipoUsuario'); ?>
		<?php echo $form->textField($model,'TipoUsuario',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_institucion'); ?>
		<?php echo $form->textField($model,'cod_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_nivel_acceso'); ?>
		<?php echo $form->textField($model,'cod_nivel_acceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'des_cambio_contraseña'); ?>
		<?php echo $form->textField($model,'des_cambio_contraseña',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->