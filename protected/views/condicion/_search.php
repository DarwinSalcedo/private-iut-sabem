<?php
/* @var $this CondicionController */
/* @var $model Condicion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Cod_Condicion'); ?>
		<?php echo $form->textField($model,'Cod_Condicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descripcion_Condicion'); ?>
		<?php echo $form->textField($model,'Descripcion_Condicion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->