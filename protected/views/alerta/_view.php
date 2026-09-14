<?php
/* @var $this AlertaController */
/* @var $data Alerta */
?>
<div class="view">


	<h4><?php echo CHtml::encode($data->titulo); ?> &nbsp
	<div style="float:right">

	<?php echo CHtml::link('<i class="icon icon-remove"></i>',"#", array("submit"=>array('delete', 'id'=>$data->id), 'confirm' => 'Estas seguro de eliminarlo?'),array('htmlOptions'=> "color:white;text-decoration:none;")); ?>
	</div>
	</h4>

	<p>	<?php echo CHtml::encode($data->descripcion); ?></p>
		
</div>