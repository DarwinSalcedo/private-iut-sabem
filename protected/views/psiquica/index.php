<?php
/* @var $this PsiquicaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Psiquicas',
);

$this->menu=array(
	array('label'=>'Create Psiquica', 'url'=>array('create')),
	array('label'=>'Manage Psiquica', 'url'=>array('admin')),
);
?>

<h1>Psiquicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
