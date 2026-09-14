<?php
/* @var $this FuncionariosController */
/* @var $model Funcionarios */

$this->breadcrumbs=array(
	'Funcionarioses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Funcionarios', 'url'=>array('index')),
	array('label'=>'Registrar Funcionario', 'url'=>array('create')),
	array('label'=>'Reportes por jerarquia', 'url'=>array('reportes')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#funcionarios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manejo de Funcionarios</h1>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'funcionarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_funcionario',
		'Cedula',
		'Nombre',
		'Apellidos',
		#'Fecha_Ingreso',
	/*	array(
                     'name' => 'Fecha_Ingreso',
                     'header'=>'Fecha_Ingreso',
                     #'sortable'=>false, // since it would still be sorting based on                  
                    'value'=>'$data->CambiarFecha($data->Fecha_Ingreso)', // link version
                 ), 
		
		
		'Cod_Jerarquia',
		'Equipo',
		'num_categoria',
		'Cod_Condicion',
		'cod_institucion',
		'Observacion',
		'Sexo',
		*/
		
		array(
			'class'=>'CButtonColumn',
		),
		
	),
)); ?>
