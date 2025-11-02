<?php
// ================================================
// Día 06 - Funciones en PHP
// ================================================
//
// Una función es un bloque de código que se puede reutilizar 
// varias veces en un programa. Permite dividir el código en 
// partes más organizadas y legibles.
//
// ────────────────────────────────────────────────
// 🔹 Definición de una función
//
// Se usa la palabra clave `function`.
//
// function nombreFuncion() {
//     // código
// }
//
// Para ejecutarla (llamarla):
// nombreFuncion();
//
// ────────────────────────────────────────────────
// 🔹 Parámetros y argumentos
//
// Las funciones pueden recibir datos de entrada (parámetros):
//
// function saludar($nombre) {
//     echo "Hola $nombre";
// }
//
// saludar("Jeff");
//
// ────────────────────────────────────────────────
// 🔹 Retorno de valores
//
// Una función puede devolver un resultado con `return`.
//
// function sumar($a, $b) {
//     return $a + $b;
// }
//
// $resultado = sumar(5, 3);
// echo $resultado; // 8
//
// ────────────────────────────────────────────────
// 🔹 Alcance (scope) de variables
//
// - Variables locales: existen solo dentro de la función.
// - Variables globales: existen fuera y deben declararse con `global` 
//   para usarse dentro.
//
// ────────────────────────────────────────────────
// 🔹 Funciones predefinidas útiles
//
// strlen($texto)      → longitud de una cadena
// strtoupper($texto)  → convierte texto a mayúsculas
// strtolower($texto)  → convierte texto a minúsculas
// round($num, $dec)   → redondea un número
// rand($min, $max)    → genera un número aleatorio
//
// ────────────────────────────────────────────────
// 🧩 Tarea:
//
// 1. Crea una función llamada `saludar` que reciba un nombre 
//    y muestre un mensaje de saludo personalizado.

function saludar($nombre){ echo "Hola ". $nombre . " como estas?" . "<br>";}

saludar("Jeff");

//
// 2. Crea una función `operaciones` que reciba dos números 
//    y devuelva un array con la suma, resta, multiplicación 
//    y división de ambos.

function operaciones(int $a , int $b): array{

  return [
    "Suma" => $a+$b,
    "Resta" => $a-$b,
    "Multiplicacion" => $a*$b,
    "Division" => $b != 0 ? $a / $b : 'No divisible'
  ];

}

$resultado = operaciones(8, 2);

foreach ($resultado as $clave => $valor){
  echo "$clave: $valor"."<br>";
}


//
// 3. Crea una función `mayorEdad` que reciba una edad y 
//    devuelva true o false según si es mayor o menor de edad.

function mayorEdad($edad){ return $edad >= 18 ? true : false; }

$esMayor = mayorEdad(22); 
echo $esMayor ? "Es mayor de edad<br>" : "Es menor de edad<br>";

//
// 4. (Opcional) Usa las funciones predefinidas con un texto 
//    para mostrar su longitud, en mayúsculas y minúsculas.
//

$texto = "Texto";

echo "Longitud: " . strlen($texto) . "<br>";
echo "Minusculas: " . strtolower($texto) . "<br>";
echo "Mayusculas: " . strtoupper($texto) . "<br>";

?>
