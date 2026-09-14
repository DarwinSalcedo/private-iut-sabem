<?php
/* @var $this AntidopingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Antidopings',
);

$this->menu=array(
	array('label'=>'Create Antidoping', 'url'=>array('create')),
	array('label'=>'Manage Antidoping', 'url'=>array('admin')),
);
?>

<h1>Antidopings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
