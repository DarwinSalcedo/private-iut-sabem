<?php
/* @var $this TblAscNotaTotalController */
/* @var $model TblAscNotaTotal */

$this->breadcrumbs=array(
	'Tbl Asc Nota Totals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblAscNotaTotal', 'url'=>array('index')),
	array('label'=>'Create TblAscNotaTotal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-asc-nota-total-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Asc Nota Totals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-asc-nota-total-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_nota_total',
		'Cedula',
		'num_nota_total',
		'Cod_Jerarquia',
		'Fecha_Ingreso',
		'des_revisar',
		/*
		'id_conf_asc_fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
