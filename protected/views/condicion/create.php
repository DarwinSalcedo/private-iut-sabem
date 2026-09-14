<?php
/* @var $this CondicionController */
/* @var $model Condicion */

$this->breadcrumbs=array(
	'Condicions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Condicion', 'url'=>array('index')),
	array('label'=>'Manage Condicion', 'url'=>array('admin')),
);
?>

<h1>Create Condicion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>