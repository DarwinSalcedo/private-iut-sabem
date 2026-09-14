<?php
/* @var $this ConfigPlazaController */
/* @var $model ConfigPlaza */

$this->breadcrumbs=array(
	'Config Plazas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Configuraciones de Plaza', 'url'=>array('index')),
	array('label'=>'Gestionar Configuraciones de Plaza', 'url'=>array('admin')),
);
?>

<h1>Crear Nueva Configuración de Plaza</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>