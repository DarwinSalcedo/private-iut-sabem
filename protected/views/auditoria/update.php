<?php
/* @var $this AuditoriaController */
/* @var $model Auditoria */

$this->breadcrumbs=array(
	'Auditorias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Auditoria', 'url'=>array('index')),
	array('label'=>'Create Auditoria', 'url'=>array('create')),
	array('label'=>'View Auditoria', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Auditoria', 'url'=>array('admin')),
);
?>

<h1>Update Auditoria <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>