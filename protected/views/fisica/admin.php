<?php
/* @var $this FisicaController */
/* @var $model Fisica */

$this->breadcrumbs=array(
	'Fisicas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Fisica', 'url'=>array('index')),
	array('label'=>'Create Fisica', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#fisica-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Fisicas</h1>

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
	'id'=>'fisica-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_fisica',
		'Cedula',
		'des_fisica_asistencia',
		'des_fisica_siglas_asistencia',
		'des_fisica_condicion',
		'num_fisica',
		/*
		'id_conf_asc_fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
