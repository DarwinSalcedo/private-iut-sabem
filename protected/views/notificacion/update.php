<?php
/* @var $this NotificacionController */
/* @var $model Notificacion */

$this->breadcrumbs=array(
	'Notificacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Notificacion', 'url'=>array('index')),
	array('label'=>'Create Notificacion', 'url'=>array('create')),
	array('label'=>'View Notificacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Notificacion', 'url'=>array('admin')),
);
?>

<h1>Update Notificacion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>