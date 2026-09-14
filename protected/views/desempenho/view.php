<?php
/* @var $this DesempenhoController */
/* @var $model Desempenho */

$this->breadcrumbs=array(
	'Desempenhos'=>array('index'),
	$model->id_desempe,
);

$this->menu=array(
	#array('label'=>'List Desempenho', 'url'=>array('index')),
	array('label'=>'Registrar Desempeño', 'url'=>array('create')),
	array('label'=>'Actualizar Desempeño', 'url'=>array('update', 'id'=>$model->id_desempe)),
	array('label'=>'Eliminar Desempeño', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_desempe),'confirm'=>'Are you sure you want to delete this item?')),
	#array('label'=>'Manage Desempenho', 'url'=>array('admin')),
);
?>

<h1>Ver Desempeño #<?php echo $model->id_desempe; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_desempe',
		'Cedula',
		'num_responsabilidad',
		'num_productividad',
		'num_conocimiento',
		'num_capacidad_delegar',
		'num_order_planificacion',
		'num_TotDesemPorc',
		'num_TotDesemNota',
		'id_evaluador',
		'id_conf_asc_fecha',
	),
)); ?>
