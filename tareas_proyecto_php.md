# Plan de Desarrollo: Aplicación Web de Aprendizaje de PHP

Este documento detalla paso a paso las tareas necesarias para construir la aplicación web de aprendizaje de PHP. Nos basaremos en los requerimientos que ya tienes definidos en `requerimientos.md` y usaremos el contenido del `Roadmap.md`. La idea es que esta sea tu guía principal, mostrándote cómo construir cada parte y cómo se conectan entre sí, sin necesidad de un conocimiento profundo de patrones de diseño complejos al principio.

Vamos a ir construyendo esto paso a paso. Cada tarea se divide en sub-tareas para que sea más manejable. No te saltes pasos y prueba tu código a medida que avanzas. ¡Es la mejor forma de aprender!

## 1. Configuración del Entorno de Desarrollo

*   **Tarea 1.1:** Instalar un servidor web local (Apache, Nginx) con soporte para PHP.
*   **Tarea 1.2:** Instalar PHP y las extensiones necesarias (como la extensión de SQLite para la base de datos).
*   **Tarea 1.3:** Instalar Composer (gestor de dependencias de PHP).
*   **Tarea 1.4:** Preparar el entorno para usar SQLite.
*   **Tarea 1.5:** Configurar el entorno de desarrollo para que el servidor web sirva los archivos del proyecto.
*   **Tarea 1.6:** Verificar que todo esté funcionando correctamente.

---

**Detalle de Tareas 1:**

*   **Tarea 1.1 - 1.3: Instalar Servidor Web, PHP y Composer:**
    *   Busca tutoriales específicos para tu sistema operativo (Windows, macOS, Linux) para instalar un "stack" de desarrollo web como XAMPP, WAMP, MAMP o LAMP. Estos paquetes ya traen Apache/Nginx, PHP y MySQL/MariaDB (aunque usaremos SQLite, el resto es útil).
    *   Asegúrate de que la versión de PHP instalada sea compatible con las funciones modernas (PHP 7.4 o superior es recomendado).
    *   Sigue los pasos para instalar Composer globalmente en tu sistema. Composer es como un "gestor de ingredientes" para tus proyectos PHP, te ayudará a descargar e incluir código de otros desarrolladores si lo necesitas (aunque en PHP vanilla no lo usaremos tanto al principio, es una buena práctica tenerlo).
*   **Tarea 1.4: Configurar la base de datos SQLite:**
    *   SQLite es una base de datos muy sencilla porque guarda toda la información en un solo archivo. No necesitas un servidor de base de datos aparte (como MySQL o PostgreSQL).
    *   La configuración principal será asegurarte de que la extensión de SQLite para PHP (`php_sqlite3` o similar) esté habilitada en tu archivo de configuración `php.ini`. Los instaladores de stacks web a menudo la habilitan por defecto. Puedes verificarlo creando un archivo PHP con `<?php phpinfo(); ?>` y buscando "sqlite3".
    *   Decide dónde vas a guardar tu archivo de base de datos (por ejemplo, dentro de la carpeta `database` de tu proyecto).
*   **Tarea 1.5: Configurar el entorno del servidor web:**
    *   Configura tu servidor web local (Apache/Nginx) para que el "document root" (la carpeta principal que sirve) apunte al directorio `public` de tu proyecto. Esto significa que cuando accedas a `localhost` en tu navegador, el servidor buscará archivos dentro de la carpeta `public`.
    *   En Apache, esto se hace generalmente modificando el archivo de configuración del Virtual Host o el archivo `httpd.conf`, cambiando la directiva `DocumentRoot` a la ruta absoluta de tu carpeta `public`.
    *   En Nginx, se modifica el archivo de configuración del servidor virtual, cambiando la directiva `root`.
    *   También deberías configurar tu servidor web para que, si se solicita un directorio, busque un archivo llamado `index.php` por defecto. Esto suele estar configurado con la directiva `DirectoryIndex index.php` en Apache o `index index.php;` en Nginx.
*   **Tarea 1.6: Verificar que todo esté funcionando:**
    *   Crea un archivo simple dentro de tu carpeta `public` llamado `test.php`.
    *   Dentro de `test.php`, pon el siguiente código:


## 2. Estructura Inicial del Proyecto
 (Enfoque Directo)

