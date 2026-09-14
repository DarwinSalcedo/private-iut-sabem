
 <?php if (yii::app()->user->checkAccess('admin')): 
/* @var $this FuncionariosController */
/* @var $model Funcionarios */

$this->breadcrumbs=array(
	'Funcionarioses'=>array('index'),
	$model->id_funcionario,
);

$this->menu=array(
	array('label'=>'Listar Funcionarios', 'url'=>array('index')),
	array('label'=>'Registrar Funcionario', 'url'=>array('create')),
	array('label'=>'Actualizar Funcionario', 'url'=>array('update', 'id'=>$model->id_funcionario)),
	array('label'=>'Eliminar Funcionario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_funcionario),'confirm'=>'Estas seguro que deseas eliminarlo?')),
	array('label'=>'Manejo de Funcionarios', 'url'=>array('admin')),
	array('label'=>'Reportes por jerarquia', 'url'=>array('reportes')),
	array('label'=>'Estado de Postulacion', 'url'=>array('postulacion', 'id'=>$model->id_funcionario)),
);
 endif  
?>

<h1><?php echo $model->Nombre.' '.$model->Apellidos;?> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/jerarquias/<?php echo $model->jerarquia->Cod_Jerarquia ?>_horizontal.png" alt=""></h1>

<?php

 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	#	'id_funcionario',
		'Cedula',
		'Nombre',
		'Apellidos',
		#'Fecha_Ingreso',
		 array('name'=>'Fecha_Ingreso','value'=>$model->CambiarFecha($model->Fecha_Ingreso)), 
		'jerarquia.Descripcion_Jerarquia',
		'Equipo',
		#'num_equipo_anterior',
		'condicion.Descripcion_Condicion',
		'institucion.nombre_institucion',
		'Observacion',
		'genero.Descripcion_sexo',
	),
)); 
if (yii::app()->user->checkAccess('admin')): 
 echo CHtml::link('Generar PDF',array('CargarDatosReporte','id'=>$model->id_funcionario));
endif
?>



<?php 

if (($model->Cod_Condicion != 2))
{         
            echo '<br><div class="row-fluid">';
            if ($data1)
                $this->renderPartial("_evaluador",array("data1"=>$data1,)); 
            echo '</div>';
                 
            if (($desempeno['EspirituBomberil'] !== 0) or ($desempeno['competencia'] !== 0) or ( $desempeno['desempenho']!== 0)or ($desempeno['aptitud']!== 0) or ($desempeno['habilidad']!== 0))
                    $this->renderPartial("estadistica",array("desempeno"=>$desempeno,"model"=>$model,)); 
 
 
        echo '<br><div class="row-fluid">';
        if (($data2[0]) or ($data2[1]) or ($data2[2]))
            $this->renderPartial("_examenes",array('data' => $data2)); 
        echo '</div>';
} 
 ?>
<br>
   