<?php
/* @var $this PostuladosController */
/* @var $model Postulados */

$this->breadcrumbs=array(
	'Postuladoses'=>array('index'),
	$model->id_postulados=>array('view','id'=>$model->id_postulados),
	'Update',
);

$this->menu=array(
	array('label'=>'List Postulados', 'url'=>array('index')),
	array('label'=>'Create Postulados', 'url'=>array('create')),
	array('label'=>'View Postulados', 'url'=>array('view', 'id'=>$model->id_postulados)),
	array('label'=>'Manage Postulados', 'url'=>array('admin')),
);
?>

<h1>Update Postulados <?php echo $model->id_postulados; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'cedula'=>$model->cedula_fun_recepcion)); ?>