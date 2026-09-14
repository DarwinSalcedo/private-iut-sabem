<?php
/* @var $this AscensoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fecha Ascs',
);

/*$this->menu=array(
	array('label'=>'Crear fecha de postulación', 'url'=>array('#')),
);*/
?>

<h1>Histórico de fechas de postulación</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
