<?php
/* @var $this NotificacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Notificacions',
);

$this->menu=array(
	array('label'=>'Enviar Notificacion', 'url'=>array('create')),
	#array('label'=>'Manage Notificacion', 'url'=>array('admin')),
);
?>

<h1>Notificaciones Enviadas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
