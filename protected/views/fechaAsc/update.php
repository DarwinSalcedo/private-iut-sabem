<?php
/* @var $this FechaAscController */
/* @var $model FechaAsc */

$this->breadcrumbs=array(
	'Fecha Ascs'=>array('index'),
	$model->id_conf_asc_fecha=>array('view','id'=>$model->id_conf_asc_fecha),
	'Update',
);

$this->menu=array(
	array('label'=>'List FechaAsc', 'url'=>array('index')),
	array('label'=>'Create FechaAsc', 'url'=>array('create')),
	array('label'=>'View FechaAsc', 'url'=>array('view', 'id'=>$model->id_conf_asc_fecha)),
	array('label'=>'Manage FechaAsc', 'url'=>array('admin')),
);
?>

<h1>Update FechaAsc <?php echo $model->id_conf_asc_fecha; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>