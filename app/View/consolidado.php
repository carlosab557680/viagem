
<div class="container-fluid" style="background-color: #fff; margin: 30px; padding:10px; float:left; border: 1px solid #ddd; width: 90%">

<div class ="divtitle">
<?php

foreach($even as $evento){
    $fdata = explode("-", explode(" ", $evento['even_data'])['0']);
    $dtFormt = $fdata['2']."/".$fdata['1']."/".$fdata['0'];

    echo $evento['even_titulo'];
    echo $evento['even_descricao'];
    echo $dtFormt;
    echo $evento['even_local'];

}
?>

<a href="pdf.php?id=28">
				<img style="float:right;" src="app/Template/img/pdf.png" width="50px"/>
			</a>
</div>


</div>



