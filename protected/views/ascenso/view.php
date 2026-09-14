<?php

?>

<h1>Listado de los Funcionarios Ascendiendo</h1>

<?php $this->renderPartial('_funcionarios', array('aprobados'=>$aprobados,'reprobados'=>$reprobados)); ?>