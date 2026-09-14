<div class="view">

    <h2> Medico </h2>

<?php 

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'des_asist_exa_medico',
		#'des_asist_exa_medico_siglas',
		'des_asist_exa_condicion',	
	),
));
}else
	echo CHtml::link("ver",array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula),array('class'=>"btn btn-primary"));  
#echo CHtml::button('Cargar Examen Médico', array('submit' => array('examenMedico/Create', 'id'=>$id)));
?>
	
</div>