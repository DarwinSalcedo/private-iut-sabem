<?php
/* @var $this FechaAscController */
/* @var $model FechaAsc */

$this->breadcrumbs=array(
	'Fecha Ascs'=>array('index'),
	$model->id_conf_asc_fecha,
);

$this->menu=array(
	array('label'=>'Histórico de Fechas de Postulación', 'url'=>array('index')),
	array('label'=>'Crear Fecha de Postulación', 'url'=>array('create')),
	array('label'=>'Actualizar Fechas', 'url'=>array('update', 'id'=>$model->id_conf_asc_fecha)),
	array('label'=>'Eliminar Fechas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_conf_asc_fecha),'confirm'=>'¿Está seguro de que quiere eliminar estos datos?')),
);
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_conf_asc_fecha',
		'fecha_proceso_asc',
		'des_proceso_asc',
		'des_estatus_cond',
		'fecha_postulacion',
		'porc_antiguedad',
		'porc_desempenho',
		'porc_mejoram_prof',
		'porc_cursos',
		'porc_condecor',
	),
)); ?>
