<?php
/* @var $this ExamenMedicoController */
/* @var $model ExamenMedico */

$this->breadcrumbs=array(
	'Examen Medicos'=>array('index'),
	'Create',
);

$this->menu=array(
	# array('label'=>'List ExamenMedico', 'url'=>array('index')),
	# array('label'=>'Manage ExamenMedico', 'url'=>array('admin')),
);
?>

<h1>Nuevo  ExamenMedico</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>