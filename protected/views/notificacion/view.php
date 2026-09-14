<?php
/* @var $this NotificacionController */
/* @var $model Notificacion */

$this->breadcrumbs=array(
	'Notificacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Notificaciones Enviadas', 'url'=>array('index')),
	array('label'=>'Enviar Notificacion', 'url'=>array('create')),
	#array('label'=>'Update Notificacion', 'url'=>array('update', 'id'=>$model->id)),
	#array('label'=>'Delete Notificacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	#array('label'=>'Manage Notificacion', 'url'=>array('admin')),
);
?>

<h1>Notificacion número<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'id',
		'cedula',
		'asunto',
		'mensaje',
		'fecha_hora',
		'email',
	#	'cedula_enviado',
	),
)); ?>
