<?php
/* @var $this InstitucionController */
/* @var $model Institucion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'institucion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_institucion'); ?>
		<?php echo $form->textField($model,'cod_institucion'); ?>
		<?php echo $form->error($model,'cod_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_institucion'); ?>
		<?php echo $form->textField($model,'nombre_institucion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siglas_institucion'); ?>
		<?php echo $form->textField($model,'siglas_institucion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'siglas_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cod_Conf_Gobernacion'); ?>
		<?php echo $form->textField($model,'Cod_Conf_Gobernacion'); ?>
		<?php echo $form->error($model,'Cod_Conf_Gobernacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->