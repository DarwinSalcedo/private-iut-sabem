<?php
/* @var $this FisicaController */
/* @var $model Fisica */

$this->breadcrumbs=array(
	'Fisicas'=>array('index'),
	$model->id_fisica,
);

$this->menu=array(
#	array('label'=>'List Fisica', 'url'=>array('index')),
	array('label'=>'Registrar Fisica', 'url'=>array('create')),
	array('label'=>'Actualizar Fisica', 'url'=>array('update', 'id'=>$model->id_fisica)),
	array('label'=>'Eliminar Fisica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fisica),'confirm'=>'Are you sure you want to delete this item?')),
#	array('label'=>'Manage Fisica', 'url'=>array('admin')),
);
?>

<h1>Ver Fisica #<?php echo $model->id_fisica; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_fisica',
		'Cedula',
		'des_fisica_asistencia',
		'des_fisica_siglas_asistencia',
		'des_fisica_condicion',
		'num_fisica',
		'id_conf_asc_fecha',
	),
)); ?>
