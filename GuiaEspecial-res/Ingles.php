<?php 
class Ingles
{
	private $messageH = 'Hello how are you !?';
	private $messageB = 'Bye see you';

	public function Greet()
	{
		echo '<h1 align="center" style="color: red">'.$this->messageH.'</h1>';
	}

	public function Dissmiss()
	{
		echo '<h1 align="center" style="color: red">'.$this->messageB.'</h1>';
	}
	public function Other($OtherMessage)
	{
		echo '<h1 align="center" style="color: red">'.$OtherMessage.'</h1>';	
	}
}

?>