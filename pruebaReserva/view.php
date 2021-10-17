<?php

class View
{
	public static function show($viewName, $data = null)
	{
	//	include("views/header.php");
		include("views/$viewName.php");
	//	include("views/footer.php");
	}
}
