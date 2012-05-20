<?php
/**
* ComentarioDAO interface
*/
interface ComentarioDAO
{
	public function getAllComentarios();

	public function getAllComentariosByTutorial($id_turoial);
}
