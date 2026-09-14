<?php
/* @var $this FechaAscController */
/* @var $model FechaAsc */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fecha-asc-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		 <?php echo $form->labelEx($model,'Fecha Proceso de Ascenso'); ?>
		 <?php
			 if ($model->fecha_proceso_asc != '') 
			 {
				 $model->fecha_proceso_asc=date('Y-m-d',strtotime($model->fecha_proceso_asc));
			 }
				 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				 'model'=>$model,
				 'attribute'=>'fecha_proceso_asc',
				 'value'=>$model->fecha_proceso_asc,
				 'language' => 'es',
				 'htmlOptions' => array('readonly'=>"readonly"),
				 
				 'options'=>array(
				 'autoSize'=>true,
				 'defaultDate'=>$model->fecha_proceso_asc,
				 'dateFormat'=>'yy-mm-dd',
				 'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
				 'buttonImageOnly'=>false,
				 'buttonText'=>'Fecha',
				 'selectOtherMonths'=>true,
				 'showAnim'=>'slide',
				 'showButtonPanel'=>false,
				 'showOn'=>'button',
				 'showOtherMonths'=>true,
				 'changeMonth' => 'true',
				 'changeYear' => 'true',
				 ),
			 )); ?>
		 <?php echo $form->error($model,'fecha_proceso_asc'); ?>
	 </div>

	 <div class="row">
		<?php echo $form->labelEx($model,'Proceso de Ascenso'); ?>
		<?php echo $form->dropDownList($model,'des_proceso_asc', array('NO INICIADO'=>'NO INICIADO', 'EN PROCESO'=>'EN PROCESO', 'FINALIZADO'=>'FINALIZADO'), array('options' => array($model->des_proceso_asc => array('selected'=>true)))); ?>
		<?php echo $form->error($model,'des_proceso_asc'); ?>
	</div>

	<div class="row">
		 <?php echo $form->labelEx($model,'Fecha de Postulacion'); ?>
		 <?php
			 if ($model->fecha_postulacion != '') 
			 {
				 $model->fecha_postulacion=date('Y-m-d',strtotime($model->fecha_postulacion));
			 }
				 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				 'model'=>$model,
				 'attribute'=>'fecha_postulacion',
				 'value'=>$model->fecha_postulacion,
				 'language' => 'es',
				 'htmlOptions' => array('readonly'=>"readonly"),
				 
				 'options'=>array(
				 'autoSize'=>true,
				 'defaultDate'=>$model->fecha_postulacion,
				 'dateFormat'=>'yy-mm-dd',
				 'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
				 'buttonImageOnly'=>false,
				 'buttonText'=>'Fecha',
				 'selectOtherMonths'=>true,
				 'showAnim'=>'slide',
				 'showButtonPanel'=>false,
				 'showOn'=>'button',
				 'showOtherMonths'=>true,
				 'changeMonth' => 'true',
				 'changeYear' => 'true',
				 ),
			 )); ?>
		 <?php echo $form->error($model,'fecha_postulacion'); ?>
	 </div>

	<div class="row">
		<?php echo $form->labelEx($model,'Proceso de Postulacion'); ?>
		<?php echo $form->dropDownList($model,'des_estatus_cond', array('ACTIVO'=>'ACTIVO', 'INACTIVO'=>'INACTIVO'), array('options' => array($model->des_estatus_cond => array('selected'=>true)))); ?>
		<?php echo $form->error($model,'des_estatus_cond'); ?>
	</div>

	<!--Apartado de porcentajes de evaluaciones-->

	 <div class="row">
	 	<?php echo $form->labelEx($model,'Porcentaje de nota de nivel acad&eacute;mico'); ?>
		<?php echo $form->textField($model,'porc_academico',array('size'=>60,'maxlength'=>2)); ?> %
		<?php echo $form->error($model,'des_estatus_cond'); ?>
	 </div>

	 <div class="row">
	 	<?php echo $form->labelEx($model,'Porcentaje de nota de antig&uuml;edad'); ?>
		<?php echo $form->textField($model,'porc_antiguedad',array('size'=>60,'maxlength'=>2)); ?> %
		<?php echo $form->error($model,'des_estatus_cond'); ?>
	 </div>

	 <div class="row">
	 	<?php echo $form->labelEx($model,'Porcentaje de nota de desempe&ntilde;o'); ?>
		<?php echo $form->textField($model,'porc_desempenho',array('size'=>60,'maxlength'=>2)); ?> %
		<?php echo $form->error($model,'des_estatus_cond'); ?>
	 </div>

	 <div class="row">
	 	<?php echo $form->labelEx($model,'Porcentaje de nota de mejoramiento profesional'); ?>
		<?php echo $form->textField($model,'porc_mejoram_prof',array('size'=>60,'maxlength'=>2)); ?> %
		<?php echo $form->error($model,'des_estatus_cond'); ?>
	 </div>

	 <div class="row">
	 	<?php echo $form->labelEx($model,'Porcentaje de nota de cursos'); ?>
		<?php echo $form->textField($model,'porc_cursos',array('size'=>60,'maxlength'=>2)); ?> %
		<?php echo $form->error($model,'des_estatus_cond'); ?>
	 </div>

	 <div class="row">
	 	<?php echo $form->labelEx($model,'Porcentaje de nota de condecoraciones'); ?>
		<?php echo $form->textField($model,'porc_condecor',array('size'=>60,'maxlength'=>2)); ?> %
		<?php echo $form->error($model,'des_estatus_cond'); ?>
	 </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->