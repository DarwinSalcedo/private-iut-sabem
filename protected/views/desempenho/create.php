<?php
/* @var $this DesempenhoController */
/* @var $model Desempenho */

$this->breadcrumbs=array(
	'Desempenhos'=>array('index'),
	'Create',
);

$this->menu=array(
#	array('label'=>'Listar Desempeño', 'url'=>array('index')),
#	array('label'=>'Administrar Desempeños', 'url'=>array('admin')),
);
?>



<h1>Nueva Evaluación Desempeño</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

