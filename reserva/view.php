<?php
require_once("models/users.php");
class View{
	public function show($viewName, $data = null){
		$rol = User::getUserRol();
		if($rol == '1'){
			include("views/header.php");
			include("views/$viewName.php");
			include("views/footer.php");
		}else{
			include("views/header.php");
			include("views/$viewName.php");
			include("views/footer.php");	
		}
	}
}