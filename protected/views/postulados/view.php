<?php
/* @var $this PostuladosController */
/* @var $model Postulados */

$this->breadcrumbs=array(
	'Postuladoses'=>array('index'),
	$model->id_postulados,
);

$this->menu=array(
	array('label'=>'Lista de Postulados', 'url'=>array('index')),
	array('label'=>'Actualizar Postulado', 'url'=>array('update', 'id'=>$model->id_postulados)),
	);
?>

<h1>Ver Postulado #<?php echo $model->id_postulados; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		#'id_postulados',
		'id_conf_asc_fecha',
		'Cedula',
		'fecha_postulacion',
		'hora_postulacion',
		'cedula_fun_recepcion',
		'des_datos_receptor',
		#'Cod_Jerarquia',
		#'id_asc_fecha',
		#'id_fecha_ingreso',
		#'num_modificar',
	),
)); 

            echo '<br><div class="row-fluid">';
                $this->renderPartial("_espiritubom",array("model"=>$Espiritu_bomb, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_competencia",array("model"=>$Competencia, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_desempenho",array("model"=>$Desempenho, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_aptitudactitud",array("model"=>$AptitudActitud, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_habilidad",array("model"=>$Habilidad, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_aptitudfisica",array("model"=>$Fisica, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_medico",array("model"=>$Medico, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';   
                     
			echo '<br><div class="row-fluid">';
                $this->renderPartial("_antidoping",array("model"=>$Antidoping, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';   

            echo '<br><div class="row-fluid">';
                $this->renderPartial("_psiquica",array("model"=>$Psiquica, 'id'=>$model->id_postulados, 'cedula'=>$model->Cedula)); 
            echo '</div>';          

?>