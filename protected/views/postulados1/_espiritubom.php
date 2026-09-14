<div class="view">

    <h2> Espíritu Bomberil </h2>

<?php 

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
	echo CHtml::button('Cargar Espiritu Bomberil', array('submit' => array('espirituBomberil/Create')));
?>
	
</div>