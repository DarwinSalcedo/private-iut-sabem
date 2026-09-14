


<div class="view">

    <h2> Resultados de Examenes </h2>
	<div style="height:5%">
				<div style="width:140px; float:left; position:center; padding:5px; margin:5px;">
				<p>Aptitud Fisica</p>
				<?php 
			
				$url= Yii::app()->theme->baseUrl; 
				echo  CHtml::ajaxLink($data[0]?'<img src="'.$url.'/img/icons/Button Check.png"></img>':'<img src="'.$url.'/img/icons/ButtonWhiteRemove.png"></img>', 
				$data[0]?array('Apto'):array('NoApto'),
				array('update'=> "#mostrar")
				); 
				?>
				</div>

				<div style="width:140px; float:left; padding:5px; margin:5px;">
				<p>Medico </p>
				<?php 
				echo CHtml::ajaxLink($data[1]?'<img src="'.$url.'/img/icons/Button Check.png"></img>':'<img src="'.$url.'/img/icons/ButtonWhiteRemove.png"></img>', 
				$data[1]?array('apto'):array('noApto'),
				array('update'=> "#mostrar")
				); 
				?>
				</div>

				<div style="width:140px; float:left; padding:5px; margin:5px;">
				<p>Antidoping</p>
				<?php 
				$disponible=true;
				echo CHtml::ajaxLink($data[2]?'<img src="'.$url.'/img/icons/Button Check.png"></img>':'<img src="'.$url.'/img/icons/ButtonWhiteRemove.png"></img>',
				$data[2]?array('antidoping'):array('inasistente'),
				array('update'=> "#mostrar")				
				); 
				?>
				</div>

				<div style="width:140px; float:left; padding:5px; margin:5px;">
				<p>Psiquica</p>
				<?php 
				$disponible=true;
				echo CHtml::ajaxLink($data[6]?'<img src="'.$url.'/img/icons/Button Check.png"></img>':'<img src="'.$url.'/img/icons/ButtonWhiteRemove.png"></img>',
				$data[6]?array('Apto'):array('No Apto'),
				array('update'=> "#mostrar")				
				); 
				?>
				</div>

				<div id="mostrar" style='font-size:20px'></div>

	</div>
</div>
</br>

