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
	array('label'=>'Borrar Postulado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_postulados),'confirm'=>'Are you sure you want to delete this item?')),
	);
?>

<h1>POSTULADO <?php echo $funcionario->Nombre; ?></h1>


<div>
<?php 

            echo '<br><div class="row-fluid">';
                $this->renderPartial("_espiritubom",array("model"=>$Espiritu_bomb,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula,"id"=>$model->id_postulados)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_competencia",array("model"=>$Competencia,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula,"id"=>$model->id_postulados)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_desempenho",array("model"=>$Desempenho,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula,"id"=>$model->id_postulados)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_aptitudactitud",array("model"=>$AptitudActitud,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula,"id"=>$model->id_postulados)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_habilidad",array("model"=>$Habilidad,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula,"id"=>$model->id_postulados)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_aptitudfisica",array("model"=>$Fisica,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula,"id"=>$model->id_postulados)); 
            echo '</div>';

			echo '<br><div class="row-fluid">';
                $this->renderPartial("_medico",array("model"=>$Medico,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula,"id"=>$model->id_postulados)); 
            echo '</div>';   
                     
			echo '<br><div class="row-fluid">';
                $this->renderPartial("_antidoping",array("model"=>$Antidoping,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula)); 
            echo '</div>'; 

            echo '<br><div class="row-fluid">';
                $this->renderPartial("_psiquica",array("model"=>$Psiquica,"recepcion"=>$model->cedula_fun_recepcion,"cedula"=>$model->Cedula)); 
            echo '</div>';      

?></div>