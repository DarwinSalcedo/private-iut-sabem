<div class="view">

    <h2> Espíritu Bomberil </h2>

<?php 
echo CHtml::link("Poner 20",array("funcionarios/cargarveinteb",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  
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
		$modelEB=new EspirituBomberil;
	    $this->renderPartial('_formEB', array('model'=>$modelEB ,'cedula'=>$cedula ,'recepcion'=>$recepcion ,"id"=>$id ));
	   
		echo CHtml::link('Cargar Notas', '#', 
				array( 'onclick'=>'$("#mydialog2").dialog("open"); return false;','class'=>"btn btn-secondary"));
	#echo " | ";	  


#echo CHtml::link("Poner 20",array("funcionarios/cargarveinteb",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  

}
?>
	
</div>