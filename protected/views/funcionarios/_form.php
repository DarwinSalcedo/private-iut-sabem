<?php
/* @var $this FuncionariosController */
/* @var $model Funcionarios */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'funcionarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los Campos con el <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

 <div class="row">
		<?php #echo $form->labelEx($model,'id_funcionario'); ?>
		
		<?php
		 if ($model->isNewRecord){	
		 echo $form->hiddenField($model,'id_funcionario',array('value'=>$model->buscarUltimo()));
		 }
		 ?>
		
		
		<?php #echo $form->error($model,'id_funcionario'); ?>
	</div> 
	<div style="width:80%">
<div class="Span3" style="float:left" >
	<div class="row">
		<?php echo $form->labelEx($model,'Cedula'); ?>
		<?php if ($model->isNewRecord)
				echo $form->textField($model,'Cedula'); 
		 	else
		 		echo $form->textField($model,'Cedula',array('readonly'=>"readonly")); 
		?>
		<?php echo $form->error($model,'Cedula'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Apellidos'); ?>
		<?php echo $form->textField($model,'Apellidos',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Apellidos'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'Sexo'); ?>
		
		<?php echo $form->dropDownList($model,'Sexo',$model->menuSexo(),array('empty'=>' Seleccione ')); ?>
		
		<?php echo $form->error($model,'Sexo'); ?>
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
		<?php echo $form->labelEx($model,'Equipo'); ?>
		<?php echo $form->textField($model,'Equipo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Equipo'); ?>
	</div>


	

</div>
<div class="Span3" style="float:right">

<div class="row">
		<?php echo $form->labelEx($model,'Condicion'); ?>
		<?php echo $form->dropDownList($model,'Cod_Condicion',$model->menuCondicion(),array('empty'=>' Seleccione ')); ?>
		<?php echo $form->error($model,'Cod_Condicion'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'num_categoria'); ?>		
		<?php echo $form->dropDownList($model,'num_categoria',$model->menuCategoria(),array('empty'=>' Seleccione ')); ?>
		<?php echo $form->error($model,'num_categoria'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Jerarquia'); ?>
		<?php echo $form->dropDownList($model,'Cod_Jerarquia',$model->menuJerarquia(),array('empty'=>' Seleccione ')); ?>
		<?php echo $form->error($model,'Cod_Jerarquia'); ?>
	</div>


	<div class="row">
		<?php 

			echo $form->labelEx($model,'des_nivel_acade'); ?>

		<?php if ( !empty($nivel->des_nivel_acade))
				echo $form->dropDownList($model,'des_nivel_acade',$model->menuNivel(), array( 'options'  => array( $nivel->des_nivel_acade =>  array( 'selected'  =>  true ))));
			else
				echo $form->dropDownList($model,'des_nivel_acade',$model->menuNivel(),array('empty'=>' Seleccione '));
		 		 

		 	?>
		<?php echo $form->error($model,'des_nivel_acade'); ?>
	</div>
	
	

	<div class="row">
		<?php #echo $form->labelEx($model,'Institucion') ?>
		<?php echo $form->hiddenField($model,'cod_institucion',array('value'=>'1')); ?>
		<?php # echo $form->dropDownList($model,'cod_institucion',$model->menuInstitucion(),array('empty'=>' Seleccione ')); ?>
		<?php # echo $form->error($model,'cod_institucion'); ?>
	</div>

	

	

	<div class="row">
		<?php echo $form->labelEx($model,'Observacion'); ?>
		<?php echo $form->textArea($model,'Observacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Observacion'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar'); ?>
	</div>


	
</div>
</div><!-- span  -->
<?php $this->endWidget(); ?>

</div><!-- form -->
