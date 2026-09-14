<div class="view">

    <h2> Espíritu Bomberil </h2>

<?php 

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'num_disciplinado',
		'num_demuestra_mistica',
		'num_abnegado',
		'num_demuestra_inden',
		'num_demuestra_comp',
		'num_TotEspPorc',
		'num_TotEspNota',		
	),
));
}else
{	
				#$this->redirect(array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula));

echo CHtml::link("ver",array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula),array('class'=>"btn btn-primary"));  
#echo CHtml::button('Cargar Espiritu Bomberil', array('submit' => array('espirituBomberil/Create', 'id'=>$id)));
	#echo CHtml::button('Asignar 20 puntos', array('submit' => array('#')));
}?>
	
</div>