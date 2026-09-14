<?php
/* @var $this CompetenciaController */
/* @var $model Competencia */

$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	$model->id_competencia,
);

$this->menu=array(
	#array('label'=>'List Competencia', 'url'=>array('index')),
	array('label'=>'Registrar Competencia', 'url'=>array('create')),
	array('label'=>'Actualizar Competencia', 'url'=>array('update', 'id'=>$model->id_competencia)),
	array('label'=>'Eliminar Competencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_competencia),'confirm'=>'Are you sure you want to delete this item?')),
	#array('label'=>'Manage Competencia', 'url'=>array('admin')),
);
?>

<h1>Ver Competencia #<?php echo $model->id_competencia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_competencia',
		'Cedula',
		'num_demuestra_eficaz',
		'num_respetado_meritos',
		'num_nunca_decisi_impul',
		'num_habla_diccion_cohe',
		'num_actualizado_bom',
		'num_TotComPorc',
		'num_TotComNota',
		'id_evaluador',
		'id_conf_asc_fecha',
	),
)); ?>
