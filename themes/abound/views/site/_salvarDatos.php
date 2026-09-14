<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm',array( 
				
				'action'=>yii::app()->createUrl('site/reiniciarContrasena'),
				'id'=>'SalvarForm',
				#'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array('validateOnSubmit'=>true),
				)); 
?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'correo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula',array('size'=>20,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cedula'); ?>
	</div>


	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar Cuenta',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
