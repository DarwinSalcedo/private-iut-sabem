<?php
/* @var $this CondicionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Condicions',
);

$this->menu=array(
	array('label'=>'Create Condicion', 'url'=>array('create')),
	array('label'=>'Manage Condicion', 'url'=>array('admin')),
);
?>

<h1>Condicions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
