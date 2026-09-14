<?php
/* @var $this TblAscNotaTotalController */
/* @var $model TblAscNotaTotal */

$this->breadcrumbs=array(
	'Tbl Asc Nota Totals'=>array('index'),
	$model->id_nota_total=>array('view','id'=>$model->id_nota_total),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblAscNotaTotal', 'url'=>array('index')),
	array('label'=>'Create TblAscNotaTotal', 'url'=>array('create')),
	array('label'=>'View TblAscNotaTotal', 'url'=>array('view', 'id'=>$model->id_nota_total)),
	array('label'=>'Manage TblAscNotaTotal', 'url'=>array('admin')),
);
?>

<h1>Update TblAscNotaTotal <?php echo $model->id_nota_total; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>