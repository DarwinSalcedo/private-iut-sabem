<?php
/* @var $this AptitudActitudController */
/* @var $model AptitudActitud */

$this->breadcrumbs=array(
	'Aptitud Actituds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AptitudActitud', 'url'=>array('index')),
	array('label'=>'Create AptitudActitud', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#aptitud-actitud-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Aptitud Actituds</h1>

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
	'id'=>'aptitud-actitud-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_aptitud',
		'Cedula',
		'num_puntualidad_asist',
		'num_presentacion_apar',
		'num_actitud_institucion',
		'num_actitud_superiores',
		/*
		'num_cooperacion',
		'num_TotApPorc',
		'num_TotAcNota',
		'id_evaluador',
		'id_conf_asc_fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
