<?php
/* @var $this CompetenciaController */
/* @var $model Competencia */

$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	$model->id_competencia=>array('view','id'=>$model->id_competencia),
	'Update',
);

$this->menu=array(
#	array('label'=>'List Competencia', 'url'=>array('index')),
	array('label'=>'Registrar Competencia', 'url'=>array('create')),
	array('label'=>'Ver Competencia', 'url'=>array('view', 'id'=>$model->id_competencia)),
#	array('label'=>'Manage Competencia', 'url'=>array('admin')),
);
?>

<h1>Actualizar Competencia <?php echo $model->id_competencia; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>