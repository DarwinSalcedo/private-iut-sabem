<?php
/* @var $this InstitucionController */
/* @var $model Institucion */

$this->breadcrumbs=array(
	'Institucions'=>array('index'),
	$model->cod_institucion,
);

$this->menu=array(
	array('label'=>'List Institucion', 'url'=>array('index')),
	array('label'=>'Create Institucion', 'url'=>array('create')),
	array('label'=>'Update Institucion', 'url'=>array('update', 'id'=>$model->cod_institucion)),
	array('label'=>'Delete Institucion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_institucion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Institucion', 'url'=>array('admin')),
);
?>

<h1>View Institucion #<?php echo $model->cod_institucion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_institucion',
		'nombre_institucion',
		'siglas_institucion',
		'Cod_Conf_Gobernacion',
	),
)); ?>
