<?php 
	if(!is_null($dataProvider))
	{	
		$j = 1;
		foreach ($dataProvider as $jerarquias)
		{
			if(!empty($jerarquias['funcionarios']))
			{
				echo "
    				<table class='table table-striped table-bordered table-hover'>
					<tr>
						<th colspan='4' class='text-center'>".$jerarquias['des_jerarquia']." 

					    </th>
						<th colspan='1' class='text-center'>
						<img src=\"".Yii::app()->request->baseUrl."/images/jerarquias/".$jerarquias['cod_jerarquia']."_horizontal.png\" width=\"50%\" height=\"50%\" alt=\"\">
						</th>
					</tr>
					    
					<tr>


					<th>Posición</th>
					<th>Cédula</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Nota final</th>
					</tr>
					";
				$i=1;
				foreach ($jerarquias['funcionarios'] as $funcionario) 
				{
					
					echo "
					    <tr>
						<td>".$i."</td>
						<td>".$funcionario->Cedula."</td>
						<td>".$funcionario->Nombre."</td>
						<td>".$funcionario->Apellidos."</td>
						<td>";echo ($funcionario->num_nota_total*20/100)."</td>
						</tr>";
					$i+=1;	
				}
			}
		}
	}else echo "<h1>No hay resultados para mostrar en estos momentos.</h1>";

?>