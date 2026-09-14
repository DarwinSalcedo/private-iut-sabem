<?php
/* @var $this JerarquiaController */
/* @var $model Jerarquia */

$this->breadcrumbs=array(
	'Jerarquias'=>array('index'),
	$model->Cod_Jerarquia,
);

$this->menu=array(
	array('label'=>'List Jerarquia', 'url'=>array('index')),
	array('label'=>'Create Jerarquia', 'url'=>array('create')),
	array('label'=>'Update Jerarquia', 'url'=>array('update', 'id'=>$model->Cod_Jerarquia)),
	array('label'=>'Delete Jerarquia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Cod_Jerarquia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jerarquia', 'url'=>array('admin')),
);
?>

<h1>View Jerarquia #<?php echo $model->Cod_Jerarquia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Cod_Jerarquia',
		'Descripcion_Jerarquia',
	),
)); ?>
