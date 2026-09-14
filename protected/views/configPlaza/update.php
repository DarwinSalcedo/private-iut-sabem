<?php
/* @var $this ConfigPlazaController */
/* @var $model ConfigPlaza */

$this->breadcrumbs=array(
	'Config Plazas'=>array('index'),
	$model->id_config_nota_plaza=>array('view','id'=>$model->id_config_nota_plaza),
	'Update',
);

$this->menu=array(
	array('label'=>'Configuraciones de Plazas', 'url'=>array('index')),
	array('label'=>'Configurar Nueva Plaza', 'url'=>array('create')),
	array('label'=>'Gestionar Configuraciones de Plaza', 'url'=>array('admin')),
);
?>

<h1>Update ConfigPlaza <?php echo $model->id_config_nota_plaza; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>