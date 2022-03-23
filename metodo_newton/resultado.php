<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/dist/css/bootstrap.css" rel="stylesheet">
    <title>Resultado | Método Newton</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css'>

<body>

    <center>
 
<b>Usted tiene funcion: </b><br>
<input  type="text" id="funcion" name="funcion" value="<?php echo $_POST['funcion'];
$funcion=$_POST['funcion'];?> "readonly disabled><br>

<b>Usted tiene derivada: </b><br>
<input type="text" id="derivada" name="derivada" value=" <?php echo $_POST['derivada']; 
$derivada=$_POST['derivada'];?>"readonly disabled><br>

<b>Usted tiene intervalo a trabajar: </b><br>
<input input id="intervalo" name="intervalo" type="text" name="intervalo" value="<?php echo (int)$_POST['intervalo']; 
$intervalo=$_POST['intervalo'];$interacciones=[""];$interacciones[0]=$intervalo;?>"readonly disabled><br>

<b>Usted tiene tolerancia: </b><br>
<input type="text" id="tolerancia" name="tolerancia" value="<?php echo $_POST['tolerancia'];$tolerancia=$_POST['tolerancia'];$ecuacion="";?>"readonly disabled>

<br>
<?php 
$ecuacion = str_ireplace("x", "X", $funcion);
$derivada1 = str_ireplace("x", "X", $derivada);
//echo $ecuacion;

$potencias = str_ireplace("^", "**", $ecuacion);
$potenciasderivada = str_ireplace("^", "**", $derivada1);
//echo $potencias;
?>
<br>
<p><b>Función final para la primera interaccion es: </b>
    <input input id="ecuacionfinal" type="text" name="funcionfinal" value=" 

<?php 

$unirfuncion=[""];

for ($i = 1; $i <= strlen($potencias); $i++) {

    if($potencias[0]=="."){ 
        $potencias[0]=" ";
    } elseif ($potencias[$i-1]=="."){    
        $potencias[$i-1]="*";

        }
}

     echo $potencias;


?>"readonly disabled></p>

<p><b>Derivada final es: </b>
    <input input id="derivadafinal" type="text" name="derivadafinal" value=" 

<?php 

$unirderivada=[""];

for ($i = 1; $i <= strlen($potenciasderivada); $i++) {

    if($potenciasderivada[0]=="."){ 
        $potenciasderivada[0]=" ";
    } elseif ($potenciasderivada[$i-1]=="."){    
        $potenciasderivada[$i-1]="*";

        }
}
     echo $potenciasderivada;

?>" readonly disabled></p>

<button type="button" class="btn btn-danger" onclick="valorEcuacion()">calcular</button>
<br><br>

<b>El valor de la iteracion nro:</b><br>
<input type="text" name="nuevatolerancia" id="nuevatolerancia" disabled>  

<br><br>

<script type="text/javascript">
	function valorEcuacion() {
    nointeracciones =[];
    resultados=[];
    errorponcentual=[];
    tolerancia1 =document.getElementById("tolerancia").value;
    l=0;
    
    intervalo = document.getElementById("intervalo").value;
    intervalo1=0;
    i=intervalo;
    
    
    while  (i>=tolerancia1) {

    ecuacion1 = document.getElementById("funcion").value;
    ecuacion2 = document.getElementById("derivada").value;
    
    numerador = ecuacion1.replaceAll("^","**"); 
    numerador = numerador.replaceAll("x", "*"+intervalo); 
    if (numerador.charAt(0)=="*" ) {
        numerador = numerador.replace("*","");
    }
   
    denominador = ecuacion2.replaceAll("^","**"); 
    denominador = denominador.replaceAll("x","*"+intervalo); 
    if (denominador.charAt(0)=="*" ) {
        denominador = denominador.replace("*","");
    }
    resultados[l]=intervalo;

    intervalo1 = eval((intervalo))-(eval((numerador))/eval((denominador)));
    i=(intervalo - intervalo1);
    intervalo=intervalo1;

    nointeracciones[l]=l;
    
    if (l==0) {

        errorponcentual[l]="---";
    } else {

        errorponcentual[l]=resultados[l-1]-resultados[l];
    }
    
    
    l++;
    
    }

    document.getElementById("nuevatolerancia").value=intervalo1;
    //console.log(tolerancia1);
    //console.log(i);
    
    
    n=0;

    const $cuerpoTabla = document.querySelector("#cuerpoTabla");
    
    nointeracciones.forEach(nointeraccion => {
        
    const $tr = document.createElement("tr");
   
    let $vuelta = document.createElement("td");
    $vuelta.textContent = nointeracciones[n]+1; 
    $tr.appendChild($vuelta);
    
    let $equisubi = document.createElement("td");
    $equisubi.textContent = resultados[n];
    $tr.appendChild($equisubi);
    
    let $erroresp = document.createElement("td");
    $erroresp.textContent = errorponcentual[n];
    $tr.appendChild($erroresp);
   
    $cuerpoTabla.appendChild($tr);
  
    n++;

});

    

    }
</script> 

<script type="text/javascript">
    function VerGrafico() {

        urlgrafico =document.getElementById("funcion").value;
        url1="https://es.symbolab.com/graphing-calculator?or=input&functions=%5Cfrac%7Bd%7D%7Bdx%7D(";

        nuevaurl=[];
        i=0;
        o=0;
        while (i<=(urlgrafico.length)){
            
            if (urlgrafico.charAt(i)==" "){  
            i++;
            }

            if (urlgrafico.charAt(i)=="+"){  
            nuevaurl[o]="%2B";
            o++;
            i++;
            }

            if (urlgrafico.charAt(i)!="^"){  
            nuevaurl[o]=urlgrafico.charAt(i);
            o++;
            }

            if (urlgrafico.charAt(i)=="^"){  
            nuevaurl[o]="%5E%7B"+urlgrafico.charAt(i+1)+"%7D"
            o++;
            i++;
            }
            i++;
        }
        
        window.open(url1+nuevaurl.join(''));

        //https://es.symbolab.com/graphing-calculator?or=gc&functions=%5Cfrac%7Bd%7D%7Bdx%7D(x%5E%7B3%7D%2B4x%5E%7B2%7D-10)
        //https://es.symbolab.com/graphing-calculator?or=input&functions=%5Cfrac%7Bd%7D%7Bdx%7D(x%5E%7B3%7D%2B4x%5E%7B2%7D-10

        // %5E%7B= para evelar y se coloca al final
        // %2B= para +
        // %7D= para bajar despues de elevar
        
    }   
</script>

<p><button type="button" class="btn btn-success" onclick="VerGrafico()">Ver grafico</button></p>

<h1 style="font-size: 40px;">Tabla Metodo Newton Raphson</h1>
        
        <table class="table table-bordered table-striped table-hover table-condensed">
            <thead>
                <tr style="text-align: center;">
                    <th>Iteraccion </th>
                    <th>X</th>
                    <th>Error Porcentual</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">

            </tbody>
        </table>


        
</center>

<style>
    #cuerpoTabla{
        text-align: center;
    }
</style>

</body>
</html>