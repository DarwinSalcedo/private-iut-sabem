<?php
/* @var $this TblAscNotaTotalController */
/* @var $model TblAscNotaTotal */

$this->breadcrumbs=array(
	'Tbl Asc Nota Totals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblAscNotaTotal', 'url'=>array('index')),
	array('label'=>'Manage TblAscNotaTotal', 'url'=>array('admin')),
);
?>

<h1>Ascender a funcionario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>