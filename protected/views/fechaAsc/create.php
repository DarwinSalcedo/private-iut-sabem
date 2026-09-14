<?php
/* @var $this FechaAscController */
/* @var $model FechaAsc */

$this->breadcrumbs=array(
	'Fecha Ascs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Histórico de fechas de postulación', 'url'=>array('index')),
);
?>
			
<?php $status = $this->getUltimaFecha(); ?>
			
<?php if($status): ?>
	<?php Yii::app()->user->setFlash('notice','Ya hay abierto un proceso de postulación' ); ?>	
<?php else: ?>
	<h1>Crear nueva fecha de postulación</h1>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php endif; ?>