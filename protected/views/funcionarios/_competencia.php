<div class="view">

    <h2> Competencia </h2>

<?php 
echo CHtml::link("Poner 20",array("funcionarios/cargarveintec",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  

if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'num_demuestra_eficaz',
		'num_respetado_meritos',
		'num_nunca_decisi_impul',
		'num_habla_diccion_cohe',
		'num_actualizado_bom',
		'num_TotComPorc',
		'num_TotComNota',	
	),
));
}else{
		$modelC=new Competencia;
	    $this->renderPartial('_formC', array('model'=>$modelC ,'cedula'=>$cedula ,'recepcion'=>$recepcion , ));

echo CHtml::link('Cargar Notas', '#', 
				array( 'onclick'=>'$("#mydialog3").dialog("open"); return false;','class'=>"btn btn-secondary"));
#	echo CHtml::button('Cargar Competencia', array('submit' => array('Competencia/Create')));

}
?>
	
</div>