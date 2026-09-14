<?php
/* @var $this ConfigPlazaController */
/* @var $model ConfigPlaza */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-plaza-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Cod_Jerarquia',array('label' =>'Seleccione Jerarquía' , )); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php // Working with selector		 
		 $this->widget('ext.select2.ESelect2',array(				 
		  'model'=>$model,
		  'attribute'=>'Cod_Jerarquia',
		  'data'=>$model->listJerarquias(),
		  'htmlOptions' => array('class' => 'span5')
		)); 	?>
		<?php echo $form->error($model,'Cod_Jerarquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Numero de Plazas'); ?>
		<?php echo $form->textField($model,'num_plazas'); ?>
		<?php echo $form->error($model,'num_plazas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nota Minima'); ?>
		<?php echo $form->textField($model,'num_nota_minima',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'num_nota_minima'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nota Final'); ?>
		<?php echo $form->textField($model,'num_nota_final',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'num_nota_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion de Orden General'); ?>
		<?php echo $form->textField($model,'des_orden_general',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'des_orden_general'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion de Jerarquia de Orden'); ?>
		<?php echo $form->textField($model,'des_jerarq_orden',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'des_jerarq_orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_conf_asc_fecha',array('label' =>'Seleccione Fecha de Postulación Confirmada' , )); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php // Working with selector		 
		 $this->widget('ext.select2.ESelect2',array(				 
		  'model'=>$model,
		  'attribute'=>'id_conf_asc_fecha',
		  'data'=>$model->listAscFechas(),
		  'htmlOptions' => array('class' => 'span5')
		)); 	?>
		<?php echo $form->error($model,'id_conf_asc_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tiempo de Jerarquia'); ?>
		<?php echo $form->textField($model,'num_tiempo_jerar'); ?>
		<?php echo $form->error($model,'num_tiempo_jerar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->