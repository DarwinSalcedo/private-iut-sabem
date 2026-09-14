<?php
/* @var $this AptitudActitudController */
/* @var $model AptitudActitud */

$this->breadcrumbs=array(
	'Aptitud Actituds'=>array('index'),
	$model->id_aptitud,
);

$this->menu=array(
	#array('label'=>'List AptitudActitud', 'url'=>array('index')),
	array('label'=>'registrar Aptitud-Actitud', 'url'=>array('create')),
	array('label'=>'Actualizar Aptitud-Actitud', 'url'=>array('update', 'id'=>$model->id_aptitud)),
	array('label'=>'Eliminar Aptitud-Actitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_aptitud),'confirm'=>'Are you sure you want to delete this item?')),
	#array('label'=>'Manage AptitudActitud', 'url'=>array('admin')),
);
?>

<h1>Ver Aptitud-Actitud #<?php echo $model->id_aptitud; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_aptitud',
		'Cedula',
		'num_puntualidad_asist',
		'num_presentacion_apar',
		'num_actitud_institucion',
		'num_actitud_superiores',
		'num_cooperacion',
		'num_TotApPorc',
		'num_TotAcNota',
		'id_evaluador',
		'id_conf_asc_fecha',
	),
)); ?>
