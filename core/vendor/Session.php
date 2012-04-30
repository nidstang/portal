<?php  
class Session
{
	function __construct(){
		session_start();
	}

	public function userdata($data){
		if(is_array($data)){
			foreach($data as $key => $valor){
				$_SESSION[$key] = $valor;
			}
		}else{
			if($_SESSION){
				if(isset($_SESSION[$data])){
					return $_SESSION[$data];
				}
			}
		}
	}

	public function status_session(){
		if($_SESSION['log-in']==true){ 
			return true;
		}else{
			return false;
		}
	}

	public function logout(){
		$_SESSION = array();
		session_destroy();
	}
}

?>