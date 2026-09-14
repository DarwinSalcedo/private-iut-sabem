<?php
/* @var $this FisicaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fisicas',
);

$this->menu=array(
	array('label'=>'Create Fisica', 'url'=>array('create')),
	array('label'=>'Manage Fisica', 'url'=>array('admin')),
);
?>

<h1>Fisicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
