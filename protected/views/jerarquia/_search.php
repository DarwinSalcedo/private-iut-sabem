<?php
/* @var $this JerarquiaController */
/* @var $model Jerarquia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Cod_Jerarquia'); ?>
		<?php echo $form->textField($model,'Cod_Jerarquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descripcion_Jerarquia'); ?>
		<?php echo $form->textField($model,'Descripcion_Jerarquia',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->