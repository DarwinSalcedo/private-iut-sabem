<?php
/* @var $this NotificacionController */
/* @var $model Notificacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'notificacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Complete los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php #$form->labelEx($model,'cedula'); ?>
		<?php echo $form->hiddenField($model,'cedula'); ?>
		<?php # $form->error($model,'cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php if ( !empty($_GET['correo'] ))
			 echo $form->textField($model,'email',array('VALUE'=>$_GET['correo'] ,'size'=>60,'maxlength'=>64)); 
			else 
				echo $form->textField($model,'email',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asunto'); ?>
		<?php echo $form->textField($model,'asunto',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'asunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mensaje'); ?>
		<?php echo $form->textArea($model,'mensaje',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mensaje'); ?>
	</div>

	<div class="row">
		<?php #echo $form->labelEx($model,'fecha_hora'); ?>
		<?php #echo $form->textField($model,'fecha_hora'); ?>
		<?php #echo $form->error($model,'fecha_hora'); ?>
	</div>

	<div class="row">
		<?php #$form->labelEx($model,'cedula_enviado'); ?>
		<?php echo $form->hiddenField($model,'cedula_enviado'); ?>
		<?php # $form->error($model,'cedula_enviado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->