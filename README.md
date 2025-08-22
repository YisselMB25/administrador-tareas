## Requisitos Previos

Antes de instalar y ejecutar este proyecto, asegúrate de tener lo siguiente instalado en tu sistema:

-   **PHP >= 8.2**
-   **Composer** (https://getcomposer.org/)
-   **Node.js y npm** (https://nodejs.org/)
-   **MySQL** (o MariaDB)
-   **Git** (opcional, para clonar el repositorio)

## Instalación

1. **Clona el repositorio:**

    ```sh
    git clone https://github.com/YisselMB25/administrador-tareas.git
    cd administrador-tareas
    ```

2. **Instala las dependencias de PHP:**

    ```sh
    composer install
    ```

3. **Instala las dependencias de Node.js:**

    ```sh
    npm install
    ```

4. **Copia el archivo de entorno y configura tus variables:**

    ```sh
    cp .env.example .env
    ```

5. **Configura la conexión a MySQL en el archivo `.env`:**

    Edita las siguientes variables según tu entorno, Esta BD ya esta desplegada:

    ```
    DB_CONNECTION=****
    DB_HOST=****
    DB_PORT=****
    DB_DATABASE=****
    DB_USERNAME=****
    DB_PASSWORD=****
    ```

6. **Genera la clave de la aplicación:**

    ```sh
    php artisan key:generate
    ```

7. **Ejecuta las migraciones para crear la base de datos: En este caso, en la base de datos proporcionada, ya las migraciones fueron ejecutadas.**

    ```sh
    php artisan migrate
    ```

8. **Compila los assets:**

    ```sh
    npm run build
    ```

9. **Inicia el servidor de desarrollo:**
    ```sh
    php artisan serve
    ```

Ahora puedes acceder a la aplicación en localhost

