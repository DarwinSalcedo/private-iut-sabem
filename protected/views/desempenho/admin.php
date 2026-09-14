<?php
/* @var $this DesempenhoController */
/* @var $model Desempenho */

$this->breadcrumbs=array(
	'Desempenhos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Desempenho', 'url'=>array('index')),
	array('label'=>'Create Desempenho', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#desempenho-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Desempenhos</h1>

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
	'id'=>'desempenho-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_desempe',
		'Cedula',
		'num_responsabilidad',
		'num_productividad',
		'num_conocimiento',
		'num_capacidad_delegar',
		/*
		'num_order_planificacion',
		'num_TotDesemPorc',
		'num_TotDesemNota',
		'id_evaluador',
		'id_conf_asc_fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
