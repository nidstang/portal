<?php 
require_once("models/Post_model.php");
require_once("models/Usuario_model.php");
require_once("models/Comentario_model.php");
require_once("vendor/Session.php");
$post = new Post();
$user = new Usuario();
$coment = new Comentario();
$sesion = new Session();
$CurrentUser = new Usuario();

$post->get_by_id($_GET['id']);
$user->get_by_id($post->id_usuario);
$CurrentUser->get_by_id($sesion->userdata('id'));
?>
<a href="core/categorias.php?category=<?php echo $_GET['category'] ?>" class="ajax"><button class="btn primary">Volver</button></a>
<div class="alert-message block-message success">
	<div class="alert-message warning" style="text-align:center;min-height:200px">
       	<h1><?php echo $post->titulo ?></h1>
       		<?php echo (!empty($user->nombre)) ? "<span class='label success'>".$user->nombre.": </span>" : "<span class='label important'>Usuario borrado</span>"; ?>

       	<article style="font-family: Trebuchet MS, Tahoma, Verdana, Arial, sans-serif;font-weight:bold">
			<?php echo $post->texto ?>
		</article>
    </div>
    <?php echo ($sesion->userdata('id') == $post->id_usuario OR $CurrentUser->rol == 1) ? "<button class='btn success' style='margin-left:5px;' data-controls-modal='modal-from-post' data-backdrop='static'>Editar</button>" : ""; ?>
</div>

<?php 
if($coments = $coment->get($_GET['id'])){
	foreach($coments as $row):
		$user->get_by_id($row['id_usuario']);
		echo "<div class='alert-message block-message success'>";
		echo (!empty($user->nombre)) ? "<span class='label success'>".$user->nombre.": </span>" : "<span class='label important'>Usuario borrado</span>";
		echo "<div>".$row['texto'] ."</div>";
		echo "</div>";
	endforeach;
}else{
	?> 
	<div class="alert-message info" style="text-align:center" id="aviso">
		Aun no hay comentarios. Se el primero en realizar uno.
	</div>
	<?php
}

?>

<button class="btn success" style="float:right" id="responder">RESPONDER</button>
<div id="comentar" style="display:none">
	<textarea name="coment" id="coment" style="width:100%;height:100px;margin-bottom:8px"></textarea>
	<button class="btn success" style="float:right;" id="enviar">ENVIAR</button>
	<span class="label notice" style="font-size:1.5em;" id="count">200</span>
	<input type="hidden" value="<?php echo $_GET['id'] ?>" id="post-coment">
</div>
<div id="modal-from-post" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
      <a href="#" class="close">×</a>
      <h2>Editar Tema</h2>
    </div>
    <div class="modal-body">
      <form id="post_edit">
        Titulo <div><input type="text" id="titulo_edit" value="<?php echo $post->titulo ?>" required></div>
        Contenido <div><textarea id="texto_post_edit"><?php echo $post->texto ?></textarea></div>
      </form>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn primary" id="edit_post" name="<?php echo $post->id_post ?>">Editar</a>
      <button class="btn close" id="close">Cerrar</button>
    </div>
</div>