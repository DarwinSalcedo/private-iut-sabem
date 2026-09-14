<?php
/* @var $this HabilidadController */
/* @var $model Habilidad */

$this->breadcrumbs=array(
	'Habilidads'=>array('index'),
	$model->id_habilidad=>array('view','id'=>$model->id_habilidad),
	'Update',
);

$this->menu=array(
#	array('label'=>'List Habilidad', 'url'=>array('index')),
	array('label'=>'Registrar Habilidad', 'url'=>array('create')),
	array('label'=>'Ver Habilidad', 'url'=>array('view', 'id'=>$model->id_habilidad)),
#	array('label'=>'Manage Habilidad', 'url'=>array('admin')),
);
?>

<h1>Actualizar Habilidad <?php echo $model->id_habilidad; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>