<h1><?php echo $model->Nombre.' '.$model->Apellidos;?></h1>

<?php 
 echo '<br><div class="row-fluid">';       
	if($model->verificarJerarquia()){
           
            
            echo "En tu proximo ascenso optaras por el cargo de ".$model->getNombreJerarquia($model->verificarJerarquia());
           echo "<br>El cual debes tener un tiempo  minimo  de ".$model->anhosRequeridoJerarquia($model->verificarJerarquia())." años";
             
     }else{

     	echo 'De acuerdo a el reglamento , usted tiene el rango mas alto y no puede seguir optando por una jerarquia mayor';
     }                        
 echo '</div>'; 
 ?>
