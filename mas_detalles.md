# Plan de Desarrollo: Aplicación Web de Aprendizaje de PHP (Guía Detallada para Juniors)

Este documento detalla paso a paso las tareas necesarias para construir la aplicación web de aprendizaje de PHP. Nos basaremos en los requerimientos que ya tienes definidos en `requerimientos.md` y usaremos el contenido del `Roadmap.md`. La idea es que esta sea tu guía principal, mostrándote cómo construir cada parte y cómo se conectan entre sí, sin necesidad de un conocimiento profundo de patrones de diseño complejos al principio.

Vamos a ir construyendo esto paso a paso. Cada tarea se divide en sub-tareas para que sea más manejable. **No te saltes pasos y prueba tu código a medida que avanzas.** ¡Es la mejor forma de aprender!

## 1. Configuración del Entorno de Desarrollo

El objetivo de esta sección es preparar tu computadora para que puedas escribir y ejecutar código PHP.

*   **Tarea 1.1:** Instalar un servidor web local (Apache o Nginx) con soporte para PHP.
    *   **Paso 1.1.1:** **Investiga qué es un "stack" de desarrollo web.**
        *   **Por qué:** Un stack (como XAMPP, WAMP, MAMP, LAMP) es un paquete que instala varias herramientas necesarias juntas (Servidor Web, PHP, Base de Datos). Facilita mucho la instalación.
        *   **Cómo:** Busca en Google:
            *   "Instalar XAMPP en [tu sistema operativo, ej: Windows 10]"
            *   "Instalar WAMP en [tu sistema operativo]"
            *   "Instalar MAMP en macOS"
            *   "Instalar LAMP en Ubuntu"
    *   **Paso 1.1.2:** **Descarga e instala el stack elegido.**
        *   **Cómo:** Ve al sitio web oficial del stack (ej: Apache Friends para XAMPP) y descarga la versión recomendada. Sigue las instrucciones del instalador.
        *   **Consejo:** Elige una versión que incluya PHP 7.4 o superior. Esto te asegura compatibilidad con características modernas de PHP.
    *   **Paso 1.1.3:** **Verifica la instalación del servidor web.**
        *   **Cómo:** Una vez instalado, inicia los servicios de Apache (o Nginx) desde el panel de control de tu stack (ej: XAMPP Control Panel).
        *   Abre tu navegador web y escribe `http://localhost`. Deberías ver una página de bienvenida de XAMPP, WAMP, o similar. Si ves esto, ¡Apache está funcionando!

*   **Tarea 1.2:** Instalar PHP y las extensiones necesarias (como la extensión de SQLite para la base de datos).
    *   **Paso 1.2.1:** **Verifica la versión de PHP.**
        *   **Por qué:** Necesitamos asegurarnos de que PHP está instalado y es una versión reciente.
        *   **Cómo (Opción 1 - Línea de Comandos):**
            1.  Abre tu terminal o símbolo del sistema.
            2.  Escribe `php -v` y presiona Enter.
            3.  Deberías ver la versión de PHP (ej: `PHP 8.1.10 ...`). Si no, PHP no está en el PATH del sistema. Los stacks suelen configurarlo, pero si no, busca "añadir PHP al PATH en [tu sistema operativo]".
        *   **Cómo (Opción 2 - `phpinfo()`):**
            1.  Crea un archivo llamado `info.php` en la carpeta `htdocs` (para XAMPP/WAMP) o `www` (para MAMP) o la raíz de tu servidor web.
            2.  Dentro de `info.php`, escribe: `<?php phpinfo(); ?>`
            3.  Guarda el archivo.
            4.  En tu navegador, ve a `http://localhost/info.php`. Verás una página detallada con toda la configuración de PHP. Busca la versión de PHP.
    *   **Paso 1.2.2:** **Habilitar la extensión de SQLite.**
        *   **Por qué:** SQLite es la base de datos que usaremos. PHP necesita una "extensión" para poder comunicarse con SQLite.
        *   **Cómo:**
            1.  Localiza tu archivo `php.ini`. Puedes encontrar su ubicación en la salida de `phpinfo()` (busca "Loaded Configuration File").
            2.  Abre `php.ini` con un editor de texto.
            3.  Busca la línea que dice `extension=sqlite3` o `extension=pdo_sqlite`.
            4.  Asegúrate de que no tenga un punto y coma (`;`) al principio. Si lo tiene, bórralo para descomentar la línea. (Ej: cambia `;extension=pdo_sqlite` a `extension=pdo_sqlite`).
            5.  Guarda el archivo `php.ini`.
            6.  **Importante:** Reinicia tu servidor Apache para que los cambios en `php.ini` tengan efecto. Puedes hacerlo desde el panel de control de XAMPP/WAMP/MAMP.
            7.  Verifica nuevamente con `phpinfo()` (refresca la página `http://localhost/info.php`). Busca la sección "pdo_sqlite" o "sqlite3". Debería estar habilitada.

*   **Tarea 1.3:** Instalar Composer (gestor de dependencias de PHP).
    *   **Paso 1.3.1:** **Entiende qué es Composer.**
        *   **Por qué:** Composer te ayuda a manejar librerías externas (código escrito por otros) en tus proyectos PHP. Aunque no lo usaremos mucho al principio con PHP "vanilla", es una herramienta estándar en el desarrollo PHP moderno.
    *   **Paso 1.3.2:** **Instala Composer.**
        *   **Cómo:**
            1.  Ve al sitio web oficial de Composer: `getcomposer.org`.
            2.  Sigue las instrucciones de descarga e instalación para tu sistema operativo. Generalmente, se recomienda la instalación global.
    *   **Paso 1.3.3:** **Verifica la instalación de Composer.**
        *   **Cómo:**
            1.  Abre una nueva terminal o símbolo del sistema (importante si acabas de instalarlo, para que reconozca el comando).
            2.  Escribe `composer --version` y presiona Enter.
            3.  Deberías ver la versión de Composer (ej: `Composer version 2.5.8 ...`).

*   **Tarea 1.4:** Preparar el entorno para usar SQLite.
    *   **Paso 1.4.1:** **Decide dónde guardarás tu archivo de base de datos.**
        *   **Por qué:** SQLite guarda toda la base de datos en un solo archivo. Necesitamos un lugar para este archivo dentro de nuestro proyecto.
        *   **Cómo:** Más adelante (Tarea 2.1), crearemos una carpeta `database` en nuestro proyecto. El archivo de la base de datos (ej: `learning_php.sqlite`) vivirá allí. Por ahora, solo tenlo en mente.
    *   **Paso 1.4.2:** **Confirma que la extensión SQLite está habilitada.**
        *   **Cómo:** Ya lo hicimos en el **Paso 1.2.2**. Si te lo saltaste, vuelve y asegúrate de que `pdo_sqlite` (preferiblemente) o `sqlite3` esté habilitado en tu `php.ini` y que Apache haya sido reiniciado.

