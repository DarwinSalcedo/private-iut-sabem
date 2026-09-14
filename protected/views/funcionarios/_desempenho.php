<div class="view">

    <h2> Desempeño </h2>

<?php 

echo CHtml::link("Poner 20",array("funcionarios/cargarveinted",'cedula'=>$cedula ,'recepcion'=>$recepcion),array('class'=>"btn btn-primary"));  
if ($model)
{
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'num_responsabilidad',
		'num_productividad',
		'num_conocimiento',
		'num_capacidad_delegar',
		'num_order_planificacion',
		'num_TotDesemPorc',
		'num_TotDesemNota',	
	),
));
}else{
		$modelC=new Desempenho;
	    $this->renderPartial('_formD', array('model'=>$modelC ,'cedula'=>$cedula ,'recepcion'=>$recepcion , ));

echo CHtml::link('Cargar Notas', '#',array( 'onclick'=>'$("#mydialog4").dialog("open"); return false;','class'=>"btn btn-secondary"));

}
?>
	
</div>