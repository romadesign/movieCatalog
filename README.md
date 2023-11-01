# pasos para poner en marcha la app
- Tener instalado php8 
- Tener instalado composer
- Tener PHPUnit instalado: 
    Verifica que tienes PHPUnit instalado en tu proyecto. Puedes instalar PHPUnit utilizando Composer si aún no lo has hecho. Abre una terminal en la raíz de tu proyecto y ejecuta el siguiente comando:

    ```
    composer require --dev phpunit/phpunit

    ```

## Las decisiones tomadas y las motivaciones que había detrás

## Que hubieses hecho diferente si contases con más tiempo

## Clean code

## Arquitectura / Diseño de los componentes

- movieCatalog/
    - src/
        - Repository/ "Contendrá la implementación del patrón de repositorio"
            - MovieRepository.php
        - Model/
            - Movie.php
        - Service/ "Contendrá las clases de modelo"
            - MovieService.php
    - public/
        - index.php (para la interfaz web)
    - tests/ 
        - MovieRepositoryTest.php
    - scripts/ (para  mostrar los datos por consola)
        - show-movies.php
    - README.md


## Test unitarios
Para inciar test
```
    ./vendor/bin/phpunit .\tests\MovieRepositoryTest.php
```
Para verificar si las querys funcionan
## La rapidez en la entrega (aunque siempre por debajo de la calidad de la misma)






















## Posibre errores en windows config Rutas (php no se encuentra en el PATH) al utilizar Xampp
- Agrega PHP al PATH: Si PHP está instalado pero no se encuentra en el PATH, debes agregar la ruta de acceso al ejecutable de PHP al PATH del sistema. 
- Propiedades del sistema (hacer clic con el botón derecho en "Este equipo" y seleccionar "Propiedades").
- Clic en "Configuración avanzada del sistema" en el lado izquierdo.
- En la pestaña "Opciones avanzadas", haz clic en "Variables de entorno".
- En la sección "Variables del sistema", busca la variable "Path" (o "PATH") y haz clic en "Editar".
- Agrega la ruta de acceso al directorio donde está instalado PHP (por ejemplo, C:\xampp\php o C:\wamp64\bin\php\php8.0.0)
- Guarda los cambios y cierra las ventanas de configuración.


## Posibre errores en windows config Rutas (composer PATH)
- Abrir el menú Inicio y busca "Variables de entorno" o "Edit the system environment variables" (Editar las variables de entorno del sistema) y selecciona la opción que aparezca en los resultados de búsqueda.
- En la ventana de Propiedades del sistema, haz clic en el botón "Variables de entorno".
- En la sección "Variables de sistema", busca la variable llamada "Path" (PATH).
- Haz doble clic en la variable "Path" para editarla.
- En la ventana "Editar variable de sistema", haz clic en "Nuevo".
- Agrega la ubicación de la instalación de Composer. Por ejemplo, si instalaste Composer en         C:\ProgramData\ComposerSetup\bin, agrega esta ruta.
- Haz clic en "Aceptar" para guardar los cambios.


