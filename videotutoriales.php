<?php
require_once("core/models/Tutoriales_model.php");
require_once("core/vendor/Utiles.php");

$helper = new Utiles();
$tutorialObject = new Tutorial();

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
	<form action="#" method="post" accept-charset="utf-8">
		<fieldset class="center">
			<legend><strong>Dejanos tus comentarios</strong></legend>
			<!--<label>Nombre</label>
			<div><input type="text" id="nombre" /></div>
			<label>Comentario</label>
			<div><textarea id="comentario"></textarea></div>
			<div><a href="" class="button pequeno verde menu" style="margin-top:10px;margin-right:0"><span>Enviar</span></a></div>
			<hr>
			<div id="comentarios">
				<div class="comentario center">
					<div class="message">
						<span class="label">Usuario: PABLO. Fecha: 01/01/1997</span>
						Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</div>
				</div>
				<div class="comentario center">
					<div class="message">
						<span class="label">Usuario: PABLO. Fecha: 01/01/1997</span>
						Prueba de comentario
					</div>
				</div>
			</div>-->
			<p class="verde">Pronto tendremos listo el sistema de comentarios<br />Un saludo.</p>

		</fieldset>
	</form>