<?php
// ================================================
// Día 05 - Arrays en PHP
// ================================================
//
// Un *array* es una estructura que almacena varios valores 
// dentro de una sola variable. Es como una lista.
//
// ────────────────────────────────────────────────
// 🔹 Tipos de arrays
//
// 1. Array indexado → usa índices numéricos automáticos.
//    Ejemplo: $frutas = ["Manzana", "Banana", "Naranja"];
//
// 2. Array asociativo → usa claves personalizadas (strings).
//    Ejemplo: $persona = ["nombre" => "Jeff", "edad" => 25];
//
// 3. Array multidimensional → contiene otros arrays dentro.
//    Ejemplo:
//    $clases = [
//      ["curso" => "PHP", "duracion" => "3 meses"],
//      ["curso" => "JavaScript", "duracion" => "2 meses"]
//    ];
//
// ────────────────────────────────────────────────
// 🔹 Acceso a elementos
//
// - Por índice: echo $frutas[0];
// - Por clave: echo $persona["nombre"];
//
// ────────────────────────────────────────────────
// 🔹 Recorrer arrays
//
// foreach ($array as $valor) {
//     echo $valor;
// }
//
// foreach ($array as $clave => $valor) {
//     echo "$clave: $valor";
// }
//
// ────────────────────────────────────────────────
// 🔹 Funciones útiles para arrays
//
// count($array)          → cuenta los elementos
// array_push($array, X)  → agrega un valor al final
// array_pop($array)      → elimina el último valor
// array_merge($a, $b)    → une dos arrays
// in_array(X, $array)    → verifica si un valor existe
// array_keys($array)     → devuelve las claves
// array_values($array)   → devuelve los valores
//
// ────────────────────────────────────────────────
// 🧩 Tarea:
//
// 1. Crea un array asociativo que represente un libro 
//    con claves: titulo, autor, año y disponible.

$libro = ["titulo" => "Jeff Book", "autor" => "Jeff", "anio" => 2025, "disponible" => true];

// 2. Muestra los valores del array en pantalla.

foreach ($libro as $valor){
  echo $valor. '<br>';
}

// 3. Agrega una nueva clave "paginas" al array.

// array_push($libro, ["precio" => 250]); // esto esta mal ya que array_push() sirve para arrays indexados, no para asociativos.
$libro["paginas"] = 250;


// 4. Recorre el array con foreach mostrando "clave: valor".

foreach ($libro as $clave => $valor){
  echo "$clave: $valor" . '<br>';
}

// 5. (Opcional) Crea un array multidimensional con 3 libros.

$libros = [
  ["titulo" => "Jeff Book", "autor" => "Jeff", "anio" => 2025, "disponible" => true],
  ["titulo" => "Luis Book", "autor" => "Luis", "anio" => 2022, "disponible" => true],
  ["titulo" => "Pedro Book", "autor" => "Pedro", "anio" => 2024, "disponible" => true]
];

?>
