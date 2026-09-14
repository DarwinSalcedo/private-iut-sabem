<div class="view">

    <h2> Medico </h2>

<?php 
echo CHtml::link("Poner Bien",array("funcionarios/cargarem",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'des_asist_exa_medico',
		//'des_asist_exa_medico_siglas',
		'des_asist_exa_condicion',	
	),
));
}else{
		$modelC=new ExamenMedico;
	    $this->renderPartial('_formM', array('model'=>$modelC ,'cedula'=>$cedula ,'recepcion'=>$recepcion , ));

echo CHtml::link('Cargar Examen', '#', 
				array( 'onclick'=>'$("#mydialog8").dialog("open"); return false;','class'=>"btn btn-secondary"));
		#echo CHtml::button('Cargar Examen Médico', array('submit' => array('examenMedico/Create')));

}
?>
	
</div>