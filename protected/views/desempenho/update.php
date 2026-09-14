<?php
/* @var $this DesempenhoController */
/* @var $model Desempenho */

$this->breadcrumbs=array(
	'Desempenhos'=>array('index'),
	$model->id_desempe=>array('view','id'=>$model->id_desempe),
	'Update',
);

$this->menu=array(
	#array('label'=>'List Desempenho', 'url'=>array('index')),
	array('label'=>'Registrar Desempeño', 'url'=>array('create')),
	array('label'=>'Ver Desempeño', 'url'=>array('view', 'id'=>$model->id_desempe)),
	#array('label'=>'Manage Desempeño', 'url'=>array('admin')),
);
?>

<h1>Actualizar Desempeño <?php echo $model->id_desempe; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>