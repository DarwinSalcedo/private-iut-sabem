<?php
/* @var $this EspirituBomberilController */
/* @var $model EspirituBomberil */

$this->breadcrumbs=array(
	'Espiritu Bomberils'=>array('index'),
	$model->id_espiritu_bom,
);

$this->menu=array(
	#array('label'=>'List EspirituBomberil', 'url'=>array('index')),
	array('label'=>'Registrar Espiritu Bomberil', 'url'=>array('create')),
	array('label'=>'Actualizar Espiritu Bomberil', 'url'=>array('update', 'id'=>$model->id_espiritu_bom)),
	array('label'=>'Eliminar Espiritu Bomberil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_espiritu_bom),'confirm'=>'Are you sure you want to delete this item?')),
	#array('label'=>'Manage EspirituBomberil', 'url'=>array('admin')),
);
?>

<h1>Ver EspirituBomberil #<?php echo $model->id_espiritu_bom; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_espiritu_bom',
		'Cedula',
		'num_disciplinado',
		'num_demuestra_mistica',
		'num_abnegado',
		'num_demuestra_inden',
		'num_demuestra_comp',
		'num_TotEspPorc',
		'num_TotEspNota',
		'id_evaluador',
		'id_conf_asc_fecha',
	),
)); ?>
