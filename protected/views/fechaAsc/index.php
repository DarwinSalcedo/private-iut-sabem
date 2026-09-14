<?php
/* @var $this FechaAscController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fecha Ascs',
);

$this->menu=array(
	array('label'=>'Crear fecha de postulación', 'url'=>array('create')),
);
?>

<h1>Histórico de fechas de postulación</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