*   **Tarea 2.1:** Crea una estructura de directorios para organizar tu código.
*   **Tarea 2.2:** Crear un archivo `index.php` en el directorio `public`.
*   **Tarea 2.3:** Configura tu servidor web para usar `index.php` como el punto de entrada principal.

**Detalle de Tareas 2:**

*   **Tarea 2.1: Estructura de Directorios:**
    *   En la raíz de tu proyecto, crea las siguientes carpetas:
        *   `public`: Aquí irán los archivos a los que se accede directamente desde el navegador (`index.php`, archivos CSS, JavaScript, imágenes).
        *   `src`: Aquí irá la mayor parte de tu código PHP "interno", lógica de negocio, clases, funciones.
        *   `database`: Para el archivo de base de datos SQLite y scripts de inicialización.
    *   Tu estructura debería verse algo así:


## 3. Base de Datos

*   **Tarea 3.1:** Diseñar el esquema de la base de datos `user_progress` con las tablas necesarias (siguiendo `requerimientos.md` - `user_progress`).
*   **Tarea 3.2:** Crear un script PHP para crear la base de datos y las tablas si no existen.
*   **Tarea 3.3:** Implementar funciones o una clase para interactuar con la base de datos (ej: `src/Database.php`). Considera usar PDO para la abstracción de la base de datos, es una buena práctica aprenderlo.

## 4. Lectura y Preparación del Contenido del Roadmap

*   **Tarea 4.1:** Crear una clase o funciones en PHP para leer y parsear el archivo `Roadmap.md`.
*   **Tarea 4.2:** Implementar lógica para extraer los niveles (Principiantes, Intermedio, Avanzado) y los temas dentro de cada nivel.
*   **Tarea 4.3:** Estructurar los datos parseados en un formato que sea fácil de usar en la aplicación (ej: arrays anidados).

## 5. Visualización del Roadmap (Frontend)

*   **Tarea 5.1:** Crear la estructura HTML básica en `index.php` o en un archivo de plantilla.
*   **Tarea 5.2:** En tu archivo PHP (probablemente `index.php`), utiliza el código de la tarea 4 para obtener los datos del roadmap y mézclalos con tu código HTML para mostrarlos dinámicamente en la página.
*   **Tarea 5.3:** Implementar la presentación visual de los niveles y temas utilizando HTML, CSS y Tailwind CSS.
*   **Tarea 5.4:** Asegurar que la estructura refleje claramente las secciones y los temas como se especifica en `requerimientos.md`.

## 6. Seguimiento del Progreso del Usuario

*   **Tarea 6.1:** Modificar la base de datos `user_progress` para incluir el ID del usuario y el ID del tema.
*   **Tarea 6.2:** Implementar funciones en PHP para guardar el estado de "completado" de un tema para el usuario único.
*   **Tarea 6.3:** En tus archivos PHP que muestran el roadmap, implementa lógica para recuperar el estado de progreso del usuario desde la base de datos al cargar la página y marcar visualmente los temas completados.
*   **Tarea 6.4:** Utiliza JavaScript en el frontend para manejar la interacción del usuario al marcar un tema como completado (ej: un checkbox). Este JavaScript debe enviar una solicitud a tu archivo PHP de actualización de progreso (`public/update_progress.php`).
*   **Tarea 6.5:** En un archivo PHP separado (ej: `public/update_progress.php`), implementa la lógica para recibir una solicitud (por ejemplo, vía POST de JavaScript) con el ID del tema completado y el ID del usuario, y actualizar la base de datos `user_progress`.
*   **Tarea 6.6:** Calcula y muestra el porcentaje de temas completados en la interfaz de usuario utilizando PHP y/o JavaScript.

## 7. Gestión del Perfil del Usuario

*   **Tarea 7.1:** Modificar la base de datos para incluir la tabla `users` con los campos username, email y password_hash.
*   **Tarea 7.2:** Implementar la funcionalidad de registro de usuario único con validación de entrada.
*   **Tarea 7.3:** Implementar la funcionalidad de inicio de sesión para el usuario único.
*   **Tarea 7.4:** Crear una página o sección en la interfaz para mostrar el perfil del usuario (username y email).
*   **Tarea 7.5:** En `public/perfil.php` (o un archivo separado como `public/editar_perfil.php`), implementa la funcionalidad para editar el username y email del usuario.
*   **Tarea 7.6:** Implementar la funcionalidad para cambiar la password_hash (asegurando un manejo seguro de contraseñas, usando funciones como `password_hash` y `password_verify`).

