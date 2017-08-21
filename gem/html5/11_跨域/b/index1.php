<?php
	$name = $_GET['name'];
	$age = $_GET['age'];
	$callback = $_GET['callback'];

	//echo 'aa("'.$name.'")';
	echo $callback.'({"name":"'.$name.'","age":"'.$age.'"})'
//{name:'lisi',age:17}
?>