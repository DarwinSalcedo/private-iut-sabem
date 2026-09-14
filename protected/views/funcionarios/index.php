<?php
/* @var $this FuncionariosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Funcionarioses',
);

$this->menu=array(
	array('label'=>'Manejo de Funcionarios', 'url'=>array('admin')),
	array('label'=>'Registrar Funcionario', 'url'=>array('create')),
	array('label'=>'Reportes por jerarquia', 'url'=>array('reportes')),
);
?>

<h1>Listado de Funcionarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