## 8. Autenticación y Seguridad

*   **Tarea 8.1:** Implementar un sistema de sesiones en PHP para mantener al usuario autenticado.
*   **Tarea 8.2:** Proteger las rutas o funcionalidades que requieran autenticación.
*   **Tarea 8.3:** Valida todos los datos que vienen de los formularios o de la URL (por ejemplo, asegúrate de que un email tiene formato de email, que un número es realmente un número, etc.).
*   **Tarea 8.4:** **Muy Importante:** Cuando uses datos que vienen del usuario en tus consultas a la base de datos (como el username o el ID del tema), utiliza sentencias preparadas con PDO. Esto es fundamental para evitar la inyección SQL.
*   **Tarea 8.5:** Asegurar que las contraseñas se almacenen hasheadas y no en texto plano.

## 9. Organización del Código (Enfoque Inicial)

*   **Tarea 9.1:** A medida que tu código crezca, divídelo en funciones y archivos separados. Por ejemplo, puedes tener un archivo para funciones relacionadas con la base de datos, otro para manejar usuarios, etc.
*   **Tarea 9.2:** Piensa en cómo vas a manejar las diferentes "páginas" o acciones que el usuario puede realizar (ver el roadmap, editar perfil, etc.). Puedes usar parámetros en la URL (ej: `index.php?page=perfil`) y código PHP en `index.php` para decidir qué código ejecutar y qué mostrar.
*   **Tarea 9.3:** Intenta escribir código que sea fácil de leer y entender, incluso para ti mismo en el futuro. Usa nombres descriptivos para tus variables y funciones.
*   **Tarea 9.1:** Organiza tus archivos PHP en directorios lógicos (`public` para archivos accesibles desde el navegador, `src` para lógica de negocio y clases, `database` para scripts de base de datos).

## 10. Consideraciones Adicionales
*   **Tarea 10.2:** Usa variables de sesión o parámetros en la URL para mostrar mensajes simples al usuario después de una acción (ej: "Perfil actualizado con éxito").

*   **Tarea 10.1:** Manejo de errores y excepciones.
*   **Tarea 10.2:** Uso de mensajes flash para notificar al usuario sobre el resultado de las acciones.
*   **Tarea 10.3:** Considerar el uso de un sistema de plantillas básico si el proyecto crece en complejidad.

---
 
**Consejos para tu aprendizaje (como si te los diera un "senior"):**

*   **Empieza Simple:** No intentes construir todo a la vez. Comienza con la visualización estática del roadmap, luego agrega la interacción con la base de datos para el progreso, y finalmente aborda la autenticación y gestión de perfil.
*   **Divide y Vencerás:** Cada tarea aquí listada puede ser dividida en subtareas aún más pequeñas si te resulta abrumador.
*   **Prueba Tu Código a Menudo:** A medida que escribas pequeñas partes de código o implementes una tarea, pruébala inmediatamente para ver si funciona como esperas y detectar errores temprano.
*   **No tengas miedo de consultar la documentación:** PHP, SQLite, PDO, Composer, Tailwind CSS... todos tienen excelente documentación.
*   **La IA como copiloto:** Si te encuentras atascado en una tarea específica, puedes consultar a la IA para obtener ejemplos de código para esa tarea particular, pero asegúrate de entender el código que te proporciona antes de usarlo.
*   **Enfócate en la seguridad desde el principio:** Es más fácil integrar la seguridad a medida que construyes que intentar parcharla al final.
*   **Entiende el Ciclo Petición-Respuesta:** Comprende cómo el navegador envía una solicitud al servidor, cómo PHP la procesa, interactúa con la base de datos, y genera el HTML que el navegador muestra. Es fundamental.

¡Mucho éxito con el proyecto! Este enfoque de aprender haciendo es muy valioso. Si tienes preguntas específicas sobre alguna de estas tareas o necesitas una explicación más profunda de un concepto, no dudes en consultar.