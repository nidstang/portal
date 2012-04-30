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

$CurrentUser->get_by_id($sesion->userdata('id'));
?>
<?php
if($_GET){
    echo '<table class="bordered-table" id="tabla-posts">';
    echo '<thead>';
    echo '<tr><td>Tema</td><td>Autor</td><td>Fecha</td><td>';
    echo "<a class='ajax' href='core/categorias.php?category=".$_GET['category']."' style='display:none' id='actualizar'><button class='btn info'>Actualizar</button></a>";
    echo '<div id="loading" style="display:none;margin-left:auto;margin-right:auto;margin-top:10px"></div></td></tr>';
    echo '</thead>';
    echo '<tbody>';
    
    if($posts = $post->get($_GET['category'])){
      echo '<a class="btn large primary" data-controls-modal="modal-from-dom" data-backdrop="static" style="margin-bottom:5px">Crear Nuevo Tema</a>';
      foreach($posts as $row):
        $coment->get($row['id_post']);
        $user->get_by_id($row['id_usuario']);
        echo "<tr class='".$row['id_post']."'><td><h3><a href='core/mostrar-post.php?id=".$row['id_post']."&category=".$_GET['category']."' class='ajax'>". $row['titulo'] ."</a></h3><span class='label success'>Comentarios ".$coment->num_rows()."</span></td>";
        echo (!is_null($row['id_usuario'])) ? "<td><span class='label warning'>". $user->nombre ."</span></td>" : "<td><span class='label important'>Usuario borrado</span></td>";
        echo "<td><a>". $row['created'] ."<a></td>";
        echo "<td><a href='core/mostrar-post.php?id=".$row['id_post']."&category=".$_GET['category']."' class='ajax'><button class='btn info'>Ver</button></a>";
        echo ($CurrentUser->rol == 1) ? "<a href='method=delete_post&id=".$row['id_post']."' class='borrar'><button class='btn danger' style='margin-left:5px'>Borrar</button></a></td></tr>" : "";
      endforeach;
    }else{
      echo '<div class="alert-message warning" style="text-align:center" id="aviso">';
      echo 'No hay posts para esta categoria</div>';
      echo '<a class="btn large primary" data-controls-modal="modal-from-dom" data-backdrop="static" >Crear un nuevo Tema</a>';
    }
    echo "<input type='hidden' value='".$_GET['category']."' id='category'>";
    echo '<tbody>';
    echo '</table>';
}


?>
<footer>
    <p>&copy; Realizado por Pablo Fernández Franco</p>
</footer>
