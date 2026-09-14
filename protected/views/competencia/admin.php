<?php
/* @var $this CompetenciaController */
/* @var $model Competencia */

$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Competencia', 'url'=>array('index')),
	array('label'=>'Create Competencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#competencia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Competencias</h1>

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
	'id'=>'competencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_competencia',
		'Cedula',
		'num_demuestra_eficaz',
		'num_respetado_meritos',
		'num_nunca_decisi_impul',
		'num_habla_diccion_cohe',
		/*
		'num_actualizado_bom',
		'num_TotComPorc',
		'num_TotComNota',
		'id_evaluador',
		'id_conf_asc_fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
