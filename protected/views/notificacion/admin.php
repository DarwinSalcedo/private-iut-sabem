<?php
/* @var $this NotificacionController */
/* @var $model Notificacion */

$this->breadcrumbs=array(
	'Notificacions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Notificacion', 'url'=>array('index')),
	array('label'=>'Create Notificacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#notificacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Notificacions</h1>

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
	'id'=>'notificacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cedula',
		'asunto',
		'mensaje',
		'fecha_hora',
		'email',
		/*
		'cedula_enviado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
