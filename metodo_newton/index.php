<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="icon" href="sum.ico">
    <title>Método de Newton</title>
</head>
<body>



<button class="btn btn-danger" style="width: 100%;" onclick="window.location='http://localhost/metodos_numericos/' "><b>Ir a pantalla principal</b></button>
<center>
<section id="columna"><br>

	<img src="pca.png"><br><br>

	<h1 style="font-size: 40px;">Aplicando el método de Newton Raphson</h1>
	<br>

<form>
 <p><b>Por favor introduzca la función:</b></p>
 <input type="text" name="funcion" id="funcion" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%;"> 
 <p><b>Ingrese la derivada de la función:</b></p>
 <input type="text" name="derivada" id="derivada" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%;">
 <p><b>Intervalo que desea trabajar :</b></p>
 <input type="text" name="intervalo" id="intervalo" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%;">
 <p><b>Tolerancia de :</b></p>
 <input type="text" name="tolerancia" id="tolerancia" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%;">
 <p><b>Indique iteraciones :</b></p>
 <input type="text" name="iteraciones" id="iteraciones" required style="width: 40%; padding: 5px 5px 5px; border-radius: 5px; height: 3%;">
<br><br>
<button type="button" class="btn btn-danger" onclick="verResultado()">Calcular</button>
<button type="button" class="btn btn-success" onclick="VerGrafico()">Ver grafico</button>

</form>



</center>

</section>



<script type="text/javascript">
	function verResultado() {

    
    intervalo1=[];
    nointeracciones =[];
    l=0;
    g=1;
    resultados=[];
    errorponcentual=[];
    funcion =document.getElementById("funcion").value;
    derivada =document.getElementById("derivada").value;
    intervalo =document.getElementById("intervalo").value;
    tolerancia =document.getElementById("tolerancia").value;
    iteraciones =document.getElementById("iteraciones").value;

    //estoy limpiado la funcion del numerador
    numerador = funcion.replaceAll("^","**");
    numerador = numerador.replaceAll("senx","*"+Math.sin(intervalo));
    numerador = numerador.replaceAll("cosx","*"+Math.cos(intervalo));
    numerador = numerador.replaceAll("e","2.718");
    numerador = numerador.replaceAll("E","2.718");
    numerador = numerador.replaceAll("x","*"+intervalo);
    numerador = numerador.replaceAll("X","*"+intervalo);
    
    if (numerador.charAt(0)=="*" ) {
        numerador = numerador.replace("*","");
    }



    //estoy limpiado la funcion del denominador
    denominador = derivada.replaceAll("^","**");
    denominador = denominador.replaceAll("senx","*"+Math.sin(intervalo));
    denominador = denominador.replaceAll("cosx","*"+Math.cos(intervalo));
    denominador = denominador.replaceAll("e","2.718");
    denominador = denominador.replaceAll("E","2.718");
    denominador = denominador.replaceAll("x","*"+intervalo);
    denominador = denominador.replaceAll("X","*"+intervalo);

    if (denominador.charAt(0)=="*" ) {
        numerador = numerador.replace("*","");
    }

    //sigo limpiado la funcion del denominador y del numerador
    numerador=numerador.replace('***','**');
    denominador=denominador.replace('***','**');
    numerador=numerador.replace('+*','+');
    numerador=numerador.replace('-*','-');
    denominador=denominador.replace('+*','+');
    denominador=denominador.replace('-*','-');
    
    tolerancia1=tolerancia;
    i=intervalo;

    // con este ciclo empiezo a llenar la tabla
    p=0;
    while  (p<iteraciones) {
    
    funcion =document.getElementById("funcion").value;
    derivada =document.getElementById("derivada").value;
    if (p==0) {intervalo =document.getElementById("intervalo").value;}
    tolerancia =document.getElementById("tolerancia").value;
    iteraciones =document.getElementById("iteraciones").value;

    //estoy limpiado la funcion del numerador
    numerador = funcion.replaceAll("^","**");
    numerador = numerador.replaceAll("senx","*"+Math.sin(intervalo));
    numerador = numerador.replaceAll("cosx","*"+Math.cos(intervalo));
    numerador = numerador.replaceAll("e","2.718");
    numerador = numerador.replaceAll("E","2.718");
    numerador = numerador.replaceAll("x","*"+intervalo);
    numerador = numerador.replaceAll("X","*"+intervalo);
    
    if (numerador.charAt(0)=="*" ) {
        numerador = numerador.replace("*","");
    }

    //estoy limpiado la funcion del denominador
    denominador = derivada.replaceAll("^","**");
    denominador = denominador.replaceAll("senx","*"+Math.sin(intervalo));
    denominador = denominador.replaceAll("cosx","*"+Math.cos(intervalo));
    denominador = denominador.replaceAll("e","2.718");
    denominador = denominador.replaceAll("E","2.718");
    denominador = denominador.replaceAll("x","*"+intervalo);
    denominador = denominador.replaceAll("X","*"+intervalo);

    if (denominador.charAt(0)=="*" ) {
        numerador = numerador.replace("*","");
    }

    //sigo limpiado la funcion del denominador y del numerador
    numerador=numerador.replaceAll('***','**');
    denominador=denominador.replaceAll('***','**');
    numerador=numerador.replace('+*','+');
    numerador=numerador.replace('-*','-');
    denominador=denominador.replace('+*','+');
    denominador=denominador.replace('-*','-');
    
    if (l==0) {
    errorponcentual[l]="---";
    resultados[0]=intervalo;
    intervalo1[0]=document.getElementById("intervalo").value;
    }

    intervalo1[g] = eval((intervalo))-(eval((numerador))/eval((denominador)));
    intervalo=intervalo1[p];
    nointeracciones[l]=l;
    g=g+1;
    if (l>=1) {
    errorponcentual[l]=intervalo1[p-1]-intervalo1[p];
    }

    document.getElementById("nuevatolerancia").value=intervalo1[p];

    l++;
    p++;
    
    }    
    n=0;
    t=1;

    const $cuerpoTabla = document.querySelector("#cuerpoTabla");
    
    nointeracciones.forEach(nointeraccion => {
        
    const $tr = document.createElement("tr");
   
    let $vuelta = document.createElement("td");
    $vuelta.textContent = t; 
    $tr.appendChild($vuelta);
    t++;
    
    let $equisubi = document.createElement("td");
    if (n==0) {$equisubi.textContent =document.getElementById("intervalo").value;
    $tr.appendChild($equisubi);}else { 
    $equisubi.textContent = intervalo1[n];
    
    $tr.appendChild($equisubi);}
    let $erroresp = document.createElement("td");
    if (n==0) { $erroresp.textContent = "---";
    $tr.appendChild($erroresp);}else{
    $erroresp.textContent = intervalo1[n-1]-intervalo1[n];
    n++;
    $tr.appendChild($erroresp);}
    n++;
    $cuerpoTabla.appendChild($tr);
    
    
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




    <b hidden>El valor de la iteracion nro:  </b><br>
<input type="text" name="nuevatolerancia" id="nuevatolerancia" hidden>  

<br>
<h1 class="text-center" style="font-size: 40px;">Tabla Metodo Newton Raphson</h1>
        <br>
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

<style>
    #cuerpoTabla{
        text-align: center;
    }
</style>


</body>
</html>
