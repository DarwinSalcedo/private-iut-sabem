<?php
/* @var $this EvaluadorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluadors',
);

$this->menu=array(
	array('label'=>'Create Evaluador', 'url'=>array('create')),
	array('label'=>'Manage Evaluador', 'url'=>array('admin')),
);
?>

<h1>Evaluadors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
