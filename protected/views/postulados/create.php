<?php
/* @var $this PostuladosController */
/* @var $model Postulados */

$this->breadcrumbs=array(
	'Postuladoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de Postulados', 'url'=>array('index')),
	array('label'=>'Gestionar Postulados', 'url'=>array('admin')),
);
?>

<h1>Asignar Evaluador</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'cedula'=>$cedula)); ?>