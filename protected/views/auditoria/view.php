<?php
/* @var $this AuditoriaController */
/* @var $model Auditoria */

$this->breadcrumbs=array(
	'Auditorias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Auditoria', 'url'=>array('index')),
	array('label'=>'Create Auditoria', 'url'=>array('create')),
	array('label'=>'Update Auditoria', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Auditoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Auditoria', 'url'=>array('admin')),
);
?>

<h1>View Auditoria #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		'action',
		'model',
		'idModel',
		'field',
		'creationdate',
		'userid',
	),
)); ?>
