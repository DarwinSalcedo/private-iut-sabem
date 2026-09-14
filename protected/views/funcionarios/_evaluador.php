<div class="view">

    <h2> Funcionario de recepción </h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$data1,
	'attributes'=>array(		
		'Cedula',
		'Nombre',
		'Apellidos',
		
		'jerarquia.Descripcion_Jerarquia',		
		'condicion.Descripcion_Condicion',
		'institucion.nombre_institucion',
		
	),
)); ?>
	


</div>