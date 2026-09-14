
<div class="view">

    <h2> Psiquica </h2>


<?php 
	if ($model)
{
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				#'id_psiquica',
				#'Cedula',
				'des_psi_asistencia',
				#'des_psi_siglas_asistencia',
				'des_psi_condicion',
				#'id_conf_asc_fecha',
			),
		)); 
}else
{
	echo CHtml::link("ver",array('funcionarios/evaluacionesyExamenes','cedula'=>$cedula),array('class'=>"btn btn-primary"));  
#echo CHtml::button('Cargar Antidoping', array('submit' => array('Antidoping/Create', 'id'=>$id)));
}


		?>
</div>