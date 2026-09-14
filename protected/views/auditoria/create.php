<?php
/* @var $this AuditoriaController */
/* @var $model Auditoria */

$this->breadcrumbs=array(
	'Auditorias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Auditoria', 'url'=>array('index')),
	array('label'=>'Manage Auditoria', 'url'=>array('admin')),
);
?>

<h1>Create Auditoria</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>