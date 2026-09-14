<?php
/* @var $this PostularseController */
/* @var $model Postularse */

$this->breadcrumbs=array(
	'Postularses'=>array('index'),
	$model->id_postularse,
);
if (yii::app()->user->checkAccess('admin'))
{

}
?>

<h1><?php echo $model->nombre.' '.$model->apellido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_postularse',
		'cedula',
		'nombre',
		'apellido',
		'cargo',
	),
)); ?>
<br>

<?php if (yii::app()->user->checkAccess('admin')): ?>
	<?php if (($model->id_status == 2) || ($model->id_status == 3)): ?>
		<?php echo CHtml::button('Aceptar Postulación', array('submit' => array('Postulados/Create', 'cedula'=>$model->cedula))); ?>
	<?php endif;?>
	<?php if ($model->id_status == 3): ?>
		<?php echo CHtml::button('Rechazar Postulación', array('submit' => array('Postularse/Rechazar', 'cedula'=>$model->cedula))); ?>
	<?php endif;?>
<?php endif;?>