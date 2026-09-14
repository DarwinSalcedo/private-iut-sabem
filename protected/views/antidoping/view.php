<?php
/* @var $this AntidopingController */
/* @var $model Antidoping */

$this->breadcrumbs=array(
	'Antidopings'=>array('index'),
	$model->id_antidoping,
);

$this->menu=array(
	#array('label'=>'List Antidoping', 'url'=>array('index')),
	array('label'=>'Registrar Antidoping', 'url'=>array('create')),
	array('label'=>'Actualizar Antidoping', 'url'=>array('update', 'id'=>$model->id_antidoping)),
	array('label'=>'Eliminar Antidoping', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_antidoping),'confirm'=>'Are you sure you want to delete this item?')),
	#array('label'=>'Manage Antidoping', 'url'=>array('admin')),
);
?>

<h1>Ver Antidoping #<?php echo $model->id_antidoping; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_antidoping',
		'Cedula',
		'des_antid_asistencia',
		'des_antid_siglas_asistencia',
		'des_antid_condicion',
		'id_conf_asc_fecha',
	),
)); ?>
