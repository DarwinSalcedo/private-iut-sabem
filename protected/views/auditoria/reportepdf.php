<?php 

if (is_array($model))
    {
		foreach($model as $data){		
			echo "<hr>";
					$this->widget('zii.widgets.CDetailView', array(
				'data'=>$data,
				'attributes'=>array(		
				'id',
			'description',
			'action',
			'model',
			'idModel',
			'field',
			'creationdate',
			'userid',
			)));	
		}	
	}
	else {
	echo "<hr>";
					$this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(		
			'id',
		'description',
		'action',
		'model',
		'idModel',
		'field',
		'creationdate',
		'userid',
				),
			));}


 ?>
