<?php
/* @var $this ConfigPlazaController */
/* @var $model ConfigPlaza */

$this->breadcrumbs=array(
	'Config Plazas'=>array('index'),
	$model->id_config_nota_plaza,
);

$this->menu=array(
	array('label'=>'Configuraciones de Plazas', 'url'=>array('index')),
	array('label'=>'Actualizar Configuración de Plaza', 'url'=>array('update', 'id'=>$model->id_config_nota_plaza)),
	array('label'=>'Eliminar Configuración de Plaza', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_config_nota_plaza),'confirm'=>'¿Está seguro que desea eliminar los datos?')),
);
?>

<h1>Ver Configuración de Plaza #<?php echo $model->id_config_nota_plaza; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_config_nota_plaza',
		'Cod_Jerarquia',
		'num_plazas',
		'num_nota_minima',
		'num_nota_final',
		'des_orden_general',
		'des_jerarq_orden',
		'id_conf_asc_fecha',
		'num_tiempo_jerar',
	),
)); ?>
