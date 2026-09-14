<?php
/* @var $this CompetenciaController */
/* @var $model Competencia */

$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	'Create',
);

$this->menu=array(
	#array('label'=>'List Competencia', 'url'=>array('index')),
	#array('label'=>'Manage Competencia', 'url'=>array('admin')),
);
?>

<h1>Nueva Evaluación Competencia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>