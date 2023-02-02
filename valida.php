<?php

echo $userS = $_POST['senha'];
echo $userU = $_POST['usuario'];

?>

<form action="index.php?pagina=login&metodo=login" method="post">
    <input type="text" name="usuario"/>
    <input type="text" name="senha"/>
    <input type="submit" value="ok"/>
</form>