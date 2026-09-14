<?php
/* @var $this FisicaController */
/* @var $model Fisica */

$this->breadcrumbs=array(
	'Fisicas'=>array('index'),
	$model->id_fisica=>array('view','id'=>$model->id_fisica),
	'Update',
);

$this->menu=array(
#	array('label'=>'List Fisica', 'url'=>array('index')),
	array('label'=>'Registrar Fisica', 'url'=>array('create')),
	array('label'=>'Ver Fisica', 'url'=>array('view', 'id'=>$model->id_fisica)),
#	array('label'=>'Manage Fisica', 'url'=>array('admin')),
);
?>

<h1>Actualizar Fisica <?php echo $model->id_fisica; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>