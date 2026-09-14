<?php
/* @var $this PsiquicaController */
/* @var $model Psiquica */

$this->breadcrumbs=array(
	'Psiquicas'=>array('index'),
	$model->id_psiquica,
);

$this->menu=array(
	array('label'=>'List Psiquica', 'url'=>array('index')),
	array('label'=>'Create Psiquica', 'url'=>array('create')),
	array('label'=>'Update Psiquica', 'url'=>array('update', 'id'=>$model->id_psiquica)),
	array('label'=>'Delete Psiquica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_psiquica),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Psiquica', 'url'=>array('admin')),
);
?>

<h1>View Psiquica #<?php echo $model->id_psiquica; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_psiquica',
		'Cedula',
		'des_psi_asistencia',
		'des_psi_siglas_asistencia',
		'des_psi_condicion',
		'id_conf_asc_fecha',
	),
)); ?>
