<?php
/* @var $this InstitucionController */
/* @var $model Institucion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cod_institucion'); ?>
		<?php echo $form->textField($model,'cod_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_institucion'); ?>
		<?php echo $form->textField($model,'nombre_institucion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'siglas_institucion'); ?>
		<?php echo $form->textField($model,'siglas_institucion',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cod_Conf_Gobernacion'); ?>
		<?php echo $form->textField($model,'Cod_Conf_Gobernacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->