<?php
/* @var $this DesempenhoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Desempenhos',
);

$this->menu=array(
	array('label'=>'Create Desempenho', 'url'=>array('create')),
	array('label'=>'Manage Desempenho', 'url'=>array('admin')),
);
?>

<h1>Desempenhos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
