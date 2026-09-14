<div class="view">

    <h2> Competencia </h2>

<?php 

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'num_demuestra_eficaz',
		'num_respetado_meritos',
		'num_nunca_decisi_impul',
		'num_habla_diccion_cohe',
		'num_actualizado_bom',
		'num_TotComPorc',
		'num_TotComNota',	
	),
));
}else
{	echo CHtml::link("ver",array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula),array('class'=>"btn btn-primary"));  

	#echo CHtml::button('Cargar Competencia', array('submit' => array('Competencia/Create', 'id'=>$id)));
	#echo CHtml::button('Asignar 20 puntos', array('submit' => array('#')));
}
?>
	
</div>