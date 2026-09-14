<?php
/* @var $this AptitudActitudController */
/* @var $model AptitudActitud */

$this->breadcrumbs=array(
	'Aptitud Actituds'=>array('index'),
	$model->id_aptitud=>array('view','id'=>$model->id_aptitud),
	'Update',
);

$this->menu=array(
	#array('label'=>'List AptitudActitud', 'url'=>array('index')),
	array('label'=>'Registrar Aptitud-Actitud', 'url'=>array('create')),
	array('label'=>'Ver Aptitud-Actitud', 'url'=>array('view', 'id'=>$model->id_aptitud)),
	#array('label'=>'Manage AptitudActitud', 'url'=>array('admin')),
);
?>

<h1>Actualizar Aptitud-Actitud <?php echo $model->id_aptitud; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>