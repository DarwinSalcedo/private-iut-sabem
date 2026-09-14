<?php
/* @var $this IngresoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingresos',
);

$this->menu=array(
	array('label'=>'Create Ingreso', 'url'=>array('create')),
	array('label'=>'Manage Ingreso', 'url'=>array('admin')),
);
?>

<h1>Ingresos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
