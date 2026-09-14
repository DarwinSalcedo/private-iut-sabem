<?php
/* @var $this EvaluadorController */
/* @var $model Evaluador */

$this->breadcrumbs=array(
	'Evaluadors'=>array('index'),
	$model->id_evaluador=>array('view','id'=>$model->id_evaluador),
	'Update',
);

$this->menu=array(
	array('label'=>'List Evaluador', 'url'=>array('index')),
	array('label'=>'Create Evaluador', 'url'=>array('create')),
	array('label'=>'View Evaluador', 'url'=>array('view', 'id'=>$model->id_evaluador)),
	array('label'=>'Manage Evaluador', 'url'=>array('admin')),
);
?>

<h1>Update Evaluador <?php echo $model->id_evaluador; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>