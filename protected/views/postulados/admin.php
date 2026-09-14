<?php
/* @var $this PostuladosController */
/* @var $model Postulados */

$this->breadcrumbs=array(
	'Postuladoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista de Postulados', 'url'=>array('index')),
	array('label'=>'Solicitudes de Postulación', 'url'=>array('postularse/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#postulados-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Postulados</h1>

<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al inicio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'postulados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_postulados',
		'id_conf_asc_fecha',
		'Cedula',
		'fecha_postulacion',
		'hora_postulacion',
		'cedula_fun_recepcion',
		/*
		'des_datos_receptor',
		'Cod_Jerarquia',
		'id_asc_fecha',
		'id_fecha_ingreso',
		'num_modificar',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
