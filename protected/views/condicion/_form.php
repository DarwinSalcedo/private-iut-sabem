<?php
/* @var $this CondicionController */
/* @var $model Condicion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'condicion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Cod_Condicion'); ?>
		<?php echo $form->textField($model,'Cod_Condicion'); ?>
		<?php echo $form->error($model,'Cod_Condicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion_Condicion'); ?>
		<?php echo $form->textField($model,'Descripcion_Condicion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Descripcion_Condicion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->