# pasos para poner en marcha la app
- Tener instalado php8 
- Tener instalado composer
- Tener instalado xampp se clonara el repositorio y se llevara a la carpeta http

* Instalar:
```
    composer install || composer update
```
- Tener PHPUnit instalado en el proyecto: 
    Verifica que tienes PHPUnit instalado en tu proyecto. Puedes instalar PHPUnit utilizando Composer si aún no lo has hecho. Abre una terminal en la raíz de tu proyecto y ejecuta el siguiente comando:

    ```
    composer require --dev phpunit/phpunit

    ```


## Decisiones y Motivaciones detrás del Proyecto
En este proyecto se tomaron diversas decisiones con el objetivo de construir una plataforma desde cero en lugar de utilizar un framework existente. Estas decisiones se basaron en varias motivaciones:

- Construcción desde Cero: La elección de desarrollar el proyecto desde cero se realizó con el propósito de crear un entorno funcional personalizado para futuros proyectos en PHP. Esto permitió organizar cuidadosamente todos los componentes del proyecto y establecer las bases para proyectos escalables en el futuro.

- Utilización de PHP: El lenguaje PHP se seleccionó debido a la intención de demostrar un conocimiento sólido del lenguaje y su capacidad para crear soluciones personalizadas. Se utilizó PHP para la construcción de la plataforma, desde la gestión de datos hasta la presentación de la información.

- Pruebas Unitarias con PHPUnit: La elección de utilizar PHPUnit como marco de pruebas se basó en el deseo de comprender en profundidad cómo se realizan pruebas en PHP y cómo se configura un entorno de pruebas efectivo. Aunque fue la primera vez que se utilizó PHPUnit, se buscó asegurarse de que las pruebas unitarias funcionaran de manera efectiva y contribuyeran a la robustez y calidad del proyecto.

Estas decisiones y motivaciones se alinearon con el objetivo de adquirir experiencia y conocimientos sólidos en PHP y desarrollo de software, preparando así un entorno personalizado y funcional para futuros proyectos.

- Se decidio Guardar datos en memoria con session_start():
    - Facilidad de uso: session_start() es relativamente sencillo de implementar y no requiere configuraciones adicionales o la instalación de bibliotecas externas como Memcached o Redis.
    - Persistencia a corto plazo: Las sesiones son adecuadas para mantener datos en memoria durante la duración de una visita del usuario al sitio web, pero estos datos se perderán cuando el usuario cierre su navegador o la sesión expire. 
    - Bajo costo de recursos: Las sesiones generalmente tienen un bajo costo en términos de recursos del servidor en comparación con sistemas de caché más avanzados como Memcached o Redis. Si estás trabajando en un entorno con recursos limitados, las sesiones pueden ser una opción más liviana.


## Que hubieses hecho diferente si contases con más tiempo
 Si tuviera más tiempo para el proyecto, habría considerado agregar varias funcionalidades adicionales para mejorar su robustez y utilidad:

- Sistema de Autenticación y Autorización: Implementar un sistema de autenticación y autorización habría sido una adición importante. Esto permitiría a los usuarios crear cuentas, iniciar sesión y acceder a funcionalidades específicas según sus roles. La autenticación y autorización son componentes esenciales para muchas aplicaciones web.

- Almacenamiento en una Base de Datos: En lugar de mantener los datos de las películas en una matriz en memoria, habría optado por utilizar una base de datos. Esto habría permitido una mayor escalabilidad y una mejor gestión de los datos.

- Creación de Nuevos Modelos: Podría haber creado modelos adicionales para representar diferentes entidades en el sistema. Por ejemplo, un modelo de usuario si se implementara la autenticación, un modelo de género de película, etc.

- Métodos Adicionales: Se podrían haber agregado más métodos al repositorio, como findById, update y delete. Estos métodos habrían brindado una funcionalidad completa de operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en los datos de las películas.

- Interfaz de Usuario Frontend: Habría desarrollado una interfaz de usuario (UI) en el frontend para que los usuarios puedan interactuar fácilmente con la aplicación. Esto incluiría la visualización de datos, la búsqueda de películas y la capacidad de realizar operaciones CRUD si es relevante.

    Estas adiciones habrían mejorado significativamente la funcionalidad y la usabilidad del proyecto, pero requerirían más tiempo y esfuerzo de desarrollo.

## Arquitectura / Diseño de los componentes

- movieCatalog/
    - src/
        - Repository/ "Contendrá la implementación del patrón de repositorio"
            - MovieRepository.php
        - Model/
            - Movie.php
    - public/
        - index.php (para la interfaz web)
    - tests/ 
        - MovieRepositoryTest.php
    - scripts/ (para  mostrar los datos por consola)
        - show-movies.php
    - createMovie.php  "Contiene las peliculas en $_SESSION['movies']
    - README.md


## Test unitarios
Para inciar test
```
    ./vendor/bin/phpunit .\tests\MovieRepositoryTest.php
```
Para  iniciar scripts 
```
    php .\scripts\movies.php  
```
## La rapidez en la entrega (aunque siempre por debajo de la calidad de la misma)
- Total de horas realizando el proyecto 10 Horas


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


## Swagger documentar, y utilizar servicios web RESTful. 
    - Ingresar a "http://localhost/moviecatalog/src/documentation"
    - search o explore "http://localhost/moviecatalog/src/documentation/api.php"





## Rutas api
- http://localhost:8080/public/api/movies
- http://localhost:8080/api.php?action=getMovies
- http://localhost:8080/api.php?action=filterByTitle&query=the&mode=startswith
- http://localhost:8080/api.php?action=filterByTitle&query=matrix&mode=contains
- http://localhost:8080/api.php?action=filterByTitle&query=on&mode=endswith
- http://localhost:8080/api.php?action=filterByYear&year=1999
- http://localhost:8080/api.php?action=filterByRating&rating=8.0
- http://localhost:8080/api.php?action=filterByRating&minRating=7.0&maxRating=9.0

Puede tambien iniciar servidor para que las rutas de la api funcionen opcional: 
```
    php -S 0.0.0.0:8080
```

