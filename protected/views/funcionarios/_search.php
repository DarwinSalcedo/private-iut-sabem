<?php
/* @var $this FuncionariosController */
/* @var $model Funcionarios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Numero de identificacion'); ?>
		<?php echo $form->textField($model,'id_funcionario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cedula'); ?>
		<?php echo $form->textField($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Apellidos'); ?>
		<?php echo $form->textField($model,'Apellidos',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de Ingreso'); ?>
		<?php if ($model->Fecha_Ingreso != '') 
			 {
				 $model->Fecha_Ingreso=date('Y-m-d',strtotime($model->Fecha_Ingreso));
			 }
				 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				 'model'=>$model,
				 'attribute'=>'Fecha_Ingreso',
				 'value'=>$model->Fecha_Ingreso,
				 'language' => 'es',
				 'htmlOptions' => array('readonly'=>"readonly"),
				 
				 'options'=>array(
				 'autoSize'=>true,
				 'defaultDate'=>$model->Fecha_Ingreso,
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
		<?php echo $form->error($model,'Fecha_Ingreso'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'num_categoria'); ?>		
		<?php echo $form->dropDownList($model,'num_categoria',$model->menuCategoria(),array('empty'=>' Seleccione ')); ?>
		<?php echo $form->error($model,'num_categoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Jerarquia'); ?>
		<?php echo $form->dropDownList($model,'Cod_Jerarquia',$model->menuJerarquia(),array('empty'=>' Seleccione ')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Equipo'); ?>
		<?php echo $form->textField($model,'Equipo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	
	<div class="row">
		<?php echo $form->label($model,'Condicion'); ?>
		<?php echo $form->dropDownList($model,'Cod_Condicion',$model->menuCondicion(),array('empty'=>' Seleccione ')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Institucion'); ?>
		<?php echo $form->dropDownList($model,'cod_institucion',$model->menuInstitucion(),array('empty'=>' Seleccione ')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Observacion'); ?>
		<?php echo $form->textField($model,'Observacion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sexo'); ?>
		<?php echo CHtml::dropDownList('Sexo', $model,array('M' => 'Masculino', 'F' => 'Femenino'),array('empty'=>' Seleccione '));?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->