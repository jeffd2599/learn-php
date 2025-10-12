<?php
// ================================================
// Día 04 - Bucles y Control en PHP
// ================================================
//
// Los bucles (loops) permiten ejecutar un bloque de código 
// varias veces de forma automática.
//
// ────────────────────────────────────────────────
// 🔹 for
//
// Se usa cuando sabemos cuántas veces queremos repetir algo.
//
// Estructura:
// for (inicialización; condición; incremento) {
//     // código a repetir
// }
//
// Ejemplo ilustrativo:
// for ($i = 0; $i < 3; $i++) {
//     echo "Iteración número $i";
// }
//
// ────────────────────────────────────────────────
// 🔹 while
//
// Se ejecuta mientras una condición sea verdadera.
//
// while (condición) {
//     // código a repetir
// }
//
// Importante: si la condición nunca cambia, el bucle será infinito.
//
// ────────────────────────────────────────────────
// 🔹 do...while
//
// Igual que while, pero se ejecuta al menos una vez.
//
// do {
//     // código
// } while (condición);
//
// ────────────────────────────────────────────────
// 🔹 foreach
//
// Se usa para recorrer arrays o listas de elementos.
//
// foreach ($array as $valor) {
//     // código
// }
//
// También puede obtener la clave y el valor:
// foreach ($array as $clave => $valor) {
//     // código
// }
//
// ────────────────────────────────────────────────
// 🧩 Tarea:
//
// 1. Usa un bucle for para imprimir los números del 1 al 10.

echo "(for) Numeros del 1 al 10: ";
for($i = 1; $i <= 10; $i++){
  echo "$i ";
}
echo "<br>";

// 2. Usa un while para contar desde 5 hasta 0 (en orden descendente).

echo "(while) Numeros del 5 al 0: ";
$j = 5;

while($j >= 0){
  echo "$j ";
  $j--;
}
echo "<br>";

// 3. Crea un array con nombres y recórrelo con foreach para mostrarlos.

echo "(foreach): ";

$array = ["Pedro", "Luis", "Mateo", "Carmen"];

foreach ($array as $elemento) {
  echo "$elemento ";
}
echo "<br>";

// 4. (Opcional) Usa do...while para mostrar un mensaje al menos una vez,
//    incluso si la condición es falsa.

$k = false;

do {
  echo "(do while)";
} while ($k);

?>
