<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialogpsq',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Actualizar',
        'autoOpen'=>false,
        'width'=>700,
       # 'height'=>200,        
        'resizable'=>false,
        'modal'=>true,
        'overlay'=>array(
            'backgroundColor'=>'#000',
            'opacity'=>'0.5'
        ),
    ),
));
 
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'psiquica-form',
	'action'=>yii::app()->createUrl('psiquica/create'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,#	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php #echo $form->labelEx($model,'id_competencia'); ?>
		<?php  if ($model->isNewRecord) echo $form->hiddenField($model,'id_psiquica',array('value'=>$model->buscarUltimo())); ?>
		<?php #echo $form->error($model,'id_competencia'); ?>

	</div>

	<div class="row" style="margin:10px;">
		<?php  echo $form->hiddenField($model,'Cedula', array('value' =>$cedula)); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php // Working with selector					 
		 /**$this->widget(
		 	'ext.select2.ESelect2',
		 	array(				 
				  'model'=>$model,
				  'attribute'=>'Cedula',
				  'data'=>$model->menuCedula(),
				  'htmlOptions' => array('class' => 'span5')
				)
	 	); */
		?>
		<?php echo $form->error($model,'Cedula'); ?>
	</div>

	<div class="row">

		<?php
			echo 
			$form->labelEx(
				$model,
				'des_psi_asistencia'
			); 
			echo
			$form->dropDownList(
				$model, 
				'des_psi_asistencia', 
              	array(
              		''=>'Seleccione',
              		'ASISTENTE' => 'ASISTENTE', 
              		'INASISTENTE' => 'INASISTENTE'
          		)
  			);
      	?>	
  	</div>

  	<div class="row">

		<?php
			echo 
			$form->labelEx(
				$model,
				'des_psi_condicion'
			); 
			echo
			$form->dropDownList(
				$model, 
				'des_psi_condicion', 
              	array(
              		''=>'Seleccione',
              		'APTO' => 'APTO', 
              		'NO APTO' => 'NO APTO'
          		)
  			);
      	?>	
  	</div>

  	<div class="row">
		<?php $id= new FechaAsc;
	echo $form->hiddenField($model,'id_conf_asc_fecha', array('value' =>$id->obtenerUltimoId() ));?>
	<?php #echo $form->error($model,'id_conf_asc_fecha'); ?>
	</div>	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar cambios'); ?>
	</div>

<?php $this->endWidget(); 

$this->endWidget('zii.widgets.jui.CJuiDialog');?>

</div><!-- form -->