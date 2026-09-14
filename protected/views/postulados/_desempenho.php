<div class="view">

    <h2> Desempeño </h2>

<?php 

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'num_responsabilidad',
		'num_productividad',
		'num_conocimiento',
		'num_capacidad_delegar',
		'num_order_planificacion',
		'num_TotDesemPorc',
		'num_TotDesemNota',	
	),
));
}else
{	echo CHtml::link("ver",array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula),array('class'=>"btn btn-primary"));  

#echo CHtml::button('Cargar Desempeño', array('submit' => array('Desempenho/Create', 'id'=>$id)));
	#echo CHtml::button('Asignar 20 puntos', array('submit' => array('#')));
}?>
	
</div>