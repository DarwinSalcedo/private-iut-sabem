<div class="view">

    <h2> Aptitud Actitud</h2>

<?php 

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
}else
	echo CHtml::button('Cargar Aptitud Actitud', array('submit' => array('AptitudActitud/Create')));
?>
	
</div>