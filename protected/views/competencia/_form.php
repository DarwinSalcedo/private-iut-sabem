<?php
/* @var $this CompetenciaController */
/* @var $model Competencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competencia-form',
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
		<?php #echo $form->labelEx($model,'id_competencia'); ?>
		<?php  if ($model->isNewRecord) echo $form->hiddenField($model,'id_competencia',array('value'=>$model->buscarUltimo())); ?>
		<?php #echo $form->error($model,'id_competencia'); ?>

	</div>

	<div class="row" style="margin:10px;">
						<?php echo $form->labelEx($model,'Cedula',array('label' =>'Elige el funcionario que se le asignaran puntaje' , )); ?>
						<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
						<?php // Working with selector					 
						 $this->widget('ext.select2.ESelect2',array(				 
						  'model'=>$model,
						  'attribute'=>'Cedula',
						  'data'=>$model->menuCedula(),
						  'htmlOptions' => array('class' => 'span5')
						)); ?>
						<?php echo $form->error($model,'Cedula'); ?>
					</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_demuestra_eficaz'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_demuestra_eficaz', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_demuestra_eficaz', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_demuestra_eficaz', array(
		'value'=>0.4,
		'uncheckValue'=>null));echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_demuestra_eficaz', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_demuestra_eficaz', array(
		'value'=>0.8,
		'uncheckValue'=>null));echo "<span>4</span>"; 
		?>
		<?php echo $form->error($model,'num_demuestra_eficaz'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_respetado_meritos'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_respetado_meritos', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_respetado_meritos', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_respetado_meritos', array(
		'value'=>0.4,
		'uncheckValue'=>null));echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_respetado_meritos', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_respetado_meritos', array(
		'value'=>0.8,
		'uncheckValue'=>null));echo "<span>4</span>"; 
		?>
		<?php echo $form->error($model,'num_respetado_meritos'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_nunca_decisi_impul'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_nunca_decisi_impul', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_nunca_decisi_impul', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_nunca_decisi_impul', array(
		'value'=>0.4,
		'uncheckValue'=>null));echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_nunca_decisi_impul', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_nunca_decisi_impul', array(
		'value'=>0.8,
		'uncheckValue'=>null));echo "<span>4</span>"; 
		?>
		<?php echo $form->error($model,'num_nunca_decisi_impul'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_habla_diccion_cohe'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_habla_diccion_cohe', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_habla_diccion_cohe', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_habla_diccion_cohe', array(
		'value'=>0.4,
		'uncheckValue'=>null)); echo "<span>2</span>";
		
		echo $form->radioButton($model, 'num_habla_diccion_cohe', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_habla_diccion_cohe', array(
		'value'=>0.8,
		'uncheckValue'=>null));echo "<span>4</span>"; 
		?>
		<?php echo $form->error($model,'num_habla_diccion_cohe'); ?>
	</div>

	<div class="row-check">
		<?php echo $form->labelEx($model,'num_actualizado_bom'); ?>
		<?php 
		
		echo $form->radioButton($model, 'num_actualizado_bom', array(
		'value'=>0,
		'uncheckValue'=>null));echo "<span>0</span>";
		
		echo $form->radioButton($model, 'num_actualizado_bom', array(
		'value'=>0.2,
		'uncheckValue'=>null));echo "<span>1</span>";
	
		echo $form->radioButton($model, 'num_actualizado_bom', array(
		'value'=>0.4,
		'uncheckValue'=>null));echo "<span>2</span>"; 
		
		echo $form->radioButton($model, 'num_actualizado_bom', array(
		'value'=>0.6,
		'uncheckValue'=>null));echo "<span>3</span>";
                
                echo $form->radioButton($model, 'num_actualizado_bom', array(
		'value'=>0.8,
		'uncheckValue'=>null)); echo "<span>4</span>";
		?>
		<?php echo $form->error($model,'num_actualizado_bom'); ?>
	</div>

		<div class="row-check">
		<div  id="ave" lass="ave" >RESULTADOS</div>
		</div>

	<div class="row-check">
		<?php #echo $form->labelEx($model,'num_TotComPorc'); ?>
		<?php echo $form->hiddenField($model,'num_TotComPorc',array('size'=>18,'maxlength'=>18)); ?>
		<?php #echo $form->error($model,'num_TotComPorc'); ?>
	</div>

	<div class="row-check">
		<?php #echo $form->labelEx($model,'num_TotComNota'); ?>
		<?php echo $form->hiddenField($model,'num_TotComNota',array('size'=>18,'maxlength'=>18)); ?>
		<?php #echo $form->error($model,'num_TotComNota'); ?>
	</div>
<div class="row-check">
						<?php if (yii::app()->user->checkAccess('Evaluador'))
								{
								echo $form->hiddenField($model,'id_evaluador', array('value' =>yii::app()->user->getState('cedula') , )); 
								}else{
									echo $form->labelEx($model,'id_evaluador',array('label' =>'Funcionario de Recepcion'));
									 $this->widget('ext.select2.ESelect2',array(				 
								  'model'=>$model,
								  'attribute'=>'id_evaluador',
								  'data'=>$model->menuCedula(),
								  'htmlOptions' => array('class' => 'span5')
								)); 
								}	

						# echo $form->dropDownList($model,'id_evaluador',$model->menuevaluador(),array('empty'=>' Seleccione ')); 
								?>
						
						<?php echo $form->error($model,'id_evaluador'); ?>
					</div><br>

					<div class="row-check">
						<?php echo'<br> '.$form->labelEx($model,'id_conf_asc_fecha'); ?>						
						<?php echo $form->dropDownList($model,'id_conf_asc_fecha',$model->menufecha(),array('empty'=>' Seleccione ')); ?>
						<?php echo $form->error($model,'id_conf_asc_fecha'); ?>
					</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->