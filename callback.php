<?php

$valorSelect=$_POST["valorSelect"];//recojemos lo seleccionado

$query=mysqli_query($conn,"SELECT * FROM producto WHERE idproducto = '" . $valorSelect . "'");

$row=mysqli_fetch_array($query);

echo""

?>