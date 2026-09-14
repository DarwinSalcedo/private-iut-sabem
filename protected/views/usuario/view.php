<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Usuario', 'url'=>array('index')),
	#array('label'=>'Create Usuario', 'url'=>array('create')),
	#array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->id)),
	#array('label'=>'Eliminar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Estas  seguro?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1> Usuario (<?php echo $model->username; ?>)</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'id',
		'username',
		#'password',
		'correo',
		'cedula',
	),
)); ?>

<?php if (yii::app()->user->getState('cedula') != $model->cedula)
	{?>
	<?php  $this->renderPartial("_role",array("role"=>$role,'model'=>$model));  ?> 
<?php } ?>