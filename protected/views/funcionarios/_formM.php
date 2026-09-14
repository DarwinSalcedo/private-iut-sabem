<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog8',
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
	'id'=>'examen-medico-form',
			'action'=>yii::app()->createUrl('ExamenMedico/create'),
// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con  <span class="required">*</span> son requeridos.</p>
	
	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php #echo $form->labelEx($model,'id_antidoping'); ?>
			<?php  if ($model->isNewRecord) echo $form->hiddenField($model,'id_exa_medico',array('value'=>$model->buscarUltimo())); ?>
		<?php #echo $form->error($model,'id_antidoping'); ?>
	</div>

<div class="row" >
		<?php #echo $form->labelEx($model,'Cedula',array('label' =>'Elige el funcionario que se le asignaran puntaje' , )); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php  echo $form->hiddenField($model,'Cedula', array('value' =>$cedula)); ?>
		<?php echo $form->error($model,'Cedula'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'des_asist_exa_medico'); ?>
		<?php #echo $form->textField($model,'des_asist_exa_medico',array('size'=>60,'maxlength'=>255)); ?>
		
 <?php echo $form->dropDownList($model,'des_asist_exa_medico',array('empty'=>'Seleccione','ASISTENTE'=>'ASISTENTE','INASISTENTE'=>'INASISTENTE'),array('ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('peticionajax'),
                            'update' => '#' . CHtml::activeId($model, 'des_asist_exa_medico_siglas'),                            
                            'success' => "function(data){                                 
                                jQuery('#ExamenMedico_des_asist_exa_medico_siglas').val(data);
                                }",                            
                        ),)); ?>

		<?php echo $form->error($model,'des_asist_exa_medico'); ?>
	</div>

	<div class="row">
		<?php #echo $form->labelEx($model,'des_asist_exa_medico_siglas'); ?>
		<?php echo $form->hiddenField($model,'des_asist_exa_medico_siglas',array('size'=>60,'maxlength'=>255)); ?>
		<?php #echo $form->error($model,'des_asist_exa_medico_siglas'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'des_asist_exa_condicion'); ?>
		<?php # echo $form->textArea($model,'des_asist_exa_condicion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->dropDownList($model,'des_asist_exa_condicion',array(''=>' Seleccione ' , 'APTO'=>' APTO ' , 'NO APTO'=>'NO APTO ' , )); ?>

		<?php echo $form->error($model,'des_asist_exa_condicion'); ?>
	</div>

	<div class="row-check">
	<?php #echo'<br> '.$form->labelEx($model,'id_conf_asc_fecha'); ?>						
	<?php $id= new FechaAsc;
	echo $form->hiddenField($model,'id_conf_asc_fecha', array('value' =>$id->obtenerUltimoId() ));?>
	<?php #echo $form->error($model,'id_conf_asc_fecha'); ?>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); 
$this->endWidget('zii.widgets.jui.CJuiDialog');?>
</div><!-- form -->