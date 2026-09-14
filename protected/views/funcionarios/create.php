<?php
/* @var $this FuncionariosController */
/* @var $model Funcionarios */

$this->breadcrumbs=array(
	'Funcionarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Funcionarios', 'url'=>array('index')),
	array('label'=>'Registrar Funcionario', 'url'=>array('create')),
	array('label'=>'Reportes por jerarquia', 'url'=>array('reportes')),
);
?>

<h1>Registrar Funcionario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>