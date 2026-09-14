<?php
/* @var $this CondicionController */
/* @var $model Condicion */

$this->breadcrumbs=array(
	'Condicions'=>array('index'),
	$model->Cod_Condicion=>array('view','id'=>$model->Cod_Condicion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Condicion', 'url'=>array('index')),
	array('label'=>'Create Condicion', 'url'=>array('create')),
	array('label'=>'View Condicion', 'url'=>array('view', 'id'=>$model->Cod_Condicion)),
	array('label'=>'Manage Condicion', 'url'=>array('admin')),
);
?>

<h1>Update Condicion <?php echo $model->Cod_Condicion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>