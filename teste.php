<?php
echo $_GET['comentario'];


?>


    <input type="text" name="comentario" id="comentario" />
    <button onclick="ajax('teste.php?comentario=<script>document.getElementById['comentario'].value</script>','quass')">Ok</button>

<div id="quass">

</div>