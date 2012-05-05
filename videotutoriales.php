<?php
require_once("core/models/Tutoriales_model.php");
require_once("core/models/Comentario_model.php");
require_once("core/vendor/Utiles.php");

$helper = new Utiles();
$tutorialObject = new Tutorial();
$comentarioObject = new Comentario();

?>
<section id="coments" class="box" style="width:760px">
	<?php 
		$cat = $helper->getNombreCategoria($_GET['cat']);

		if(!$tutorialObject->getById($_GET['id'])){
			echo '<strong>Tutorial not found</strong>';
			echo '<div><a href="'.$uri->path("ver-tutoriales/".$_GET['cat']).'"';
			echo '" class="button pequeno verde menu" style="margin-top:10px">';
			echo '<span>Volver a '.$cat.'</span>';
			echo '</a></div>';
		}else{
	?>

	<iframe width="760" height="400" src="<?php echo $helper->getUrlEmbebed($tutorialObject->video) ?>" frameborder="0" allowfullscreen>
	</iframe>
	<div>
		<a href="<?php echo 'index.php?web=ver-tutoriales&cat='.$_GET['cat'].'' ?>" class="button pequeno verde menu" style="margin-top:10px;float:right">
			<span>Volver a <?php echo $cat ?></span>
		</a>
	</div>

	<fieldset class="center">
	<form id="comentNuevo">
		<legend><strong>Dejanos tus comentarios</strong></legend>
		<div class="success" style="display:none"></div>
		<div id="comentarios">
			<label>Nombre</label>
			<div><input type="text" id="nombre" required maxlength="10" /></div>
			<label>Email</label>
			<div><input type="email" id="email" required /></div>
			<p style="margin-bottom:5px">(*No revelaremos tus datos a nadie)</p>
			<label>Comentario</label>
			<div><textarea id="comentario" required></textarea></div>
			<input type="hidden" id="tutorialComent" value="<?php echo $tutorialObject->id_tutorial ?>" />
			<div>
				<button type="submit" id="nuevoComentario" class="button pequeno verde menu" style="margin-top:10px;margin-right:0">
					<span>Enviar</span>
				</button>
			</div>
			<div id="loading" class="center"></div>
		</div>
	</form>
		<hr>
		<div id="comentariosView">
			<?php
				if($comentarios = $comentarioObject->get($_GET['id'])){
					foreach($comentarios as $coment)
					{
						echo '<div class="comentario center"><div class="message">';
						echo '<span class="label">Usuario: '.$coment['usuario'].'';
						echo ' Fecha: '.$coment['created'].'</span>';
						echo $coment['texto'];
						echo '</div></div>';
					}
				}else{
					echo '<div id="notComment">No hay ningun comentario</div>';
				}
			?>
		</div>
	</fieldset>
<?php } ?>
</section>
