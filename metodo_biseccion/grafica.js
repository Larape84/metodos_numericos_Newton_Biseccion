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

