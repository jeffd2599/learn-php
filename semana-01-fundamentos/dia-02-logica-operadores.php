<?php
// ================================================
// Día 02 - Tipos de Datos y Operadores en PHP
// ================================================
//
// En PHP, los tipos de datos se asignan automáticamente
// según el valor que se guarde en una variable. 
// No es necesario declarar el tipo explícitamente.
//
// ────────────────────────────────────────────────
// 🔹 Tipos de datos principales:
//
// int     → números enteros (ej: 10, -5)
// float   → números decimales (ej: 3.14, -0.5)
// string  → texto entre comillas (ej: "Hola PHP")
// bool    → valores lógicos true o false
//
// PHP permite usar la función gettype() para conocer el tipo:
//   echo gettype($miVariable);
//
// ────────────────────────────────────────────────
// 🔹 Operadores aritméticos:
//
// +  suma          (5 + 2 = 7)
// -  resta         (5 - 2 = 3)
// *  multiplicación (5 * 2 = 10)
// /  división       (10 / 2 = 5)
// %  módulo         (10 % 3 = 1)
//
// ────────────────────────────────────────────────
// 🔹 Operadores de comparación:
//
// ==   igualdad de valor
// ===  igualdad de valor y tipo
// !=   diferente
// !==  no idéntico
// >    mayor que
// <    menor que
// >=   mayor o igual que
// <=   menor o igual que
//
// ────────────────────────────────────────────────
// 🔹 Operadores lógicos:
//
// &&   AND  → ambas condiciones deben ser verdaderas
// ||   OR   → al menos una condición debe ser verdadera
// !    NOT  → invierte el resultado lógico
//
// ────────────────────────────────────────────────
// 🧩 Tarea:
// 1. Declara 4 variables: entero, decimal, texto y booleano.

$var1 = 25; // entero
$var2 = 3.14; // decimal
$var3 = "Hola PHP"; // texto
$var4 = true; // booleano

// 2. Muestra el tipo de cada una con gettype().

echo gettype($var1) . "\n"; // entero
echo "<br>";
echo gettype($var2) . "\n"; // decimal
echo "<br>";
echo gettype($var3) . "\n"; // texto
echo "<br>";
echo gettype($var4) . "\n"; // booleano
echo "<br>";
// 3. Luego, crea dos números y aplica los operadores aritméticos.

echo "Suma: " .($var1 + $var2) . "\n"; // suma
echo "<br>";
echo "Resta: " .($var1 - $var2) . "\n"; // resta
echo "<br>";
echo "Multiplicación: " .($var1 * $var2) . "\n"; // multiplicación
echo "<br>";
echo "División: " .($var1 / $var2) . "\n"; // división
echo "<br>";
echo "Módulo: " . ($var1 % 2) . "<br>";


// 4. Finalmente, usa un if...else para comprobar si una persona 
//    es mayor de edad comparando $edad y $limite.

$edad = 26;
$limite = 18;

if($edad >= $limite){
    echo "Eres mayor de edad. Tienes " . $edad . " anios <br>";
}else{
    echo "Eres menor de edad. Te faltan " . ($limite - $edad) . " anios para ser mayor <br>";
}

?>
