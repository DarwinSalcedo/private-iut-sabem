<?php
/* @var $this AntidopingController */
/* @var $model Antidoping */

$this->breadcrumbs=array(
	'Antidopings'=>array('index'),
	$model->id_antidoping=>array('view','id'=>$model->id_antidoping),
	'Update',
);

$this->menu=array(
	#array('label'=>'List Antidoping', 'url'=>array('index')),
	array('label'=>'Registrar Antidoping', 'url'=>array('create')),
	array('label'=>'Ver Antidoping', 'url'=>array('view', 'id'=>$model->id_antidoping)),
	#array('label'=>'Manage Antidoping', 'url'=>array('admin')),
);
?>

<h1>Actualizar Antidoping <?php echo $model->id_antidoping; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>