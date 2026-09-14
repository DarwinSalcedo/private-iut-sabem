<?php
/* @var $this EspirituBomberilController */
/* @var $model EspirituBomberil */

$this->breadcrumbs=array(
	'Espiritu Bomberils'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EspirituBomberil', 'url'=>array('index')),
	array('label'=>'Create EspirituBomberil', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#espiritu-bomberil-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Espiritu Bomberils</h1>

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
	'id'=>'espiritu-bomberil-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_espiritu_bom',
		'Cedula',
		'num_disciplinado',
		'num_demuestra_mistica',
		'num_abnegado',
		'num_demuestra_inden',
		/*
		'num_demuestra_comp',
		'num_TotEspPorc',
		'num_TotEspNota',
		'id_evaluador',
		'id_conf_asc_fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
