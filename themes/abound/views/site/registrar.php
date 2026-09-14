<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
<h1>Registro</h1>

<div class="form"> 

<?php $form=$this->beginWidget('CActiveForm',array( 
				
				'action'=>yii::app()->createUrl('site/registrar'),
				'id'=>'registro-form',
				#'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array('validateOnSubmit'=>true),
				)); 
?>


	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username',array('label'=>'Nombre de Usuario',)); ?>
		<?php echo $form->textField($model,'username',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
 
 <div class="row">
		<?php echo $form->labelEx($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cedula'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'correo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'repetirPassword'); ?>
		<?php echo $form->passwordField($model,'repetirPassword',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'repetirPassword'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Registrate',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->