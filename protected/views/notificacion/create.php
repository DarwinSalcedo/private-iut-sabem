<?php
/* @var $this NotificacionController */
/* @var $model Notificacion */

$this->breadcrumbs=array(
	'Notificacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Notificaciones Enviadas', 'url'=>array('index')),
#	array('label'=>'Manage Notificacion', 'url'=>array('admin')),
);
?>

<h1>Enviar Notificacion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>