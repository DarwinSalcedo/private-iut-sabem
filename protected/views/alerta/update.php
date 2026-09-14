<?php
/* @var $this AlertaController */
/* @var $model Alerta */

$this->breadcrumbs=array(
	'Alertas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alerta', 'url'=>array('index')),
	array('label'=>'Create Alerta', 'url'=>array('create')),
	array('label'=>'View Alerta', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Alerta', 'url'=>array('admin')),
);
?>

<h1>Update Alerta <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>