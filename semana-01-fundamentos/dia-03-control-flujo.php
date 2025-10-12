<?php
// ================================================
// Día 03 - Control de Flujo en PHP
// ================================================
//
// El control de flujo permite que el programa tome
// decisiones según ciertas condiciones.
//
// ────────────────────────────────────────────────
// 🔹 if / else
//
// if (condición) {
//     // código si la condición es verdadera
// } else {
//     // código si la condición es falsa
// }
//
// Ejemplo:
// if ($edad >= 18) {
//     echo "Eres mayor de edad";
// } else {
//     echo "Eres menor de edad";
// }
//
// ────────────────────────────────────────────────
// 🔹 if / elseif / else
//
// Se usa cuando hay múltiples condiciones posibles.
//
// if ($nota >= 90) {
//     echo "Excelente";
// } elseif ($nota >= 70) {
//     echo "Aprobado";
// } else {
//     echo "Reprobado";
// }
//
// ────────────────────────────────────────────────
// 🔹 switch
//
// switch (variable) {
//     case valor1:
//         // código
//         break;
//     case valor2:
//         // código
//         break;
//     default:
//         // si no coincide ningún caso
// }
//
// Ejemplo:
// $dia = "lunes";
// switch ($dia) {
//     case "lunes":
//         echo "Inicio de semana";
//         break;
//     case "viernes":
//         echo "Casi fin de semana";
//         break;
//     default:
//         echo "Día normal";
// }
//
// ────────────────────────────────────────────────
// 🧩 Tarea:
//
// 1. Declara una variable $nota con un valor entre 0 y 100.

$nota = 46;

// 2. Usa if / elseif / else para mostrar:
//    - "Excelente" si la nota >= 90
//    - "Aprobado" si la nota >= 70
//    - "Reprobado" si la nota < 70

if($nota >= 90){
  echo "Excelente <br>";
}elseif($nota >= 70){
  echo "Aprobado <br>";
}else{
  echo "Reprobado <br>";
}

// 3. Usa switch para mostrar un mensaje según el día de la semana 
//    guardado en una variable $dia (ej: "lunes", "martes", etc.).

$dia = "martes";

switch($dia){
  case "lunes":
    echo "Inicio de semana <br>";
    break;
  case "viernes":
    echo "Casi fin de semana <br>";
    break;
  case "sabado":
  case "domingo":
    echo "Fin de semana <br>";
    break;
  default:
    echo "Día normal <br>";
    break;
}

?>
