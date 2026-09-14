<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'mydialog2',
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
	'id'=>'espiritu-bomberil-form',
	'action'=>yii::app()->createUrl('EspirituBomberil/create'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>true,
		'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Los campos con  <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php #echo $form->labelEx($model,'id_espiritu_bom'); ?>
		<?php  if ($model->isNewRecord) echo $form->hiddenField($model,'id_espiritu_bom',array('value'=>$model->buscarUltimo())); ?>
		<?php #echo $form->error($model,'id_espiritu_bom'); ?>
	</div>

	<div class="row" >
		<?php #echo $form->labelEx($model,'Cedula',array('label' =>'Elige el funcionario que se le asignaran puntaje' , )); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		<?php  echo $form->hiddenField($model,'Cedula', array('value' =>$cedula)); ?>
		<?php echo $form->error($model,'Cedula'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_disciplinado'); ?>
			<?php 
		
		echo $form->radioButton($model, 'num_disciplinado', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_disciplinado', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_disciplinado', array(
		'value'=>0.4,
		'uncheckValue'=>null));echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_disciplinado', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_disciplinado', array(
		'value'=>0.8,
		'uncheckValue'=>null)); echo "<span>4</span>";
		?>
		<?php echo $form->error($model,'num_disciplinado'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_demuestra_mistica'); ?>
			<?php 
		
		echo $form->radioButton($model, 'num_demuestra_mistica', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_demuestra_mistica', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_demuestra_mistica', array(
		'value'=>0.4,
		'uncheckValue'=>null));echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_demuestra_mistica', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_demuestra_mistica', array(
		'value'=>0.8,
		'uncheckValue'=>null)); echo "<span>4</span>";
		?>
		<?php echo $form->error($model,'num_demuestra_mistica'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_abnegado'); ?>
			<?php 
		
		echo $form->radioButton($model, 'num_abnegado', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_abnegado', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_abnegado', array(
		'value'=>0.4,
		'uncheckValue'=>null)); echo "<span>2</span>";
		
		echo $form->radioButton($model, 'num_abnegado', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_abnegado', array(
		'value'=>0.8,
		'uncheckValue'=>null)); echo "<span>4</span>";
		?>
		<?php echo $form->error($model,'num_abnegado'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_demuestra_inden'); ?>
			<?php 
		
		echo $form->radioButton($model, 'num_demuestra_inden', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_demuestra_inden', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_demuestra_inden', array(
		'value'=>0.4,
		'uncheckValue'=>null)); echo "<span>2</span>";
		
		echo $form->radioButton($model, 'num_demuestra_inden', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_demuestra_inden', array(
		'value'=>0.8,
		'uncheckValue'=>null)); echo "<span>4</span>";
		?>
		<?php echo $form->error($model,'num_demuestra_inden'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_demuestra_comp'); ?>
			<?php 
		
		echo  $form->radioButton($model, 'num_demuestra_comp', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo  $form->radioButton($model, 'num_demuestra_comp', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo  $form->radioButton($model, 'num_demuestra_comp', array(
		'value'=>0.4,
		'uncheckValue'=>null));echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_demuestra_comp', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo  $form->radioButton($model, 'num_demuestra_comp', array(
		'value'=>0.8,
		'uncheckValue'=>null));echo "<span>4</span>"; 
		?>
		<?php echo $form->error($model,'num_demuestra_comp'); ?>
	</div>

	<div class="row-check">
	<div id="aveeb" class="aveeb"> Resultados </div>

	</div>

	<div class="row-check">
		<?php #echo $form->labelEx($model,'num_TotEspPorc'); ?>
		<?php echo $form->hiddenField($model,'num_TotEspPorc',array('size'=>18,'maxlength'=>18)); ?>
		<?php #echo $form->error($model,'num_TotEspPorc'); ?>
	</div>

	<div class="row-check">
		<?php #echo $form->labelEx($model,'num_TotEspNota'); ?>
		<?php echo $form->hiddenField($model,'num_TotEspNota',array('size'=>18,'maxlength'=>18)); ?>
		<?php #echo $form->error($model,'num_TotEspNota'); ?>
	</div>

	<div class="row-check">
						<?php if (yii::app()->user->checkAccess('Evaluador'))
								{
								echo $form->hiddenField($model,'id_evaluador', array('value' =>yii::app()->user->getState('cedula') , )); 
								}else{
									echo $form->hiddenField($model,'id_evaluador', array('value' =>$recepcion ));  
								}	

						# echo $form->dropDownList($model,'id_evaluador',$model->menuevaluador(),array('empty'=>' Seleccione ')); 
								?>						
						<?php echo $form->error($model,'id_evaluador'); ?>
					</div><br>

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