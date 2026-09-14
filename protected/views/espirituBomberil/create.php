<?php
/* @var $this EspirituBomberilController */
/* @var $model EspirituBomberil */

$this->breadcrumbs=array(
	'Espiritu Bomberils'=>array('index'),
	'Create',
);

$this->menu=array(
	# array('label'=>'List EspirituBomberil', 'url'=>array('index')),
	# array('label'=>'Manage EspirituBomberil', 'url'=>array('admin')),
);
?>

<h1>Nueva Evaluación Espiritu Bomberil</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>