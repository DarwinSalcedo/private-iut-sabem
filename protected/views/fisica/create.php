<?php
/* @var $this FisicaController */
/* @var $model Fisica */

$this->breadcrumbs=array(
	'Fisicas'=>array('index'),
	'Create',
);

$this->menu=array(
#	array('label'=>'List Fisica', 'url'=>array('index')),
#	array('label'=>'Manage Fisica', 'url'=>array('admin')),
);
?>

<h1>Nuevo  Examen De Aptitud Fisica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>