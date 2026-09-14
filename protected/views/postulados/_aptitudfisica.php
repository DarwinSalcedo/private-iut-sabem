<div class="view">

    <h2> Aptitud Fisica </h2>

<?php 

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'des_fisica_asistencia',
		#'des_fisica_siglas_asistencia',
		'des_fisica_condicion',
		'num_fisica',
	),
));
}else
{	echo CHtml::link("ver",array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula),array('class'=>"btn btn-primary"));  
#echo CHtml::button('Cargar Aptitud Fisica', array('submit' => array('fisica/Create', 'id'=>$id)));
	#echo CHtml::button('Asignar 20 puntos', array('submit' => array('#')));
}?>
	
</div>