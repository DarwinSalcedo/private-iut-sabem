<?php
/* @var $this EvaluadorController */
/* @var $model Evaluador */

$this->breadcrumbs=array(
	'Evaluadors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Evaluador', 'url'=>array('index')),
	array('label'=>'Manage Evaluador', 'url'=>array('admin')),
);
?>

<h1>Create Evaluador</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>