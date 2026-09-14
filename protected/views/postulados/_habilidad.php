<div class="view">

    <h2> Habilidad </h2>

<?php 

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'num_carisma_lider',
		'num_iniciativa_crea',
		'num_manejo_conflitos',
		'num_coordinacion',
		'num_toma_decisiones',
		'num_TotHaPorc',
		'num_TotHaNota',	
	),
));
}else
{	echo CHtml::link("ver",array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula),array('class'=>"btn btn-primary"));  
#echo CHtml::button('Cargar Habilidad', array('submit' => array('habilidad/Create', 'id'=>$id)));
	#echo CHtml::button('Asignar 20 puntos', array('submit' => array('#')));
}?>
	
</div>