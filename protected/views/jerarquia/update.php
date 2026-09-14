<?php
/* @var $this JerarquiaController */
/* @var $model Jerarquia */

$this->breadcrumbs=array(
	'Jerarquias'=>array('index'),
	$model->Cod_Jerarquia=>array('view','id'=>$model->Cod_Jerarquia),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jerarquia', 'url'=>array('index')),
	array('label'=>'Create Jerarquia', 'url'=>array('create')),
	array('label'=>'View Jerarquia', 'url'=>array('view', 'id'=>$model->Cod_Jerarquia)),
	array('label'=>'Manage Jerarquia', 'url'=>array('admin')),
);
?>

<h1>Update Jerarquia <?php echo $model->Cod_Jerarquia; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>