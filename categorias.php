<?php 
require_once("core/models/Categoria_model.php");
require_once("core/vendor/Utiles.php");

$categoriaObject = new Categoria();
$categorias = $categoriaObject->get();
$helper = new Utiles();


?>
<section id="categorias" class="box">
	<p style="font-size:20px"><strong>Aqui encontraras todas los temas sobre los que tenemos tutoriales<strong></p>
	<article>
	<?php
		$count = 1;
		foreach($categorias as $row){
			if(!$helper->isPar($count) && $count != 1){
				echo '</article>';
				echo '<article>';
			}
			//echo '<div class="button azulWeb" style="color:white">';
			//echo $row['tutoriales'];
			//echo '</div>';
			echo '<a href="'.$uri->path("ver-tutoriales/".$row['nombre']."").'">';
			echo '<img src="/img/'.$row['image'].'.png" class="thumbnail nothing"/></a>';
			$count++;
		}
	?>
</section>