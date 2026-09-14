<div class="view">

    <h2> Aptitud Fisica </h2>

<?php 
echo CHtml::link("Poner Bien",array("funcionarios/cargaraf",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'des_fisica_asistencia',
		//'des_fisica_siglas_asistencia',
		'des_fisica_condicion',
		'num_fisica',
	),
));
}else{
		$modelC=new Fisica;
	    $this->renderPartial('_formF', array('model'=>$modelC ,'cedula'=>$cedula ,'recepcion'=>$recepcion , ));

echo CHtml::link('Cargar Examen', '#', 
				array( 'onclick'=>'$("#mydialog7").dialog("open"); return false;','class'=>"btn btn-secondary"));
	#echo " | ";	  	#echo CHtml::button('Cargar Aptitud Fisica', array('submit' => array('fisica/Create')));

}
?>
	
</div>