*   **Tarea 1.5:** Configurar el entorno de desarrollo para que el servidor web sirva los archivos del proyecto.
    *   **Paso 1.5.1:** **Entiende el "Document Root".**
        *   **Por qué:** El "Document Root" es la carpeta principal desde la cual tu servidor web (Apache/Nginx) sirve los archivos. Cuando visitas `http://localhost`, el servidor busca archivos en esta carpeta. Queremos que apunte a la carpeta `public` de nuestro proyecto.
    *   **Paso 1.5.2:** **Crea la estructura básica de tu proyecto (adelanto de Tarea 2.1).**
        *   **Cómo:**
            1.  Elige una ubicación en tu computadora para tus proyectos (ej: `C:\Users\TuUsuario\Projects\` o `/home/tu_usuario/projects/`).
            2.  Dentro de esa ubicación, crea una carpeta para este proyecto, por ejemplo: `aprender_php_app`.
            3.  Dentro de `aprender_php_app`, crea una carpeta llamada `public`.
            *   Ruta de ejemplo: `C:\Users\TuUsuario\Projects\aprender_php_app\public\`
    *   **Paso 1.5.3 (Opción A - Usando la carpeta `htdocs` por defecto - más simple para empezar):**
        *   **Cómo:** Muchos stacks como XAMPP usan una carpeta `htdocs` (o `www`) como su Document Root por defecto (ej: `C:\xampp\htdocs`).
        *   Puedes crear tu proyecto *dentro* de esta carpeta: `C:\xampp\htdocs\aprender_php_app\`.
        *   En este caso, accederías a tu proyecto vía `http://localhost/aprender_php_app/public/`.
        *   **Nota:** Para este enfoque, la configuración de `DirectoryIndex` (Paso 1.5.5) sigue siendo importante.
    *   **Paso 1.5.4 (Opción B - Configurando un Virtual Host - más profesional):**
        *   **Por qué:** Un Virtual Host te permite acceder a tu proyecto con una URL más amigable (ej: `http://aprender-php.test`) y apunta directamente a la carpeta `public` de tu proyecto.
        *   **Cómo (Apache):**
            1.  Busca el archivo de configuración de Virtual Hosts de Apache. Suele estar en `conf/extra/httpd-vhosts.conf` dentro de tu instalación de Apache (ej: `C:\xampp\apache\conf\extra\httpd-vhosts.conf`).
            2.  Asegúrate de que la línea `Include conf/extra/httpd-vhosts.conf` no esté comentada en tu archivo principal `httpd.conf`.
            3.  Añade una entrada como esta al final de `httpd-vhosts.conf`, **ajustando las rutas a tu proyecto**:
                ```apache
                <VirtualHost *:80>
                    ServerName aprender-php.test
                    DocumentRoot "C:/Users/TuUsuario/Projects/aprender_php_app/public"
                    <Directory "C:/Users/TuUsuario/Projects/aprender_php_app/public">
                        Options Indexes FollowSymLinks
                        AllowOverride All
                        Require all granted
                    </Directory>
                </VirtualHost>
                ```
            4.  Edita tu archivo `hosts` del sistema operativo para mapear `aprender-php.test` a `127.0.0.1`.
                *   Windows: `C:\Windows\System32\drivers\etc\hosts`
                *   macOS/Linux: `/etc/hosts`
                *   Añade la línea: `127.0.0.1 aprender-php.test`
            5.  Reinicia Apache.
            6.  Ahora deberías poder acceder a tu proyecto en `http://aprender-php.test`.
        *   **Cómo (Nginx):**
            1.  Busca el directorio de configuración de Nginx (ej: `/etc/nginx/sites-available/` o `/usr/local/nginx/conf/conf.d/`).
            2.  Crea un nuevo archivo de configuración para tu proyecto (ej: `aprender-php.test.conf`):
                ```nginx
                server {
                    listen 80;
                    server_name aprender-php.test;
                    root /Users/TuUsuario/Projects/aprender_php_app/public; # Ajusta la ruta

                    index index.php index.html index.htm;

                    location / {
                        try_files $uri $uri/ /index.php?$query_string;
                    }

                    location ~ \.php$ {
                        include snippets/fastcgi-php.conf; # Puede variar
                        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock; # Ajusta a tu versión y configuración de PHP-FPM
                        # O para XAMPP/WAMP podría ser: fastcgi_pass 127.0.0.1:9000;
                    }
                }
                ```
            3.  Crea un enlace simbólico en `sites-enabled` si es necesario: `sudo ln -s /etc/nginx/sites-available/aprender-php.test.conf /etc/nginx/sites-enabled/`
            4.  Edita tu archivo `hosts` como se describe para Apache.
            5.  Reinicia Nginx.
    *   **Paso 1.5.5: Configurar `index.php` como archivo por defecto.**
        *   **Por qué:** Queremos que cuando alguien acceda a un directorio (como `http://localhost/aprender_php_app/public/` o `http://aprender-php.test/`), el servidor busque automáticamente un archivo `index.php`.
        *   **Cómo (Apache):**
            *   Esto suele estar configurado por defecto con la directiva `DirectoryIndex index.php index.html`. Verifica en tu `httpd.conf` o en la configuración de tu Virtual Host.
        *   **Cómo (Nginx):**
            *   La directiva `index index.php index.html;` en el bloque `server` se encarga de esto.

*   **Tarea 1.6:** Verificar que todo esté funcionando correctamente.
    *   **Paso 1.6.1:** **Crea un archivo `test.php` en tu `DocumentRoot` (la carpeta `public` de tu proyecto).**
        *   **Ruta:** `[TuProyecto]/public/test.php`
        *   (Ej: `C:\Users\TuUsuario\Projects\aprender_php_app\public\test.php` o `C:\xampp\htdocs\aprender_php_app\public\test.php`)
    *   **Paso 1.6.2:** **Escribe código PHP simple en `test.php`.**
        ```php
        <?php
        echo "¡Hola Mundo desde PHP!";
        echo "<br>";
        echo "La configuración del servidor parece funcionar.";
        // Prueba de conexión a SQLite (opcional en este punto, pero bueno para verificar la extensión)
        try {
            $pdo = new PDO('sqlite:test_db.sqlite');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<br>Conexión a SQLite exitosa (se creó un archivo test_db.sqlite si no existía).";
            // Opcional: eliminar el archivo de prueba si se creó
            // if (file_exists('test_db.sqlite')) {
            //     unlink('test_db.sqlite');
            // }
        } catch (PDOException $e) {
            echo "<br>Error al conectar con SQLite: " . $e->getMessage();
            echo "<br>Asegúrate de que la extensión pdo_sqlite esté habilitada en php.ini y Apache reiniciado.";
        }
        ?>
        ```
    *   **Paso 1.6.3:** **Accede a `test.php` desde tu navegador.**
        *   Si usaste la Opción A (htdocs): `http://localhost/aprender_php_app/public/test.php`
        *   Si usaste la Opción B (Virtual Host): `http://aprender-php.test/test.php`
    *   **Paso 1.6.4:** **Verifica el resultado.**
        *   Deberías ver el mensaje "¡Hola Mundo desde PHP! La configuración del servidor parece funcionar." y un mensaje sobre la conexión a SQLite.
        *   Si ves errores relacionados con SQLite, revisa el **Paso 1.2.2**.
        *   Si ves el código PHP tal cual, significa que PHP no está siendo procesado por el servidor. Revisa la configuración de Apache/Nginx para PHP.


## 2. Estructura Inicial del Proyecto (Enfoque Directo)

El objetivo aquí es crear una organización básica de carpetas para nuestro código.

*   **Tarea 2.1:** Crea una estructura de directorios para organizar tu código.
    *   **Paso 2.1.1:** **Navega a la raíz de tu proyecto.**
        *   **Cómo:** Abre tu explorador de archivos o usa la terminal y ve a la carpeta que creaste para el proyecto (ej: `aprender_php_app`).
    *   **Paso 2.1.2:** **Crea las carpetas principales.**
        *   **`public`**:
            *   **Propósito:** Contendrá todos los archivos que serán directamente accesibles desde el navegador. Esto incluye tu `index.php` principal, archivos CSS, JavaScript e imágenes.
            *   **Cómo:** Crea una carpeta llamada `public`. (Ya la creaste en el Paso 1.5.2, ¡verifica que exista!).
        *   **`src`**:
            *   **Propósito:** Contendrá la mayor parte de tu código PHP "interno". Esto incluye clases, funciones de lógica de negocio, helpers, etc. No será directamente accesible desde el navegador.
            *   **Cómo:** Dentro de la raíz de tu proyecto (`aprender_php_app`), crea una carpeta llamada `src`.
        *   **`database`**:
            *   **Propósito:** Aquí guardaremos nuestro archivo de base de datos SQLite y cualquier script SQL para crear o modificar la base de datos.
            *   **Cómo:** Dentro de la raíz de tu proyecto (`aprender_php_app`), crea una carpeta llamada `database`.
    *   **Paso 2.1.3:** **Verifica tu estructura.**
        *   Deberías tener algo así:
            ```
            aprender_php_app/
            ├── public/
            │   └── (aquí irá index.php, test.php, css/, js/, images/)
            ├── src/
            │   └── (aquí irá tu lógica PHP, clases, etc.)
            ├── database/
            │   └── (aquí irá tu archivo .sqlite y scripts SQL)
            └── (otros archivos como README.md, composer.json más adelante)
            ```

*   **Tarea 2.2:** Crear un archivo `index.php` en el directorio `public`.
    *   **Paso 2.2.1:** **Navega a la carpeta `public`.**
        *   **Cómo:** `aprender_php_app/public/`
    *   **Paso 2.2.2:** **Crea el archivo `index.php`.**
        *   **Cómo:** Crea un nuevo archivo de texto y nómbralo `index.php`.
    *   **Paso 2.2.3:** **Añade contenido básico a `index.php`.**
        *   **Por qué:** Este será el punto de entrada principal de tu aplicación.
        *   **Cómo:**
            ```php
            <?php
            // public/index.php
            echo "Bienvenido a la Aplicación de Aprendizaje de PHP!";
            // Más adelante, aquí incluiremos y mostraremos el roadmap.
            ?>
            ```
    *   **Paso 2.2.4:** **Verifica.**
        *   Abre tu navegador y ve a la URL raíz de tu proyecto:
            *   Si usaste la Opción A (htdocs): `http://localhost/aprender_php_app/public/`
            *   Si usaste la Opción B (Virtual Host): `http://aprender-php.test/`
        *   Deberías ver el mensaje "Bienvenido a la Aplicación de Aprendizaje de PHP!". Si no, revisa la configuración de tu servidor web (Tarea 1.5), especialmente el `DocumentRoot` y `DirectoryIndex`.

*   **Tarea 2.3:** Configura tu servidor web para usar `index.php` como el punto de entrada principal.
    *   **Paso 2.3.1:** **Revisión.**
        *   **Cómo:** Esta tarea ya fue cubierta en gran medida por el **Paso 1.5.5**.
        *   Asegúrate de que tu servidor Apache tenga `DirectoryIndex index.php` (o similar) o que tu Nginx tenga `index index.php;`.
        *   Si al acceder a `http://aprender-php.test/` (o `http://localhost/aprender_php_app/public/`) ves el contenido de `index.php`, ¡está bien configurado!


## 3. Base de Datos

Aquí definiremos cómo se guardará la información del progreso del usuario.

*   **Tarea 3.1:** Diseñar el esquema de la base de datos `user_progress` con las tablas necesarias (siguiendo `requerimientos.md` - `user_progress`).
    *   **Paso 3.1.1:** **Revisa `requerimientos.md` para `user_progress`.**
        *   **Por qué:** Los requerimientos te dirán qué información necesitamos almacenar. Inicialmente, podría ser simple, como qué temas ha completado un usuario.
    *   **Paso 3.1.2:** **Define la tabla `progress`.**
        *   **Propósito:** Esta tabla registrará qué temas ha completado un usuario.
        *   **Campos (Columnas):**
            *   `id`: Un identificador único para cada registro de progreso (INTEGER, PRIMARY KEY, AUTOINCREMENT).
            *   `user_id`: Un identificador para el usuario (INTEGER). Más adelante lo conectaremos a una tabla `users`. Por ahora, podemos asumir un único usuario o un ID fijo.
            *   `topic_id`: Un identificador para el tema del roadmap que se ha completado (TEXT o VARCHAR). Este ID debe ser único para cada tema en tu `Roadmap.md`.
            *   `completed_at`: La fecha y hora en que se completó el tema (DATETIME o TIMESTAMP, DEFAULT CURRENT_TIMESTAMP).
        *   **Ejemplo de diseño conceptual:**
            ```
            Tabla: progress
            -----------------------------------------------------------------
            | id (PK) | user_id | topic_id        | completed_at        |
            | INTEGER | INTEGER | TEXT            | DATETIME            |
            -----------------------------------------------------------------
            | 1       | 1       | 'php_basico_variables' | '2023-10-27 10:00:00' |
            | 2       | 1       | 'php_basico_condicionales' | '2023-10-27 11:00:00' |
            -----------------------------------------------------------------
            ```
        *   **Nota:** Más adelante (Tarea 6.1 y 7.1), refinaremos esto al introducir una tabla `users` y quizás una tabla `topics` si el `Roadmap.md` se vuelve muy complejo. Por ahora, `topic_id` como texto es suficiente.

*   **Tarea 3.2:** Crear un script PHP para crear la base de datos y las tablas si no existen.
    *   **Paso 3.2.1:** **Decide dónde vivirá este script.**
        *   **Sugerencia:** `database/setup.php`
    *   **Paso 3.2.2:** **Escribe el script `database/setup.php`.**
        *   **Propósito:** Este script se conectará a SQLite, creará el archivo de la base de datos si no existe, y creará la tabla `progress`.
        *   **Cómo:**
            ```php
            <?php
            // database/setup.php

            // Define la ruta al archivo de la base de datos SQLite
            // __DIR__ es una constante mágica que da el directorio del archivo actual (database/)
            // '..' sube un nivel al directorio raíz del proyecto
            $dbPath = __DIR__ . '/../database/user_progress.sqlite'; // Guardará el archivo en la carpeta 'database'

            try {
                // Crear (o abrir) la base de datos
                $pdo = new PDO('sqlite:' . $dbPath);

                // Configurar PDO para que lance excepciones en caso de error
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo "Conexión a la base de datos SQLite establecida en: " . $dbPath . "<br>";

                // SQL para crear la tabla 'progress'
                // CREATE TABLE IF NOT EXISTS: solo la crea si no existe ya
                $sql = "
                CREATE TABLE IF NOT EXISTS progress (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    user_id INTEGER NOT NULL DEFAULT 1, -- Por ahora, asumimos user_id = 1
                    topic_id TEXT NOT NULL,
                    completed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                    UNIQUE(user_id, topic_id) -- Un usuario no puede completar el mismo tema dos veces
                );";

                // Ejecutar la sentencia SQL
                $pdo->exec($sql);

                echo "Tabla 'progress' creada o ya existente.<br>";

                // Podrías añadir más tablas aquí en el futuro
                // Ejemplo: Crear tabla 'users' (se hará en Tarea 7)
                /*
                $sqlUsers = "
                CREATE TABLE IF NOT EXISTS users (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    username TEXT NOT NULL UNIQUE,
                    email TEXT NOT NULL UNIQUE,
                    password_hash TEXT NOT NULL,
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                );";
                $pdo->exec($sqlUsers);
                echo "Tabla 'users' creada o ya existente.<br>";
                */

                echo "Configuración de la base de datos completada.<br>";

            } catch (PDOException $e) {
                // Si algo sale mal, muestra el mensaje de error
                die("Error al configurar la base de datos: " . $e->getMessage());
            }
            ?>
            ```
    *   **Paso 3.2.3:** **Ejecuta el script (temporalmente desde el navegador o CLI).**
        *   **Cómo (Navegador - requiere moverlo temporalmente a `public` o configurar el servidor):**
            1.  Copia `database/setup.php` a `public/setup.php`.
            2.  Visita `http://aprender-php.test/setup.php` (o la URL equivalente).
            3.  Deberías ver mensajes de éxito.
            4.  **Importante:** Después de ejecutarlo, elimina `public/setup.php` o restríngelo para que no se pueda ejecutar públicamente de nuevo.
        *   **Cómo (CLI - recomendado):**
            1.  Abre tu terminal.
            2.  Navega al directorio raíz de tu proyecto (`aprender_php_app`).
            3.  Ejecuta: `php database/setup.php`
            4.  Deberías ver los mensajes de éxito en la consola.
    *   **Paso 3.2.4:** **Verifica la creación del archivo de base de datos.**
        *   **Cómo:** Busca en tu carpeta `aprender_php_app/database/`. Debería existir un archivo llamado `user_progress.sqlite`.
        *   **Opcional:** Puedes usar un visor de SQLite (como "DB Browser for SQLite") para abrir el archivo `user_progress.sqlite` y ver que la tabla `progress` se ha creado con las columnas correctas.

*   **Tarea 3.3:** Implementar funciones o una clase para interactuar con la base de datos (ej: `src/Database.php`). Considera usar PDO para la abstracción de la base de datos.
    *   **Paso 3.3.1:** **Crea el archivo `src/Database.php`.**
        *   **Propósito:** Centralizar la lógica de conexión a la base de datos.
    *   **Paso 3.3.2:** **Define una clase `Database` (o un conjunto de funciones).**
        *   **Cómo (Ejemplo con una clase y PDO):**
            ```php
            <?php
            // src/Database.php

            class Database
            {
                private static $pdoInstance = null;
                private static $dbPath = __DIR__ . '/../database/user_progress.sqlite'; // Ruta al archivo SQLite

                // Constructor privado para prevenir instanciación directa.
                private function __construct() {}

                // Prevenir clonación.
                private function __clone() {}

                // Método estático para obtener la instancia de PDO (Singleton pattern simple)
                public static function getInstance()
                {
                    if (self::$pdoInstance === null) {
                        try {
                            // Opciones de PDO:
                            // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION: Lanza excepciones en errores.
                            // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC: Devuelve resultados como arrays asociativos.
                            $options = [
                                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_EMULATE_PREPARES   => false, // Usar preparaciones nativas
                            ];

                            self::$pdoInstance = new PDO('sqlite:' . self::$dbPath, null, null, $options);
                            // echo "Nueva conexión PDO creada.<br>"; // Para depuración
                        } catch (PDOException $e) {
                            // En una aplicación real, loguearías este error y mostrarías un mensaje amigable.
                            die("Error de conexión a la base de datos: " . $e->getMessage());
                        }
                    }
                    return self::$pdoInstance;
                }

                // Método de conveniencia para ejecutar consultas (SELECT)
                public static function query(string $sql, array $params = [])
                {
                    $stmt = self::getInstance()->prepare($sql);
                    $stmt->execute($params);
                    return $stmt;
                }

                // Método de conveniencia para ejecutar sentencias (INSERT, UPDATE, DELETE)
                // Devuelve el número de filas afectadas o el último ID insertado si es aplicable.
                public static function exec(string $sql, array $params = [])
                {
                    $stmt = self::getInstance()->prepare($sql);
                    $stmt->execute($params);
                    return $stmt->rowCount(); // O podrías devolver $this->pdoInstance->lastInsertId() para INSERTs
                }
            }
            ?>
            ```
    *   **Paso 3.3.3:** **Cómo usar esta clase `Database` (ejemplo conceptual).**
        *   En otros archivos PHP donde necesites acceder a la BD (ej: `public/index.php` o más adelante en `src/ProgressManager.php`):
            ```php
            <?php
            // require_once __DIR__ . '/../src/Database.php'; // Ajusta la ruta según sea necesario

            // Para obtener la instancia de PDO:
            // $pdo = Database::getInstance();

            // Para ejecutar una consulta SELECT:
            // $stmt = Database::query("SELECT * FROM progress WHERE user_id = ?", [1]);
            // $progressItems = $stmt->fetchAll();
            // print_r($progressItems);

            // Para ejecutar un INSERT:
            // $rowCount = Database::exec("INSERT INTO progress (user_id, topic_id) VALUES (?, ?)", [1, 'nuevo_tema']);
            // echo "Filas insertadas: " . $rowCount;
            ?>
            ```
        *   **Nota:** Por ahora solo hemos creado la clase. La usaremos activamente en las tareas siguientes.


## 4. Lectura y Preparación del Contenido del Roadmap

El objetivo es leer el archivo `Roadmap.md` y convertir su contenido en una estructura de datos que PHP pueda usar fácilmente.

*   **Tarea 4.1:** Crear una clase o funciones en PHP para leer y parsear el archivo `Roadmap.md`.
    *   **Paso 4.1.1:** **Decide dónde colocar esta lógica.**
        *   **Sugerencia:** Crea un archivo `src/RoadmapParser.php`.
    *   **Paso 4.1.2:** **Crea la clase `RoadmapParser`.**
        *   **Cómo:**
            ```php
            <?php
            // src/RoadmapParser.php

            class RoadmapParser
            {
                private $filePath;

                public function __construct(string $filePath)
                {
                    if (!file_exists($filePath) || !is_readable($filePath)) {
                        throw new Exception("El archivo del roadmap no se encuentra o no se puede leer: " . $filePath);
                    }
                    $this->filePath = $filePath;
                }

                public function parse(): array
                {
                    $content = file_get_contents($this->filePath);
                    if ($content === false) {
                        throw new Exception("No se pudo leer el contenido del archivo del roadmap.");
                    }

                    $lines = explode("\n", $content);
                    $roadmapData = [];
                    // Lógica de parseo irá aquí (Tarea 4.2 y 4.3)

                    return $roadmapData; // Temporalmente vacío
                }
            }
            ?>
            ```
    *   **Paso 4.1.3:** **Asegúrate de tener un archivo `Roadmap.md` en la raíz de tu proyecto.**
        *   **Cómo:** Crea un archivo `Roadmap.md` con contenido similar al que se espera (con niveles y temas). Ejemplo:
            ```markdown
            # Roadmap de Aprendizaje PHP

            ## Nivel: Principiantes
            ### Conceptos Básicos
            *   [ ] Introducción a PHP
            *   [ ] Variables y Tipos de Datos (ID: php_basico_variables)
            *   [ ] Operadores
            ### Estructuras de Control
            *   [ ] Condicionales (if, else, elseif) (ID: php_basico_condicionales)
            *   [ ] Bucles (for, while, foreach)

            ## Nivel: Intermedio
            ### Funciones
            *   [ ] Definición y uso de funciones
            *   [ ] Ámbito de las variables
            ### Arrays
            *   [ ] Arrays indexados y asociativos
            *   [ ] Funciones comunes de arrays

            ## Nivel: Avanzado
            ### Programación Orientada a Objetos (POO)
            *   [ ] Clases y Objetos
            *   [ ] Herencia
            ```
        *   **Importante:** Decide un formato para los IDs de los temas si quieres usarlos (ej: `(ID: nombre_unico_tema)`). Esto será útil para la base de datos.

*   **Tarea 4.2:** Implementar lógica para extraer los niveles (Principiantes, Intermedio, Avanzado) y los temas dentro de cada nivel.
    *   **Paso 4.2.1:** **Modifica el método `parse()` en `RoadmapParser.php`.**
        *   **Estrategia:** Leer línea por línea. Identificar líneas que definen niveles (ej: `## Nivel: ...`) y temas (ej: `* [ ] ...` o `### Subsección`).
        *   **Cómo (ejemplo de lógica básica):**
            ```php
            // Dentro de la clase RoadmapParser, método parse():
            // ... (código anterior para leer archivo) ...
            $lines = explode("\n", $content);
            $roadmapData = [];
            $currentLevel = null;
            $currentSubSection = null; // Para subsecciones como "Conceptos Básicos"

            foreach ($lines as $line) {
                $line = trim($line);

                // Detectar Nivel (ej: ## Nivel: Principiantes)
                if (preg_match('/^##\s*Nivel:\s*(.+)/i', $line, $matches)) {
                    $currentLevel = trim($matches[1]);
                    $roadmapData[$currentLevel] = ['subsections' => [], 'items' => []]; // Inicializar items para temas directos bajo el nivel
                    $currentSubSection = null; // Resetear subsección al cambiar de nivel
                    continue;
                }

                // Detectar Subsección (ej: ### Conceptos Básicos)
                if ($currentLevel && preg_match('/^###\s*(.+)/i', $line, $matches)) {
                    $currentSubSection = trim($matches[1]);
                    if (!isset($roadmapData[$currentLevel]['subsections'][$currentSubSection])) {
                        $roadmapData[$currentLevel]['subsections'][$currentSubSection] = [];
                    }
                    continue;
                }

                // Detectar Tema (ej: * [ ] Tema (ID: tema_id))
                // Este regex busca un asterisco, opcionalmente [ ] o [x], el nombre del tema, y opcionalmente (ID: ...)
                if ($currentLevel && preg_match('/^\*\s*(?:\[[ xX]?\])?\s*(.+?)(?:\s*\(ID:\s*([a-zA-Z0-9_]+)\))?$/', $line, $matches)) {
                    $topicName = trim($matches[1]);
                    $topicId = isset($matches[2]) ? trim($matches[2]) : str_replace(' ', '_', strtolower($topicName)); // Generar ID si no existe

                    $topicItem = ['name' => $topicName, 'id' => $topicId, 'completed' => false]; // 'completed' se actualizará luego

                    if ($currentSubSection) {
                        $roadmapData[$currentLevel]['subsections'][$currentSubSection][] = $topicItem;
                    } else {
                        // Si no hay subsección, el tema pertenece directamente al nivel
                        $roadmapData[$currentLevel]['items'][] = $topicItem;
                    }
                }
            }
            return $roadmapData;
            ```

*   **Tarea 4.3:** Estructurar los datos parseados en un formato que sea fácil de usar en la aplicación (ej: arrays anidados).
    *   **Paso 4.3.1:** **Revisa la estructura generada por el parser.**
        *   La lógica del **Paso 4.2.1** ya intenta generar una estructura de array anidado.
        *   **Ejemplo de la estructura esperada:**
            ```
            [
                "Principiantes" => [
                    "subsections" => [
                        "Conceptos Básicos" => [
                            ["name" => "Introducción a PHP", "id" => "introduccion_a_php", "completed" => false],
                            ["name" => "Variables y Tipos de Datos", "id" => "php_basico_variables", "completed" => false],
                            // ... otros temas de Conceptos Básicos
                        ],
                        "Estructuras de Control" => [
                            ["name" => "Condicionales (if, else, elseif)", "id" => "php_basico_condicionales", "completed" => false],
                            // ... otros temas de Estructuras de Control
                        ]
                    ],
                    "items" => [] // Para temas directamente bajo "Principiantes" sin subsección
                ],
                "Intermedio" => [
                    // ... estructura similar
                ],
                // ... otros niveles
            ]
            ```
    *   **Paso 4.3.2:** **Prueba el parser.**
        *   **Cómo:** Puedes crear un archivo PHP temporal para probarlo:
            ```php
            <?php
            // public/test_parser.php (o similar)
            require_once __DIR__ . '/../src/RoadmapParser.php'; // Ajusta la ruta

            // Asegúrate que Roadmap.md está en la raíz del proyecto
            $roadmapFile = __DIR__ . '/../Roadmap.md';

            try {
                $parser = new RoadmapParser($roadmapFile);
                $parsedData = $parser->parse();

                echo "<pre>";
                print_r($parsedData);
                echo "</pre>";

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
            ```
        *   Ejecuta `test_parser.php` desde tu navegador y verifica que la salida sea la esperada. Ajusta el regex en `RoadmapParser.php` si es necesario.

---

## 5. Visualización del Roadmap (Frontend)

Ahora mostraremos el roadmap leído del archivo `.md` en una página HTML.

*   **Tarea 5.1:** Crear la estructura HTML básica en `index.php` o en un archivo de plantilla.
    *   **Paso 5.1.1:** **Modifica `public/index.php`.**
        *   **Propósito:** Añadir HTML básico y un lugar donde se mostrará el roadmap.
        *   **Cómo:**
            ```php
            <?php
            // public/index.php
            require_once __DIR__ . '/../src/RoadmapParser.php';
            require_once __DIR__ . '/../src/Database.php'; // Lo necesitaremos pronto

            // Ruta al archivo Roadmap.md (asumiendo que está en la raíz del proyecto)
            $roadmapFile = __DIR__ . '/../Roadmap.md';
            $roadmapData = []; // Inicializar

            try {
                $parser = new RoadmapParser($roadmapFile);
                $roadmapData = $parser->parse();
            } catch (Exception $e) {
                // Manejar el error, por ejemplo, mostrando un mensaje
                error_log("Error al parsear el roadmap: " . $e->getMessage());
                // Podrías mostrar un mensaje amigable al usuario aquí
            }

            // Más adelante (Tarea 6), obtendremos el progreso del usuario aquí
            $userProgress = []; // Ejemplo: ['php_basico_variables' => true, 'php_basico_condicionales' => false]

            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Roadmap de Aprendizaje PHP</title>
                <!-- Incluir Tailwind CSS (CDN para empezar fácil) -->
                <script src="https://cdn.tailwindcss.com"></script>
                <style>
                    /* Estilos personalizados adicionales si son necesarios */
                    .completed-topic {
                        text-decoration: line-through;
                        color: #888;
                    }
                </style>
            </head>
            <body class="bg-gray-100 text-gray-800 font-sans p-6">
                <div class="container mx-auto max-w-4xl bg-white shadow-md rounded-lg p-8">
                    <header class="mb-8">
                        <h1 class="text-4xl font-bold text-center text-blue-600">Roadmap de Aprendizaje PHP</h1>
                    </header>

                    <main id="roadmap-container">
                        <?php if (empty($roadmapData)): ?>
                            <p class="text-red-500">No se pudo cargar el contenido del roadmap. Revisa los logs.</p>
                        <?php else: ?>
                            <!-- Aquí se generará el contenido del roadmap (Tarea 5.2) -->
                        <?php endif; ?>
                    </main>

                    <footer class="mt-12 text-center text-sm text-gray-500">
                        <p>&copy; <?php echo date('Y'); ?> Tu Aplicación de Aprendizaje PHP</p>
                    </footer>
                </div>

                <!-- Scripts JS (Tarea 6.4) -->
                <!-- <script src="js/main.js"></script> -->
            </body>
            </html>
            ```

*   **Tarea 5.2:** En tu archivo PHP (`index.php`), utiliza el código de la tarea 4 para obtener los datos del roadmap y mézclalos con tu código HTML para mostrarlos dinámicamente en la página.
    *   **Paso 5.2.1:** **Dentro de la etiqueta `<main>` en `public/index.php`, añade el código PHP para renderizar el roadmap.**
        *   **Cómo:**
            ```php
            // ... (dentro de <main id="roadmap-container"> en public/index.php) ...
            <?php if (empty($roadmapData)): ?>
                <p class="text-red-500">No se pudo cargar el contenido del roadmap. Revisa los logs.</p>
            <?php else: ?>
                <?php foreach ($roadmapData as $levelName => $levelData): ?>
                    <section class="mb-10">
                        <h2 class="text-3xl font-semibold text-blue-500 border-b-2 border-blue-200 pb-2 mb-6"><?php echo htmlspecialchars($levelName); ?></h2>

                        <?php // Mostrar temas directamente bajo el nivel (si existen) ?>
                        <?php if (!empty($levelData['items'])): ?>
                            <ul class="list-disc list-inside mb-4 pl-4 space-y-2">
                                <?php foreach ($levelData['items'] as $item): ?>
                                    <?php
                                        $isCompleted = isset($userProgress[$item['id']]) && $userProgress[$item['id']];
                                        $completedClass = $isCompleted ? 'completed-topic' : '';
                                    ?>
                                    <li class="<?php echo $completedClass; ?>">
                                        <input type="checkbox" id="topic-<?php echo htmlspecialchars($item['id']); ?>"
                                               data-topic-id="<?php echo htmlspecialchars($item['id']); ?>"
                                               class="mr-2 topic-checkbox" <?php echo $isCompleted ? 'checked' : ''; ?>>
                                        <label for="topic-<?php echo htmlspecialchars($item['id']); ?>">
                                            <?php echo htmlspecialchars($item['name']); ?>
                                            (ID: <?php echo htmlspecialchars($item['id']); ?>)
                                        </label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php // Mostrar subsecciones y sus temas ?>
                        <?php if (!empty($levelData['subsections'])): ?>
                            <?php foreach ($levelData['subsections'] as $subSectionName => $topics): ?>
                                <div class="ml-4 mb-6">
                                    <h3 class="text-2xl font-medium text-gray-700 mb-3"><?php echo htmlspecialchars($subSectionName); ?></h3>
                                    <?php if (empty($topics)): ?>
                                        <p class="text-gray-500 italic">No hay temas en esta subsección.</p>
                                    <?php else: ?>
                                        <ul class="list-disc list-inside pl-4 space-y-2">
                                            <?php foreach ($topics as $item): ?>
                                                <?php
                                                    $isCompleted = isset($userProgress[$item['id']]) && $userProgress[$item['id']];
                                                    $completedClass = $isCompleted ? 'completed-topic' : '';
                                                ?>
                                                <li class="<?php echo $completedClass; ?>">
                                                    <input type="checkbox" id="topic-<?php echo htmlspecialchars($item['id']); ?>"
                                                           data-topic-id="<?php echo htmlspecialchars($item['id']); ?>"
                                                           class="mr-2 topic-checkbox" <?php echo $isCompleted ? 'checked' : ''; ?>>
                                                    <label for="topic-<?php echo htmlspecialchars($item['id']); ?>">
                                                        <?php echo htmlspecialchars($item['name']); ?>
                                                        (ID: <?php echo htmlspecialchars($item['id']); ?>)
                                                    </label>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </section>
                <?php endforeach; ?>
            <?php endif; ?>
            // ... (resto del main y HTML) ...
            ```
        *   **Importante:**
            *   Usamos `htmlspecialchars()` para prevenir ataques XSS al mostrar datos que vienen del archivo `.md`.
            *   Hemos añadido checkboxes. Su funcionalidad se implementará en la Tarea 6.
            *   La variable `$userProgress` está vacía por ahora. Se llenará en la Tarea 6.3.

*   **Tarea 5.3:** Implementar la presentación visual de los niveles y temas utilizando HTML, CSS y Tailwind CSS.
    *   **Paso 5.3.1:** **Revisa el HTML y las clases de Tailwind CSS.**
        *   El código del **Paso 5.2.1** ya incluye clases de Tailwind CSS para dar un estilo básico.
        *   **Ejemplos de clases usadas:**
            *   `container mx-auto max-w-4xl`: Centra el contenido y limita su ancho.
            *   `bg-white shadow-md rounded-lg p-8`: Estilo de la tarjeta principal.
            *   `text-4xl font-bold text-blue-600`: Estilo del título principal.
            *   `mb-10`, `pb-2`, `mb-6`: Márgenes y paddings.
            *   `list-disc list-inside space-y-2`: Estilo para las listas de temas.
    *   **Paso 5.3.2:** **Ajusta los estilos según tus preferencias.**
        *   **Cómo:** Abre `public/index.php` en tu navegador. Mira cómo se ve.
        *   Puedes modificar las clases de Tailwind directamente en el PHP que genera el HTML.
        *   Consulta la documentación de Tailwind CSS (`tailwindcss.com/docs`) para ver todas las clases disponibles.
        *   La clase `.completed-topic` (definida en el `<style>` del `<head>`) se usará para tachar temas completados.

*   **Tarea 5.4:** Asegurar que la estructura refleje claramente las secciones y los temas como se especifica en `requerimientos.md`.
    *   **Paso 5.4.1:** **Compara la visualización con `requerimientos.md` y `Roadmap.md`.**
        *   **Verifica:**
            *   ¿Se muestran todos los niveles?
            *   ¿Se muestran todas las subsecciones (si las hay)?
            *   ¿Se listan correctamente los temas dentro de cada nivel/subsección?
            *   ¿Los IDs de los temas son visibles (útil para depuración por ahora)?
    *   **Paso 5.4.2:** **Refina el `RoadmapParser.php` si es necesario.**
        *   Si la estructura no es la correcta, es probable que necesites ajustar las expresiones regulares o la lógica en `RoadmapParser.php` (Tarea 4.2).

---

## 6. Seguimiento del Progreso del Usuario

Ahora haremos que los checkboxes funcionen y guardaremos el progreso en la base de datos.

*   **Tarea 6.1:** Modificar la base de datos `user_progress` para incluir el ID del usuario y el ID del tema.
    *   **Revisión:** Nuestro script `database/setup.php` (Tarea 3.2) ya define la tabla `progress` con `user_id` y `topic_id`.
        ```sql
        CREATE TABLE IF NOT EXISTS progress (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL DEFAULT 1, -- Por ahora, user_id = 1
            topic_id TEXT NOT NULL,
            completed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(user_id, topic_id) -- Clave única para evitar duplicados
        );
        ```
    *   **Acción:** Si necesitas cambiar algo (por ejemplo, si no incluiste `UNIQUE(user_id, topic_id)`), modifica `database/setup.php` y vuelve a ejecutarlo (o haz un `ALTER TABLE` manual si ya tienes datos). Por ahora, asumiremos que está bien.

*   **Tarea 6.2:** Implementar funciones en PHP para guardar el estado de "completado" de un tema para el usuario único.
    *   **Paso 6.2.1:** **Crea un archivo `src/ProgressManager.php` (o añade a `Database.php` si prefieres, pero separarlo es más limpio).**
        *   **Propósito:** Manejar la lógica de guardar y recuperar el progreso.
    *   **Paso 6.2.2:** **Escribe la clase `ProgressManager`.**
        ```php
        <?php
        // src/ProgressManager.php
        require_once __DIR__ . '/Database.php';

        class ProgressManager
        {
            // Por ahora, asumimos un ID de usuario fijo. Esto cambiará con la autenticación.
            private const DEFAULT_USER_ID = 1;

            public function markTopicAsCompleted(string $topicId, int $userId = self::DEFAULT_USER_ID): bool
            {
                $sql = "INSERT OR IGNORE INTO progress (user_id, topic_id) VALUES (?, ?)";
                // "INSERT OR IGNORE" es específico de SQLite. Para otras BDs, harías un SELECT primero o usarías ON DUPLICATE KEY UPDATE.
                // Dado que tenemos una restricción UNIQUE(user_id, topic_id), IGNORE previene errores si ya existe.
                try {
                    $rowCount = Database::exec($sql, [$userId, $topicId]);
                    return $rowCount > 0; // Devuelve true si se insertó una nueva fila
                } catch (PDOException $e) {
                    error_log("Error al marcar tema como completado: " . $e->getMessage());
                    return false;
                }
            }

            public function markTopicAsIncomplete(string $topicId, int $userId = self::DEFAULT_USER_ID): bool
            {
                $sql = "DELETE FROM progress WHERE user_id = ? AND topic_id = ?";
                try {
                    $rowCount = Database::exec($sql, [$userId, $topicId]);
                    return $rowCount > 0; // Devuelve true si se eliminó una fila
                } catch (PDOException $e) {
                    error_log("Error al marcar tema como incompleto: " . $e->getMessage());
                    return false;
                }
            }

            public function getCompletedTopics(int $userId = self::DEFAULT_USER_ID): array
            {
                $sql = "SELECT topic_id FROM progress WHERE user_id = ?";
                try {
                    $stmt = Database::query($sql, [$userId]);
                    $completed = $stmt->fetchAll(PDO::FETCH_COLUMN, 0); // Obtener solo la columna topic_id
                    // Convertir a un array asociativo para búsqueda fácil: ['topic_id1' => true, 'topic_id2' => true]
                    return array_fill_keys($completed, true);
                } catch (PDOException $e) {
                    error_log("Error al obtener temas completados: " . $e->getMessage());
                    return [];
                }
            }

            public function getTotalTopicsCount(array $roadmapData): int
            {
                $total = 0;
                foreach ($roadmapData as $level) {
                    if (!empty($level['items'])) {
                        $total += count($level['items']);
                    }
                    if (!empty($level['subsections'])) {
                        foreach ($level['subsections'] as $subSection) {
                            $total += count($subSection);
                        }
                    }
                }
                return $total;
            }
        }
        ?>
        ```

*   **Tarea 6.3:** En tus archivos PHP que muestran el roadmap (`public/index.php`), implementa lógica para recuperar el estado de progreso del usuario desde la base de datos al cargar la página y marcar visualmente los temas completados.
    *   **Paso 6.3.1:** **Modifica `public/index.php` para usar `ProgressManager`.**
        *   **Cómo:**
            ```php
            <?php
            // public/index.php
            require_once __DIR__ . '/../src/RoadmapParser.php';
            require_once __DIR__ . '/../src/Database.php'; // Ya estaba
            require_once __DIR__ . '/../src/ProgressManager.php'; // Añadir esto

            // ... (código de RoadmapParser) ...

            $progressManager = new ProgressManager();
            // Asumimos user_id = 1 por ahora. Esto cambiará con la autenticación.
            $currentUserId = 1;
            $userProgress = $progressManager->getCompletedTopics($currentUserId); // Esto reemplaza $userProgress = [];

            // ... (resto del HTML y bucles para mostrar el roadmap) ...
            // La lógica dentro del bucle que usa $userProgress ya debería funcionar:
            // $isCompleted = isset($userProgress[$item['id']]) && $userProgress[$item['id']];
            // $completedClass = $isCompleted ? 'completed-topic' : '';
            // ... y el 'checked' en el input.
            ?>
            ```
    *   **Paso 6.3.2:** **Prueba.**
        *   Refresca `public/index.php` en tu navegador. Inicialmente, ningún tema estará marcado.
        *   Puedes añadir manualmente un registro a tu tabla `progress` usando un visor de SQLite (ej: `user_id=1, topic_id='php_basico_variables'`). Luego refresca la página. El tema "Variables y Tipos de Datos" debería aparecer marcado y tachado.

*   **Tarea 6.4:** Utiliza JavaScript en el frontend para manejar la interacción del usuario al marcar un tema como completado (ej: un checkbox). Este JavaScript debe enviar una solicitud a tu archivo PHP de actualización de progreso (`public/update_progress.php`).
    *   **Paso 6.4.1:** **Crea un archivo `public/js/main.js`.**
        *   **Cómo:**
            ```javascript
            // public/js/main.js
            document.addEventListener('DOMContentLoaded', function () {
                const checkboxes = document.querySelectorAll('.topic-checkbox');

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function () {
                        const topicId = this.dataset.topicId;
                        const isCompleted = this.checked;
                        const label = this.nextElementSibling; // El <label> al lado del checkbox

                        // Actualizar visualmente de inmediato (opcional, pero da mejor UX)
                        if (isCompleted) {
                            label.parentElement.classList.add('completed-topic');
                        } else {
                            label.parentElement.classList.remove('completed-topic');
                        }

                        // Enviar la solicitud al servidor
                        fetch('update_progress.php', { // Asume que update_progress.php está en la misma carpeta (public)
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded', // O application/json
                            },
                            // Enviamos los datos como form-urlencoded
                            body: `topic_id=${encodeURIComponent(topicId)}&completed=${isCompleted ? 1 : 0}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Progreso actualizado para el tema:', topicId, 'Completado:', isCompleted);
                                // Podrías actualizar el contador de progreso aquí si lo tienes
                                if (data.progressPercentage !== undefined) {
                                    const progressElement = document.getElementById('progress-percentage');
                                    if (progressElement) {
                                        progressElement.textContent = `Progreso: ${data.progressPercentage.toFixed(2)}%`;
                                    }
                                }
                            } else {
                                console.error('Error al actualizar el progreso:', data.message);
                                // Revertir el cambio visual si falla la actualización
                                this.checked = !isCompleted;
                                if (isCompleted) {
                                    label.parentElement.classList.remove('completed-topic');
                                } else {
                                    label.parentElement.classList.add('completed-topic');
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Error en la solicitud fetch:', error);
                            // Revertir el cambio visual
                            this.checked = !isCompleted;
                             if (isCompleted) {
                                label.parentElement.classList.remove('completed-topic');
                            } else {
                                label.parentElement.classList.add('completed-topic');
                            }
                        });
                    });
                });
            });
            ```
    *   **Paso 6.4.2:** **Incluye `main.js` en `public/index.php`.**
        *   **Cómo:** Al final del `<body>` en `public/index.php`:
            ```html
            <!-- ... (antes de </body>) ... -->
            <script src="js/main.js"></script>
            </body>
            </html>
            ```

*   **Tarea 6.5:** En un archivo PHP separado (ej: `public/update_progress.php`), implementa la lógica para recibir una solicitud (por ejemplo, vía POST de JavaScript) con el ID del tema completado y el ID del usuario, y actualizar la base de datos `user_progress`.
    *   **Paso 6.5.1:** **Crea `public/update_progress.php`.**
        *   **Cómo:**
            ```php
            <?php
            // public/update_progress.php
            require_once __DIR__ . '/../src/Database.php'; // Para la conexión
            require_once __DIR__ . '/../src/ProgressManager.php';
            require_once __DIR__ . '/../src/RoadmapParser.php'; // Para calcular el porcentaje

            header('Content-Type: application/json'); // Indicar que la respuesta será JSON

            // Simular ID de usuario (esto cambiará con la autenticación)
            $userId = 1;

            // Verificar que la solicitud sea POST
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
                exit;
            }

            // Obtener datos del POST
            $topicId = $_POST['topic_id'] ?? null;
            $isCompleted = isset($_POST['completed']) ? (bool)$_POST['completed'] : null; // Convertir a booleano

            if ($topicId === null || $isCompleted === null) {
                echo json_encode(['success' => false, 'message' => 'Datos incompletos. Se requiere topic_id y completed.']);
                exit;
            }

            $progressManager = new ProgressManager();
            $success = false;

            if ($isCompleted) {
                $success = $progressManager->markTopicAsCompleted($topicId, $userId);
            } else {
                $success = $progressManager->markTopicAsIncomplete($topicId, $userId);
            }

            if ($success) {
                // Calcular el nuevo porcentaje de progreso
                $roadmapFile = __DIR__ . '/../Roadmap.md';
                $parser = new RoadmapParser($roadmapFile);
                $roadmapData = $parser->parse();
                $totalTopics = $progressManager->getTotalTopicsCount($roadmapData);
                $completedTopicsArray = $progressManager->getCompletedTopics($userId);
                $completedCount = count($completedTopicsArray);
                $progressPercentage = ($totalTopics > 0) ? ($completedCount / $totalTopics) * 100 : 0;

                echo json_encode([
                    'success' => true,
                    'message' => 'Progreso actualizado.',
                    'progressPercentage' => $progressPercentage
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al actualizar la base de datos.']);
            }
            ?>
            ```
    *   **Paso 6.5.2:** **Prueba la funcionalidad.**
        *   Abre `public/index.php` en tu navegador.
        *   Abre la consola de desarrollador (F12, pestaña "Network" y "Console").
        *   Haz clic en un checkbox. Deberías ver:
            *   Una solicitud POST a `update_progress.php` en la pestaña "Network".
            *   Un mensaje en la consola de JavaScript.
            *   El tema debería cambiar visualmente (tachado/no tachado).
            *   Verifica en tu base de datos (`user_progress.sqlite`) que la fila correspondiente se haya insertado o eliminado en la tabla `progress`.
        *   Refresca la página. El estado del checkbox debería persistir.

*   **Tarea 6.6:** Calcula y muestra el porcentaje de temas completados en la interfaz de usuario utilizando PHP y/o JavaScript.
    *   **Paso 6.6.1 (Mostrar con PHP al cargar la página):**
        *   **Modifica `public/index.php` para calcular y mostrar el progreso inicial.**
            ```php
            // public/index.php
            // ... (después de obtener $userProgress y $roadmapData) ...

            $totalTopics = $progressManager->getTotalTopicsCount($roadmapData);
            $completedCount = count($userProgress); // $userProgress ya es un array de temas completados
            $progressPercentage = ($totalTopics > 0) ? ($completedCount / $totalTopics) * 100 : 0;
            ?>

            <!DOCTYPE html>
            <!-- ... -->
            <body class="bg-gray-100 text-gray-800 font-sans p-6">
                <div class="container mx-auto max-w-4xl bg-white shadow-md rounded-lg p-8">
                    <header class="mb-8">
                        <h1 class="text-4xl font-bold text-center text-blue-600">Roadmap de Aprendizaje PHP</h1>
                        <div id="progress-percentage" class="text-center text-xl mt-4 text-green-600 font-semibold">
                            Progreso: <?php echo number_format($progressPercentage, 2); ?>%
                        </div>
                    </header>
                    <!-- ... -->
            ```
    *   **Paso 6.6.2 (Actualizar con JavaScript dinámicamente):**
        *   El archivo `public/js/main.js` (Tarea 6.4.1) ya incluye lógica para actualizar el elemento con ID `progress-percentage` cuando recibe la respuesta de `update_progress.php`.
            ```javascript
            // En public/js/main.js, dentro del .then(data => { ... })
            if (data.success) {
                // ...
                if (data.progressPercentage !== undefined) {
                    const progressElement = document.getElementById('progress-percentage');
                    if (progressElement) {
                        // Usamos toFixed(0) o toFixed(2) para los decimales
                        progressElement.textContent = `Progreso: ${data.progressPercentage.toFixed(0)}%`;
                    }
                }
            }
            ```
    *   **Paso 6.6.3: Prueba.**
        *   Refresca `index.php`. Deberías ver el porcentaje de progreso inicial.
        *   Marca o desmarca temas. El porcentaje debería actualizarse dinámicamente sin recargar la página.


**¡Hasta aquí la primera parte!** Las siguientes tareas (Gestión de Perfil, Autenticación, etc.) se construirán sobre esta base. Sigue los pasos con cuidado y prueba a menudo. Si algo no funciona, revisa los pasos anteriores y los mensajes de error en la consola del navegador o en los logs de PHP.

Avísame cuando estés listo para continuar con el desglose de las tareas 7 en adelante, o si tienes alguna pregunta sobre esta primera parte. ¡Buen trabajo hasta ahora!

