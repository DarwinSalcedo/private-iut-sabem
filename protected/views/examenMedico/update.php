<?php
/* @var $this ExamenMedicoController */
/* @var $model ExamenMedico */

$this->breadcrumbs=array(
	'Examen Medicos'=>array('index'),
	$model->id_exa_medico=>array('view','id'=>$model->id_exa_medico),
	'Update',
);

$this->menu=array(
#	array('label'=>'List ExamenMedico', 'url'=>array('index')),
	array('label'=>'Registrar Examen Medico', 'url'=>array('create')),
	array('label'=>'Ver Examen Medico', 'url'=>array('view', 'id'=>$model->id_exa_medico)),
#	array('label'=>'Manage ExamenMedico', 'url'=>array('admin')),
);
?>

<h1>Actualizar Examen Medico <?php echo $model->id_exa_medico; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>