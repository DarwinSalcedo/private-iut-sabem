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
	echo CHtml::button('Cargar Desempeño', array('submit' => array('Desempenho/Create')));
?>
	
</div>