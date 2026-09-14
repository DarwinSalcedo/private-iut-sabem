

<?php


/* @var $this FuncionariosController */
/* @var $model Funcionarios */


?>
<div class="wide form">
<h1>Buscar Evaluaciones y Examenes </h1>

<h4>Selecciona  o ingresa el nombre o cedula del funcionario que deseas buscar</h4>

<?php

	$models=Postulados::model();
	 $form=$this->beginWidget("CActiveForm");?>	


	<div class="row" style="margin:10px;">
		<?php echo $form->labelEx($model,'codigo',array('label' =>'Seleccione un funcionario ' , )); ?>
		<?php #echo $form->dropDownList($model,'Cedula',$model->menuCedula()); ?>
		
		 <?php if (yii::app()->user->checkAccess('Evaluador'))
		 {
		  // Working with selector		 
		 $this->widget('ext.select2.ESelect2',array(				 
		  'model'=>$model,
		  'attribute'=>'codigo',
		  'data'=>$models->listPostuladosEvaluador(),
		  'htmlOptions' => array('class' => 'span5')
			));
		 }else{
		# Working with selector		 
		 $this->widget('ext.select2.ESelect2',array(				 
		  'model'=>$model,
		  'attribute'=>'codigo',
		  'data'=>$models->listPostulados(),
		  'htmlOptions' => array('class' => 'span5')
		)); 	
		 	} ?>

		


		<?php echo $form->error($model,'codigo'); ?>
		<?php echo CHtml::submitButton("Ver Postulado",array("class="=>"btn","style"=>'height:30px')); ?>
	</div>
</div>
<?php $this->endWidget()?> 



     