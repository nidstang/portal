<?php
require_once("core/models/Tutoriales_model.php");
require_once("core/vendor/Utiles.php");

$helper = new Utiles();

?>
<p style="font-weigh:bold"> <?php //echo $_GET['cat'] ?> </p>
<section id="tutoriales" class="box span760 center">
	<div class="box-inner">
	<p>Tutoriales de <strong><?php echo $helper->getNombreCategoria($_GET['cat']); ?></strong></p>
	<article class="video">
	<?php 

	$tutorial = new Tutorial();

	if($tutos = $tutorial->get($_GET['cat']))
	{
		$num_rows = $tutorial->num_rows();
		$count = 1;
		$style = "float:left";
		foreach($tutos as $row){
			if(!$helper->isPar($count)){
				echo '</article>';
				echo '<article class="video">';
				if($num_rows == $count){
					$style = "";
				}else{
					$style = "float:left";
				}
			}
			echo '<div class="view view-fifth" style="'.$style.'">';
			echo '<div>';

			$fecha = new DateTime($row['created']);

			echo '<div id="created" class="buttonmenu azulWeb">'
				.$fecha->format('d').' de '.$helper->getMes($fecha->format('m')). ' '. $fecha->format('Y').
			'</div>';
			echo '<img src="http://img.youtube.com/vi/'.$helper->getYoutubeID($row['video']).'/0.jpg"  class="thumbnail"/>';
			echo '</div>';
			echo '<div class="mask">';
	        echo '<h2>'.$row['titulo'].'</h2>';
	        echo '<p>'.$row['descripcion'].'</p>';
	        echo '<a href="'.$uri->path("videotuto/".$_GET['cat']."/".$row['id_tutorial']."").'" class="button mediano verde menu">';
			echo '<span>Ver tutorial</span>';
			echo '</a>';
	        echo '</div></div>';
			//echo '<span class="">'.$row['titulo'].'</span>';
			$count++;
			$style = "";
		}
	}else{
		echo 'No hay tutoriales disponibles para esta categoria';
	}

	?>
	</div>
</section>

