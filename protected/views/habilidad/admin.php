<?php
/* @var $this HabilidadController */
/* @var $model Habilidad */

$this->breadcrumbs=array(
	'Habilidads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Habilidad', 'url'=>array('index')),
	array('label'=>'Create Habilidad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#habilidad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Habilidads</h1>

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
	'id'=>'habilidad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_habilidad',
		'Cedula',
		'num_carisma_lider',
		'num_iniciativa_crea',
		'num_manejo_conflitos',
		'num_coordinacion',
		/*
		'num_toma_decisiones',
		'num_TotHaPorc',
		'num_TotHaNota',
		'id_evaluador',
		'id_conf_asc_fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
