<?php
require_once("core/models/Tutoriales_model.php");
require_once("core/vendor/Utiles.php");

require_once("core/DPService.php");


$service = new DPService();

$helper = new Utiles();
$tutorialObject = new Tutorial();

?>
<section id="coments" class="box center span700" style="width:760px">
	<div class="box-inner">
	<?php
		$cat = $helper->getNombreCategoria($_GET['cat']);

		if(!isset($_GET['id']) || !$tutorialObject->getById($_GET['id'])){
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
		<a href="<?php echo $uri->path("ver-tutoriales/".$_GET['cat']."") ?>" class="button pequeno verde menu" style="margin-top:10px;margin-right:10px;float:right">
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
		<hr style="border:solid 3px #002B40">
		<div id="comentariosView" class="left">
			<?php
				/*if($comentarios = $comentarioObject->get($_GET['id'])){
					foreach($comentarios as $coment)
					{
						echo '<hr><div style="padding:10px"><div style="background:#D1EED1;border:2px solid #BFE7BF;padding:5px">';
						echo '<div style="float:right;">'.$coment['created'].'</div>';
						echo '<b>'.$coment['usuario'].':</b><br />';
						echo $coment['texto'];
						echo '</div></div>';
					}
				}else{
					echo '<div id="notComment">No hay ningun comentario</div>';
				}*/
				$comentariosDTOList = $service->getAllCommentsByTutorial($_GET['id']);

				echo "<p style='padding:5px' id='countComent'>". $comentariosDTOList->size();
				echo " personas nos han dejado sus comentarios</p>";

				//$comentariosDTOList = $comentariosDTOList->toArray();

				if($comentariosDTOList != null){
					foreach ($comentariosDTOList->toArray() as $key => $comentarioDTO) {
						echo '<hr><div style="padding:10px"><div class="coment-inner">';
						echo '<div style="float:right;">'.$comentarioDTO->getTimeCreated().'</div>';
						echo '<b>'.$comentarioDTO->getUsuario().':</b><br />';
						echo $comentarioDTO->getComentario();
						echo '</div></div>';
					}
				}

			?>
		</div>
	</fieldset>
<?php } ?>
</div>
</section>
