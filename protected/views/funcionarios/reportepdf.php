<?php 

if (is_array($model))
    {
		foreach($model as $data){		
			echo "<hr>";
					$this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'attributes'=>array(		
				  'Cedula' ,
      'Nombre',
      'Apellidos' ,
      #'Fecha_Ingreso' ,
	   array('name'=>'Fecha_Ingreso','value'=>$data->CambiarFecha($data->Fecha_Ingreso)), 
      'jerarquia.Descripcion_Jerarquia',
      'Equipo' ,
     # 'num_equipo_anterior',
      'condicion.Descripcion_Condicion' ,
      'institucion.nombre_institucion' ,      
     'genero.Descripcion_sexo',
				),
			));	
		}	
	}
	else {
	echo "<hr>";
					$this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(		
		  'Cedula' ,
      'Nombre',
      'Apellidos' ,
      #'Fecha_Ingreso' ,
	   array('name'=>'Fecha_Ingreso','value'=>$model->CambiarFecha($model->Fecha_Ingreso)), 
      'jerarquia.Descripcion_Jerarquia',
      'Equipo' ,
     # 'num_equipo_anterior',
      'condicion.Descripcion_Condicion' ,
      'institucion.nombre_institucion' ,      
     'genero.Descripcion_sexo',
				),
			));}


 ?>
