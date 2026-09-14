<?php
/* @var $this IngresoController */
/* @var $model Ingreso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ingreso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
		<?php echo $form->error($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Equipo'); ?>
		<?php echo $form->textField($model,'Equipo'); ?>
		<?php echo $form->error($model,'Equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Login'); ?>
		<?php echo $form->textField($model,'Login',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Login'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Clave'); ?>
		<?php echo $form->textField($model,'Clave',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Clave'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Apellidos'); ?>
		<?php echo $form->textField($model,'Apellidos',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Apellidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Condicion'); ?>
		<?php echo $form->textField($model,'Condicion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Condicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TipoUsuario'); ?>
		<?php echo $form->textField($model,'TipoUsuario',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'TipoUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_institucion'); ?>
		<?php echo $form->textField($model,'cod_institucion'); ?>
		<?php echo $form->error($model,'cod_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_nivel_acceso'); ?>
		<?php echo $form->textField($model,'cod_nivel_acceso'); ?>
		<?php echo $form->error($model,'cod_nivel_acceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des_cambio_contraseña'); ?>
		<?php echo $form->textField($model,'des_cambio_contraseña',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'des_cambio_contraseña'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->