<?php
require_once("core/models/Tutoriales_model.php");
require_once("core/models/Comentario_model.php");
require_once("core/vendor/Utiles.php");

$helper = new Utiles();
$tutorialObject = new Tutorial();
$comentarioObject = new Comentario();

$cat = $helper->getNombreCategoria($_GET['cat']);

$tutorialObject->getById($_GET['id']);

?>
<section id="coments" class="box3">
	<iframe width="760" height="400" src="<?php echo $helper->getUrlEmbebed($tutorialObject->video) ?>" frameborder="0" allowfullscreen>
	</iframe>
	<div>
		<a href="<?php echo 'index.php?web=ver-tutoriales&cat='.$_GET['cat'].'' ?>" class="button pequeno verde menu" style="margin-top:10px;float:right">
			<span>Volver a <?php echo $cat ?></span>
		</a>
	</div>

	<fieldset class="center">
		<legend><strong>Dejanos tus comentarios</strong></legend>
		<div class="success" style="display:none"></div>
		<div id="comentarios">
			<label>Nombre</label>
			<div><input type="text" id="nombre" /></div>
			<label>Comentario</label>
			<div><textarea id="comentario"></textarea></div>
			<input type="hidden" id="tutorialComent" value="<?php echo $tutorialObject->id_tutorial ?>" />
			<div>
				<button id="nuevoComentario" class="button pequeno verde menu" style="margin-top:10px;margin-right:0">
					<span>Enviar</span>
				</button>
			</div>
			<div id="loading" class="center"></div>
		</div>
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
