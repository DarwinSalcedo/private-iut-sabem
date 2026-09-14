<?php
/* @var $this HabilidadController */
/* @var $model Habilidad */

$this->breadcrumbs=array(
	'Habilidads'=>array('index'),
	'Create',
);

$this->menu=array(
#	array('label'=>'List Habilidad', 'url'=>array('index')),
#	array('label'=>'Manage Habilidad', 'url'=>array('admin')),
);
?>

<h1>Nueva Evaluación Habilidad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>