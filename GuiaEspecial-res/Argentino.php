<?php 
class Argentino
{
	private $messageH = 'Hola como estas !?';
	private $messageB = 'Chau hasta luego !';

	public function Greet()
	{
		echo '<h1 align="center" style="color: blue">'.$this->messageH.'</h1>';
	}

	public function Dissmiss()
	{
		echo '<h1 align="center" style="color: blue">'.$this->messageB.'</h1>';
	}
	public function Other($OtherMessage)
	{
		echo '<h1 align="center" style="color: blue">'.$OtherMessage.'</h1>';	
	}
}

?>