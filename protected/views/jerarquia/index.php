<?php
/* @var $this JerarquiaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jerarquias',
);

$this->menu=array(
	array('label'=>'Create Jerarquia', 'url'=>array('create')),
	array('label'=>'Manage Jerarquia', 'url'=>array('admin')),
);
?>

<h1>Jerarquias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
