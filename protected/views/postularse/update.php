<?php
/* @var $this PostularseController */
/* @var $model Postularse */

$this->breadcrumbs=array(
	'Postularses'=>array('index'),
	$model->id_postularse=>array('view','id'=>$model->id_postularse),
	'Update',
);

$this->menu=array(
	array('label'=>'List Postularse', 'url'=>array('index')),
	array('label'=>'Create Postularse', 'url'=>array('create')),
	array('label'=>'View Postularse', 'url'=>array('view', 'id'=>$model->id_postularse)),
	array('label'=>'Manage Postularse', 'url'=>array('admin')),
);
?>

<h1>Update Postularse <?php echo $model->id_postularse; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>