


<h1>El Sistema se encuentra <?php echo $model->valor;
$disponible = ($model->valor =="ACTIVO")?true:false;
 ?></h1>


	
<h4>Presione para bloquear o  desbloquear el sistema 

<?php echo CHtml::link($disponible?"Bloquear":"Desbloquear",array("sistema/Bloquear","id"=>$model->id),array('class'=>$disponible?"btn btn-primary":"btn btn-secundary"));  ?>	
</h4>