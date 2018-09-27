<?php  
require_once("Ingles.php");
require_once("Argentino.php");
require_once("Portugues.php");

if($_POST)
{
	$values = $_POST;

	$class = isset($values['language']) ? $values['language'] : "Argentino";

	$method = isset($values['action']) ? $values['action'] : "Greet";

	$parameter = array();

	if($method != "" && $method == 'Other')
	{
		$val = isset($values['message']) ? $values['message'] : "";
		array_push($parameter, $val);
	}

	$instanceClass = new $class;

	/*if(count($parameter) == 0)
	{
	 	call_user_func(array($instanceClass, $method));
	}
	else
	{*/
		call_user_func_array(array($instanceClass, $method), $parameter);
	//}
}
else 
	{ echo "Error al intentar procesar ! <br> Regrese y vuelva a intentarlo."; }

?>
<br><br><br>
<p align="center"><a href="index.php">BACK TO HOME</a></p>