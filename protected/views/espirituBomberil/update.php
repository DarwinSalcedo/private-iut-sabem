<?php
/* @var $this EspirituBomberilController */
/* @var $model EspirituBomberil */

$this->breadcrumbs=array(
	'Espiritu Bomberils'=>array('index'),
	$model->id_espiritu_bom=>array('view','id'=>$model->id_espiritu_bom),
	'Update',
);

$this->menu=array(
#	array('label'=>'List EspirituBomberil', 'url'=>array('index')),
	array('label'=>'Registrar Espiritu Bomberil', 'url'=>array('create')),
	array('label'=>'Ver Espiritu Bomberil', 'url'=>array('view', 'id'=>$model->id_espiritu_bom)),
#	array('label'=>'Manage EspirituBomberil', 'url'=>array('admin')),
);
?>

<h1>Actualizar EspirituBomberil <?php echo $model->id_espiritu_bom; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>