<?php
/* @var $this AptitudActitudController */
/* @var $model AptitudActitud */

$this->breadcrumbs=array(
	'Aptitud Actituds'=>array('index'),
	'Create',
);

$this->menu=array(
	#array('label'=>'List AptitudActitud', 'url'=>array('index')),
	#array('label'=>'Manage AptitudActitud', 'url'=>array('admin')),
);
?>

<h1>Nueva Evaluacion Aptitud-Actitud</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>