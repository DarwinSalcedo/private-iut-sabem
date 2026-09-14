<?php
/* @var $this PostuladosController */
/* @var $model Postulados */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'postulados-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Asignar evaluador del funcionario</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row" style="margin:10px;">
		<?php echo $form->labelEx($model,'cedula_fun_recepcion',array('label' =>'Seleccione funcionario evaluador' , )); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php // Working with selector		 
		 $this->widget('ext.select2.ESelect2',array(				 
		  'model'=>$model,
		  'attribute'=>'cedula_fun_recepcion',
		  'data'=>$model->listFuncionarios($cedula),
		  'htmlOptions' => array('class' => 'span5')
		)); 	?>
		<?php echo $form->error($model,'cedula_fun_recepcion'); ?>
	</div>

	<div class="row" style="margin:10px;">
		<?php echo $form->labelEx($model,'Descripcion de datos del receptor'); ?>
		<?php echo $form->textField($model,'des_datos_receptor',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'des_datos_receptor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Asignar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->