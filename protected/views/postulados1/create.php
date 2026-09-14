<?php
/* @var $this PostuladosController */
/* @var $model Postulados */

$this->breadcrumbs=array(
	'Postuladoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Postulados', 'url'=>array('index')),
	array('label'=>'Manage Postulados', 'url'=>array('admin')),
);
?>

<h1>Asignar Evaluador</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>