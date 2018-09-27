<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Saludos</title>
	<style type="text/css">
		td,tr{ text-align: center; };
	</style>
</head>
<body style="align-content: center;">
	<form  action="procesar.php" method="post">
		<table border="1" align="center">
			<th><h2>Saludando</h2></th>
			<tr>
				<td width="400px">
					<p>SELECCIONE UN IDIOMA</p>
					<p>
						<input type="radio" name="language" value="Argentino" checked /> ARGENTINO 
						<input type="radio" name="language" value="Ingles"/> INGLES 
						<input type="radio" name="language" value="Portugues"/> PORTUGUES
					</p>
					<hr>
					<p>SELECCIONE UNA ACCION</p>
					<p>
					 	<input type="radio" name="action" value="Greet" checked /> Saludar
						<input type="radio" name="action" value="Dissmiss"/> Despedirse
						<input type="radio" name="action" value="Other"/> Otro <br><br>
						<textarea type="text" name="message" cols="40" rows="5" width="100" placeholder="Mensaje|Message|Mensagem"></textarea>
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
	   				<p>ACCION<br><br>
						<input type="submit" value="PROCESAR" style="border-color: orange; height: 40px;" />
					</p>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>