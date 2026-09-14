<?php
/* @var $this AlertaController */
/* @var $model Alerta */

$this->breadcrumbs=array(
	'Alertas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alerta', 'url'=>array('index')),
	array('label'=>'Create Alerta', 'url'=>array('create')),
	array('label'=>'Update Alerta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alerta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alerta', 'url'=>array('admin')),
);
?>

<h1>View Alerta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cedula_funcionario',
		'titulo',
		'descripcion',
	),
)); ?>
