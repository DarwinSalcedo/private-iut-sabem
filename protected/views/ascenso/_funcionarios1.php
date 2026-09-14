<?php 
	
	$jerarquia = new Funcionarios;
	$j = 0;
	$jer=0;
	
	if (!is_null($aprobados)){
		echo "<table class='table table-striped table-bordered table-hover'>
	<th>Posición</th>
	<th>Cédula</th>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Jerarquia que ascendió</th>
	<th>Nota final</th>";	
		for ($i=0,$size=count($aprobados); $i<$size;$i++){
			$nom_ape = Funcionarios::getNombreApellidos($aprobados[$i]['funcionario']->Cedula);
			if ($i==0){
				echo "<table class='table table-striped table-bordered table-hover'>
	<th>Posición</th>
	<th>Cédula</th>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Jerarquia que ascendió</th>
	<th>Nota final</th>";
	echo "<tr>";
				echo "<td>";echo ++$j;echo "</td>";
				echo "<td>";echo $aprobados[$i]['funcionario']->Cedula;echo "</td>";
				echo "<td>";echo $nom_ape[0];echo "</td>";
				echo "<td>";echo $nom_ape[1];echo "</td>";
				echo "<td>";echo $jerarquia->getNombreJerarquia($aprobados[$i]['funcionario']->Cod_Jerarquia);
				echo "</td>";echo "<td>";echo $aprobados[$i]['nota'];echo "</td>";
			echo "</tr>"; 
			$jer = $aprobados[$i]['funcionario']->Cod_Jerarquia;

			}
			else {
				if ($jer ==$aprobados[$i]['funcionario']->Cod_Jerarquia ){
					echo "<tr>";
				echo "<td>";echo ++$j;echo "</td>";
				echo "<td>";echo $aprobados[$i]['funcionario']->Cedula;echo "</td>";
				echo "<td>";echo $nom_ape[0];echo "</td>";
				echo "<td>";echo $nom_ape[1];echo "</td>";
				echo "<td>";echo $jerarquia->getNombreJerarquia($aprobados[$i]['funcionario']->Cod_Jerarquia);
				echo "</td>";echo "<td>";echo $aprobados[$i]['nota'];echo "</td>";
			echo "</tr>";
				}
				else {
					echo "</table>";
					$j = 0;
					echo "<table class='table table-striped table-bordered table-hover'>
	<th>Posición</th>
	<th>Cédula</th>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Jerarquia que ascendió</th>
	<th>Nota final</th>";
	echo "<tr>";
				echo "<td>";echo ++$j;echo "</td>";
				echo "<td>";echo $aprobados[$i]['funcionario']->Cedula;echo "</td>";
				echo "<td>";echo $nom_ape[0];echo "</td>";
				echo "<td>";echo $nom_ape[1];echo "</td>";
				echo "<td>";echo $jerarquia->getNombreJerarquia($aprobados[$i]['funcionario']->Cod_Jerarquia);
				echo "</td>";echo "<td>";echo $aprobados[$i]['nota'];echo "</td>";
			echo "</tr>"; 
			$jer = $aprobados[$i]['funcionario']->Cod_Jerarquia;

				}
			}
			echo "</table>";

	}else echo "No hay resultados para mostrar en estos momentos.";

	


	

	//echo "probando<br>";
	//echo "Cedula: " .$aprobados[0]->Cedula."<br>";

	//echo $jerarquia->getNombreJerarquia(2) . " <br>"; //METER ESTO EN UN CICLO PARA OBTENERLO DE LA BDD CADA VEZ
	//$nom_ape = Funcionarios::getNombreApellidos(617950);

	//var_dump($nom_ape);

	//echo $nom_ape[0].' '.$nom_ape[1]."<br>";
	//echo "Nombre: " .$aprobados[0]->funcionario->Nombre."<br>";
	//echo "Jerarquia que aspira: " .$aprobados[0]->model()->jerarquia->Descripcion_Jerarquia."<br>";


	//echo "Nombre: " .$aprobados->funcionario.Nombre."<br>;*/

	//var_dump($aprobados);
	//echo $aprobados;
	//echo $reprobados;

?>

</table>