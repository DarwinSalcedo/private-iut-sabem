<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog9',
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
	'id'=>'antidoping-form',
			'action'=>yii::app()->createUrl('antidoping/create'),

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
			<?php  if ($model->isNewRecord) echo $form->hiddenField($model,'id_antidoping',array('value'=>Antidoping::buscarUltimo())); ?>
		<?php #echo $form->error($model,'id_antidoping'); ?>
	</div>

<div class="row" >
		<?php #echo $form->labelEx($model,'Cedula',array('label' =>'Elige el funcionario que se le asignaran puntaje' , )); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php  echo $form->hiddenField($model,'Cedula', array('value' =>$cedula)); ?>
		<?php echo $form->error($model,'Cedula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des_antid_asistencia'); ?>
		<?php  #echo $form->textField($model,'des_antid_asistencia',array('size'=>60,'maxlength'=>255)); ?>
		
 <?php echo $form->dropDownList($model,'des_antid_asistencia',array('empty'=>'Seleccione','ASISTENTE'=>'ASISTENTE','INASISTENTE'=>'INASISTENTE'),array('ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('peticionajax'),
                            'update' => '#' . CHtml::activeId($model, 'des_antid_siglas_asistencia'),                            
                            'success' => "function(data){                                 
                                jQuery('#Antidoping_des_antid_siglas_asistencia').val(data);
                                }",                            
                        ),)); ?>

		<?php echo $form->error($model,'des_antid_asistencia'); ?>
	</div>

	<div class="row">
		<?php #echo $form->labelEx($model,'des_antid_siglas_asistencia'); ?>
		<?php echo $form->hiddenField($model,'des_antid_siglas_asistencia',array('size'=>60,'maxlength'=>255)); ?>
		<?php #echo $form->error($model,'des_antid_siglas_asistencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'des_antid_condicion'); ?>
		<?php #echo $form->textArea($model,'des_antid_condicion',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->dropDownList($model,'des_antid_condicion',array(''=>' Seleccione ' , 'NEGATIVO'=>' Negativo ' , 'POSITIVO'=>'positivo ' , )); ?>

		<?php echo $form->error($model,'des_antid_condicion'); ?>
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