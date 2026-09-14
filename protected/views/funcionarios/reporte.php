

<?php


/* @var $this FuncionariosController */
/* @var $model Funcionarios */


$this->menu=array(
	array('label'=>'Listar Funcionarios', 'url'=>array('index')),
	array('label'=>'Registrar Funcionario', 'url'=>array('create')),
	array('label'=>'Reportes por jerarquia', 'url'=>array('reportes')),
);
?>
<div class="wide form">
<h1>Reportes de jerarquias </h1>

<h4>Selecciona  la jerarquia que deseas generar  en formato PDF</h4>

<?php 
	$models=Funcionarios::model();
	 $form=$this->beginWidget("CActiveForm");?>	

	<div class="input-append">
		
		<?php echo $form->dropDownList($model,'codigo',$models->menuJerarquia()); ?>
		<?php echo $form->error($model,'codigo'); ?>
		<?php echo CHtml::submitButton("Generar",array("class="=>"btn","style"=>'height:30px')); ?>


		

	</div>
</div>
<?php $this->endWidget()?> 



     