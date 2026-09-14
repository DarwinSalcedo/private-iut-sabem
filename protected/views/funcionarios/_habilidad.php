<div class="view">

    <h2> Habilidad </h2>

<?php 
echo CHtml::link("Poner 20",array("funcionarios/cargarveinteh",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  

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
}else{
		$modelC=new Habilidad;
	    $this->renderPartial('_formH', array('model'=>$modelC ,'cedula'=>$cedula ,'recepcion'=>$recepcion , ));


		echo CHtml::link('Cargar Notas', '#', 
				array( 'onclick'=>'$("#mydialog6").dialog("open"); return false;','class'=>"btn btn-secondary"));
	#	echo CHtml::button('Cargar Habilidad', array('submit' => array('habilidad/Create')));

}
?>
	
</div>