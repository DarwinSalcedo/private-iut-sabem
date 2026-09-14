<?php
/* @var $this PsiquicaController */
/* @var $model Psiquica */

$this->breadcrumbs=array(
	'Psiquicas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Psiquica', 'url'=>array('index')),
	array('label'=>'Manage Psiquica', 'url'=>array('admin')),
);
?>

<h1>Crear examen Psíquico</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>