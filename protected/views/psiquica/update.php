<?php
/* @var $this PsiquicaController */
/* @var $model Psiquica */

$this->breadcrumbs=array(
	'Psiquicas'=>array('index'),
	$model->id_psiquica=>array('view','id'=>$model->id_psiquica),
	'Update',
);

$this->menu=array(
	array('label'=>'List Psiquica', 'url'=>array('index')),
	array('label'=>'Create Psiquica', 'url'=>array('create')),
	array('label'=>'View Psiquica', 'url'=>array('view', 'id'=>$model->id_psiquica)),
	array('label'=>'Manage Psiquica', 'url'=>array('admin')),
);
?>

<h1>Actualizar examen Psíquico <?php echo $model->id_psiquica; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>