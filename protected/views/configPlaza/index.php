<?php
/* @var $this ConfigPlazaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Config Plazas',
);

$this->menu=array(
	array('label'=>'Configurar Nueva Plaza', 'url'=>array('create')),
	array('label'=>'Gestionar Configuraciones de Plazas', 'url'=>array('admin')),
);
?>

<h1>Configuraciones de Plazas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
