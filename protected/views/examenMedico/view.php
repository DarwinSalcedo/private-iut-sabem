<?php
/* @var $this ExamenMedicoController */
/* @var $model ExamenMedico */

$this->breadcrumbs=array(
	'Examen Medicos'=>array('index'),
	$model->id_exa_medico,
);

$this->menu=array(
	#array('label'=>'List ExamenMedico', 'url'=>array('index')),
	array('label'=>'Registrar Examen Medico', 'url'=>array('create')),
	array('label'=>'Actualizar Examen Medico', 'url'=>array('update', 'id'=>$model->id_exa_medico)),
	array('label'=>'Eliminar Examen Medico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_exa_medico),'confirm'=>'Are you sure you want to delete this item?')),
	#array('label'=>'Manage ExamenMedico', 'url'=>array('admin')),
);
?>

<h1>Ver Examen Medico #<?php echo $model->id_exa_medico; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_exa_medico',
		'Cedula',
		'des_asist_exa_medico',
		'des_asist_exa_medico_siglas',
		'des_asist_exa_condicion',
		'id_conf_asc_fecha',
	),
)); ?>
