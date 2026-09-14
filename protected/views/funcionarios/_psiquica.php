<div class="view">

    <h2> Psiquico </h2>

<?php 
echo CHtml::link("Poner Bien",array("funcionarios/cargarPsiq",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'des_psi_asistencia',
		//'des_antid_siglas_asistencia',
		'des_psi_condicion',		
	),
));
}else{
		$modelC=new Psiquica;
	    $this->renderPartial('_formPsi', array('model'=>$modelC ,'cedula'=>$cedula ,'recepcion'=>$recepcion , ));

echo CHtml::link('Cargar Psiquica', '#', 
				array( 'onclick'=>'$("#mydialogpsq").dialog("open"); return false;','class'=>"btn btn-secondary"));
	
}
?>
	
</div>