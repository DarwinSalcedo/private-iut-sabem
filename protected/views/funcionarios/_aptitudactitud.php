<div class="view">

    <h2> Aptitud Actitud</h2>

<?php 
echo CHtml::link("Poner 20",array("funcionarios/cargarveinteaa",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'num_puntualidad_asist',
		'num_presentacion_apar',
		'num_actitud_institucion',
		'num_actitud_superiores',
		'num_cooperacion',
		'num_TotApPorc',
		'num_TotAcNota',		
	),
));
}else{
		$modelC=new AptitudActitud;
	    $this->renderPartial('_formAA', array('model'=>$modelC ,'cedula'=>$cedula ,'recepcion'=>$recepcion , ));

	echo CHtml::link('Cargar Notas', '#', 
				array( 'onclick'=>'$("#mydialog5").dialog("open"); return false;','class'=>"btn btn-secondary"));
		#echo CHtml::button('Cargar Aptitud Actitud', array('submit' => array('AptitudActitud/Create')));

}
?>
	
</div>