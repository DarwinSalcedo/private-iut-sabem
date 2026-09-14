<?php
/* @var $this AntidopingController */
/* @var $model Antidoping */

$this->breadcrumbs=array(
	'Antidopings'=>array('index'),
	'Create',
);

$this->menu=array(
	#array('label'=>'List Antidoping', 'url'=>array('index')),
	#array('label'=>'Manage Antidoping', 'url'=>array('admin')),
);
?>

<h1>Nuevo Antidoping</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>