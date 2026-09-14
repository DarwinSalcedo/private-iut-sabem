<?php
/* @var $this PostuladosController */
/* @var $model Postulados */

$this->breadcrumbs=array(
	'Postuladoses'=>array('index'),
	$model->id_postulados=>array('view','id'=>$model->id_postulados),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Postulados', 'url'=>array('index')),
	array('label'=>'Aceptar Solicitudes', 'url'=>array('postularse/index')),
	array('label'=>'Ver Funcionario Postulado', 'url'=>array('view', 'id'=>$model->id_postulados)),
	array('label'=>'Gestionar Postulados', 'url'=>array('admin')),
);
?>

<h1>Actualizar Postulado #<?php echo $model->id_postulados; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>