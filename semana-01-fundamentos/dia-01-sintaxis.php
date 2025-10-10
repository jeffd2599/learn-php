<?php

echo "Hola Mundo"; // Imprime "Hola Mundo" en la pantalla

echo "<br>"; // Salto de línea en HTML

// Declaramos una variable llamada $edad y le asignamos el valor 25

$edad = 25;

// Unimos el text estático con la variable $edad
echo "Tengo " . $edad . " años.";

echo "<br>"; // Salto de línea en HTML

// El operador punto (.) se utiliza para unir cadenas de texto con variables en PHP.

// También podemos usar comillas dobles para incluir variables directamente en la cadena
echo "Tengo $edad años.";

echo "<br>";

// Tarea 1.1: Crea tres variables con diferentes tipos de datos e imprímelas usando var_dump().


$nombre = "Carlos"; // String (cadena de texto)
$precio = 15;       // Integer (número entero)
$activo = true;     // Boolean (verdadero/falso)

echo "Nombre: ";
var_dump($nombre); // Esto mostrara: string(6) "Carlos"

echo "<br>";

echo "Precio: ";
var_dump($precio); // Esto mostrara: integer(5) 15

echo "<br>";

echo "Activo: ";
var_dump($activo); // Esto mostrara: boolean(5) true

echo "<br>";


/*
Tarea 1.2: Operaciones Básicas de Cierre (Día 1)
Usando dos variables $num1 = 10 y $num2 = 5, realiza las siguientes operaciones y usa echo para mostrar el resultado:
1. Suma (+)
2. Resta (-)
3. Multiplicación (*)
4. División (/)
*/

$num1 = 10;
$num2 = 5;

echo "Suma: " . ($num1 + $num2); // Resultado: 15
echo "<br>";

echo "Resta: " . ($num1 - $num2); // Resultado: 5
echo "<br>";

echo "Multiplicación: " . ($num1 * $num2); // Resultado: 50
echo "<br>";

echo "División: " . ($num1 / $num2); // Resultado: 2
echo "<br>";

?>