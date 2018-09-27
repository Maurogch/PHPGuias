<?php 
class Portugues
{
	private $messageH = 'Oi, como vai ?';
	private $messageB = 'Chau te vejo mais tarde !';

	public function Greet()
	{
		echo '<h1 align="center" style="color: green">'.$this->messageH.'</h1>';
	}

	public function Dissmiss()
	{
		echo '<h1 align="center" style="color: green">'.$this->messageB.'</h1>';
	}
	public function Other($OtherMessage)
	{
		echo '<h1 align="center" style="color: green">'.$OtherMessage.'</h1>';	
	}
}

?>