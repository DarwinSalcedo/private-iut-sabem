<?php
/* @var $this IngresoController */
/* @var $model Ingreso */

$this->breadcrumbs=array(
	'Ingresos'=>array('index'),
	$model->id_usuario,
);

$this->menu=array(
	array('label'=>'List Ingreso', 'url'=>array('index')),
	array('label'=>'Create Ingreso', 'url'=>array('create')),
	array('label'=>'Update Ingreso', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Delete Ingreso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ingreso', 'url'=>array('admin')),
);
?>

<h1>View Ingreso #<?php echo $model->id_usuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'Cedula',
		'Equipo',
		'Login',
		'Clave',
		'Nombre',
		'Apellidos',
		'Condicion',
		'TipoUsuario',
		'cod_institucion',
		'cod_nivel_acceso',
		'des_cambio_contraseña',
	),
)); ?>
