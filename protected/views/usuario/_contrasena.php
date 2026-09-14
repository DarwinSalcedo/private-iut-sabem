
<div class="form"> 

<?php $form=$this->beginWidget('CActiveForm',array( 
				
				'action'=>yii::app()->createUrl('usuario/cambiarContrasena'),
				'id'=>'ContrasenaForm',
				#'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array('validateOnSubmit'=>true),
				)); 
?>


	
	<?php   echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'passActual', array('label' => 'Contraseña actual')); ?>
		<?php echo $form->passwordField($model,'passActual',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'passActual'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password', array('label' => 'Contraseña Nueva')); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'repetirPassword',array('label' => 'Repita Contraseña')); ?>
		<?php echo $form->passwordField($model,'repetirPassword',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'repetirPassword'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Cambiar Contraseña'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->