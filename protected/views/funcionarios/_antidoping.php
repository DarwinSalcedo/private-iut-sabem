<div class="view">

    <h2> Antidoping </h2>

<?php 
echo CHtml::link("Poner Bien",array("funcionarios/cargara",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'des_antid_asistencia',
		//'des_antid_siglas_asistencia',
		'des_antid_condicion',		
	),
));
}else{
		$modelC=new Antidoping;
	    $this->renderPartial('_formA', array('model'=>$modelC ,'cedula'=>$cedula ,'recepcion'=>$recepcion , ));

echo CHtml::link('Cargar Examen', '#', 
				array( 'onclick'=>'$("#mydialog9").dialog("open"); return false;','class'=>"btn btn-secondary"));
#	echo CHtml::button('Cargar Antidoping', array('submit' => array('Antidoping/Create')));

}
?>
	
</div>