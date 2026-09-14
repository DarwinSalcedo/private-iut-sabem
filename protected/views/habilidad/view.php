<?php
/* @var $this HabilidadController */
/* @var $model Habilidad */

$this->breadcrumbs=array(
	'Habilidads'=>array('index'),
	$model->id_habilidad,
);

$this->menu=array(
#	array('label'=>'List Habilidad', 'url'=>array('index')),
	array('label'=>'Registrar Habilidad', 'url'=>array('create')),
	array('label'=>'Actualizar Habilidad', 'url'=>array('update', 'id'=>$model->id_habilidad)),
	array('label'=>'Eliminar Habilidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_habilidad),'confirm'=>'Are you sure you want to delete this item?')),
#	array('label'=>'Manage Habilidad', 'url'=>array('admin')),
);
?>

<h1>Ver Habilidad #<?php echo $model->id_habilidad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_habilidad',
		'Cedula',
		'num_carisma_lider',
		'num_iniciativa_crea',
		'num_manejo_conflitos',
		'num_coordinacion',
		'num_toma_decisiones',
		'num_TotHaPorc',
		'num_TotHaNota',
		'id_evaluador',
		'id_conf_asc_fecha',
	),
)); ?>
