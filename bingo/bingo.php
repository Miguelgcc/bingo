<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <title>BINGO</title>
  </head>
  <body>
  <?php

//Creamos el array mas importante del ejercicio, un array que va a ser tridimensional
//y que va a contener 4 jugadores, en cada jugador habra 3 cartones y cada carton 15 numeros
   $jugadores=array();
//esta es la funcion que se encarga de generar los jugadores y sus cartones
    function generarCartones($num,$num2){

    $cartonesJugador = array();
//generamos tablas html y metemos numeros aleatorios que no se repiten
    for ($i=0; $i < $num2; $i++) {
	echo "<table border=1 style=\"
            
          \" >
         Carton ".($i+1);
          $contTotal=0;
            echo "<tr>";
            $r=(int)rand(4,6);
              $contTotal+=$r;
              $carton = array();
              for ($j=0; $j < 7; $j++) {
                if ($j<$r) {
                  echo "<td>";
                  do {
                    $numero=(int)rand(1,60);
 //este while es para que no se repitan los numeros
                  } while (in_array($numero,$carton));
                  array_push($carton,$numero);
                  echo $numero;
                  echo "</td>";
                }else {
                  echo "<td>";
                  echo "--";
                  echo "</td>";
                }
              }
            echo "</tr>";
            echo "<tr>";
            //lo mismo pero para la fila, no hemos usado una funcion porque
            //de la manera en la que lo hemos puesto en formato de tabla se
            //tiene que hacer de forma ligeramente diferente
            $r=(int)rand(4,6);
            $contTotal+=$r;
              for ($j=0; $j < 7; $j++) {
                if ($j<$r) {
                  echo "<td>";
                  do {
                    $numero=(int)rand(1,60);
                  } while (in_array($numero,$carton));
                  array_push($carton,$numero);
                  echo $numero;
                  echo "</td>";
                }else {
                  echo "<td>";
                  echo "--";
                  echo "</td>";
                }
              }
            echo "</tr>";
            echo "<tr>";
            $r=15-$contTotal;
            //tercera fila
            for ($j=0; $j<7 ; $j++) {
              if ($j<$r) {
                echo "<td>";
                do {
                  $numero=(int)rand(1,60);
                } while (in_array($numero,$carton));
                array_push($carton,$numero);
                echo $numero;
                echo "</td>";
              }else {
                echo "<td>";
                echo "--";
                echo "</td>";
              }
            }
            echo "</tr>";
          echo "</table><br>";
          //agregamos la tercera dimension
          $cartonesJugador[$i]=$carton;
        }
        //retornamos el array que contiene el jugador y sus 3 cartones
      return $cartonesJugador;
      }
      //Funcion Contador Generamos un Array el cual contiene un contador
      //por cada carton , cada contador es de 15 y estan para todos los
      //los jugadores y los cartones el parametro pasado es el numero de cartones
  function Contador ($num2){
  $contadores = array();
      for ($j=0; $j <=$num2 ; $j++) {
  $p[$j]=15;
      }
    return $p;
  }
  //Funcion ganador su funcionalidad es determinar el ganador de la partida
  //Los parametros pasados son el array de jugadores y de contadores
      function Ganador($jugadores,$contadores){
      //con esto controlaremos que no se repitan los numeros
     $numerosQueHanSalido=array();
       $jugadorGanador="";
       $ganador=false;
         //GENERACION DE NUMEROS
         $VnbIndice=0;
         //Empieza el bucle que controlara quien gana y que numeros salen es hasta
         // que una persona gane o hayan salido los 60 numeros.
        while ($VnbIndice <= 60 && $ganador==false) {
        //  Con esto controlamos que no se repitan los numeros
         do {
           $numero=(int)rand(1,60);
         } while (in_array($numero,$numerosQueHanSalido));
         array_push($numerosQueHanSalido,$numero);
         echo "<img src=\"./img_bolas/$numero.PNG\">";
         //Aqui se comprueba los valores de los cartones con el numero que ha
         //salido anteriormente y se le resta 1 al contador
         foreach ($jugadores as $key => $value) {
           foreach ($value as $key2 => $value2) {
             foreach ($value2 as $key3 => $value3) {
               $clave=$key;
               $clave2=$key2;
              if ($value3==$numero) {
                $contadores[$clave][$clave2]--;
                if ($contadores[$clave][$clave2]==0) {

                 $jugadorGanador=($clave+1)." con el carton ".($clave2+1);
                 echo "<br>";
                 echo "<br>Ha ganado el jugador ".$jugadorGanador;
                 echo "<br>";
                 $ganador=true;
                }
              }
             }
           }
         }
         $VnbIndice++;
         
       }

  echo "<br>";
  }
echo "Bingo"."<br><br>";
echo "Jugador 1 "."<br><br>";
        //unimos los arrays para tener 3 dimensiones 
		// jugador 1
        $numeroCartones=3;
        $jugadores[0]=generarCartones(1,$numeroCartones);
        $contadores[0]=Contador($numeroCartones);
echo "Jugador 2 "."<br><br>";
        // jugador 2
        $numeroCartones=3;
        $jugadores[1]=generarCartones(2,$numeroCartones);
        $contadores[1]=Contador($numeroCartones);

  echo "Jugador 3  "."<br><br>";
      // jugador 3
        $numeroCartones=3;
        $jugadores[2]=generarCartones(3,$numeroCartones);
        $contadores[2]=Contador($numeroCartones);
    echo "Jugador 4 "."<br><br>";
      //  jugador 4
        $numeroCartones=3;
        $jugadores[3]= generarCartones(4,$numeroCartones);
        $contadores[3]=Contador($numeroCartones);

    
  echo "Numeros: "."<br><br>";
Ganador($jugadores,$contadores);
 
  ?>
  </body>
</html>;

 