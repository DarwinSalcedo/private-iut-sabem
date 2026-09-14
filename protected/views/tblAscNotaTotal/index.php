<?php
/* @var $this TblAscNotaTotalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Asc Nota Totals',
);

$this->menu=array(
	array('label'=>'Create TblAscNotaTotal', 'url'=>array('create')),
	array('label'=>'Manage TblAscNotaTotal', 'url'=>array('admin')),
);
?>

<h1>Listados de Ascensos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
