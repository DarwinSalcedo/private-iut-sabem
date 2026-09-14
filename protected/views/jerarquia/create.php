<?php
/* @var $this JerarquiaController */
/* @var $model Jerarquia */

$this->breadcrumbs=array(
	'Jerarquias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jerarquia', 'url'=>array('index')),
	array('label'=>'Manage Jerarquia', 'url'=>array('admin')),
);
?>

<h1>Create Jerarquia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>