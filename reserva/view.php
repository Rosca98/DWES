<?php
class View{
	public function show($viewName, $data = null){
		include("views/header.php");
		include("views/users/$viewName.php");
		include("views/footer.php");
	}
}