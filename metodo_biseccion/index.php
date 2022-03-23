<!DOCTYPE html>
<html>
<head>
	<title>Método de Bisección - PCA</title>
	<link href="./assets/dist/css/bootstrap.css" rel="stylesheet">
    <meta charset="utf-8">
    <link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="grafica.js"></script>
    <link rel="icon" href="sum.ico">
</head>

<body>
	<center>

<button class="btn btn-danger" style="width: 100%;" onclick="window.location='http://localhost/metodos_numericos/' "><b>Ir a pantalla principal</b></button>
<br><br>
		<section id="columna">
			<img src="pca.png"><br><br>
			<h1 align="center" style="font-size: 40px;">Aplicando el método de bisección</h1>
				<br>
				
				<form method="POST"> 

					<p><b>Función f(x):</b></p>
					<input type="text" name="fun" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%">
					<?php 
					error_reporting(0); 
					echo "<br>Función que ingresaste: ".$fun=$_POST['fun']; 
					?>
					<br><br>
					<p><b>Primer intervalo:</b></p>
					<input type="text" name="x1" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%;">
					<br><br>
					<p><b>Segundo intervalo:</b></p>
					<input type="text" name="x2" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%">
					<br><br>
					<p><b>Tolerancia:</b></p>
					<input type="text" name="tol" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%">
					<br><br>
					<p><b>Iteraciones:</b></p>
					<input type="text" name="ite" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%">
					<br><br>
					<input type="submit" name="calcular" value="Calcular" id="boton" class="btn btn-danger">
				</form>
				<br>

				<input id="funcion" value="<?php echo$fun; ?>" readonly style="display: none;">

				<button type="button" class="btn btn-success" onclick="VerGrafico()">Ver gráfico</button>

				<br> 

				<br>
				 <table class="table table-bordered table-striped table-hover table-condensed">
					<tr style="text-align: center;">
						<td>i</td>
						<td>a</td>
						<td>b</td>
						<td>Puntos Medios</td>
						<td>Error %</td>
					</tr>
					<tr style="text-align: center;">
						<?php
						error_reporting(0);
						$x1 = $_POST["x1"];
					    $x2 = $_POST["x2"]; 
					    $ite = $_POST["ite"];
					    $tol = $_POST["tol"];

						$error="";
						$pn = array();
						for ($n=1; $n<=$ite; $n++) { 


							$puntoMedio = ($x1 + $x2)/2; //Código fórmula hallar punto medio
								
							//Reemplazando 'x' en la función
							$fun = str_replace("x", $puntoMedio, $_POST["fun"]);
							eval("\$foo = $fun;");
							$pn[]=$puntoMedio;


							if ($n>1) {
								//Código para calcular el error porcentual
								//Er = |Xr(actual) - Xr(anterior)/Xr(actual)|*100
								$error = abs(($puntoMedio - $pn[$n-2])/$puntoMedio*100);

								if ($error < $tol) {
									echo "Este es el resultado de la última iteración: <b>".$error."</b> <br>SE CUMPLE EL CRITERIO PORQUE ES MENOR QUE LA TOLERANCIA<br><br>";
									die();
								}


							}

							

							echo "<td>".$n."</td>
							      <td>".$x1."</td>
							      <td>".$x2."</td>
							      <td>".$puntoMedio."</td>
							      <td>".$error."
							      </tr>
							      <tr style='text-align: center;'>";

						   if ($foo<0 AND $err<0) {
								$x2 = $puntoMedio;
							}
							elseif ($foo>0 AND $err>0) {
								$x2 = $puntoMedio;
							}else{
								$x1 = $puntoMedio;
						} 


						
							

							/*if ($foo<0) {
								$x1 = $puntoMedio;
							}elseif ($foo>0) {
								$x2 = $puntoMedio;
							}else{
								$x1 = $puntoMedio;
							} */
							




						} //Cierre del primer for
						
						?>
					</tr>

				</table>
		</section>
	</center>

</body>
</html>