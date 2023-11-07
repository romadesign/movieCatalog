# PRUEBA TÉCNICA IRONTEC

## Docker + Apache + PHP8.1 + Mysql + phpMyAdmin

**Requisitos:** Docker y Docker Compose

```
    install Docker y Docker Compose linux
    https://www.youtube.com/watch?v=65zv8s499hE&t=1s

```

## Iniciar proyecto

```
# Inicar container apache, mysql y php
docker-compose up -d || docker-compose up -d

# Instalar composer
    // Primero colocamos "docker ps" para mirar los contenedores creados 
    docker ps 

    // Ingresar al shell del contenedor apache
    docker exec -it nombredelcontenedor /bin/bash

    // Instalar composer
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer
    php -r "unlink('composer-setup.php');"

    // Teniendo instalado composer realizamos la instalación de phpUnit y swagger. Necesitamos ir a la carpeta myapp
    // Como estamos en esto momentos en el shell del contenedor apache ponemos ls para mirar las carpetas
    // Igresamos a cd app/myapp. Y ya estamos en la carpeta donde esta el archivo composer.json
    // Ahora colocamos en la terminal:  Para instalar todas las dependencias para utilizar 	PhpUnit y Swagger
    composer install || composer update

```


**Acesso a los test y scripts por consola esto es solo si estas utilizando docker**

```
    // Como nos encontramos en la ruta app/myapp
    test : ./vendor/bin/phpunit .\tests\MovieRepositoryTest.php
    script : php scripts/movies.php

```

**Ingresar a testear la api con swagger vamos a navegador y colocamos la url**

```
    url : http://localhost:4500/myapp/src/documentation

    // Ya dentro en donde dice "explore" colocamos esta url
    http://localhost:4500/myapp/src/documentation/api.php

```

**Acesso localhost**
```
    http://localhost:4500/myapp

```

**Acesso phpMyAdmin**

```
http://localhost:8080

user: root
password: root

```


## Arquitectura / Diseño de los componentes

- www
    - myapp/
        - api
            - index.php
        - src/
            - documentation "Configuraciones y carpeta para swagger"
            - Repository/ "Contendrá la implementación del patrón de repositorio"
                - MovieRepository.php
            - Model/
                - Movie.php
            - Lib // Errores http
                - errors.php 
        - public/
            - index.php (para la interfaz web)
        - tests/ 
            - MovieRepositoryTest.php
        - scripts/ (para  mostrar los datos por consola)
            - show-movies.php
        - swagger-ui (archivos swagger)
        - createMovie.php  "Crea y guarda las películas en $_SESSION['movies']
        - composer.json 
        - README.md
    - docker-compose.yml



## Decisiones y Motivaciones detrás del Proyecto
En este proyecto se tomaron diversas decisiones con el objetivo de construir una plataforma desde cero en lugar de utilizar un framework existente. Estas decisiones se basaron en varias motivaciones:

- Construcción desde Cero: La elección de desarrollar el proyecto desde cero se realizó con el propósito de crear un entorno funcional personalizado para futuros proyectos en PHP. Esto permitió organizar cuidadosamente todos los componentes del proyecto y establecer las bases para proyectos escalables en el futuro.

- Utilización de PHP: El lenguaje PHP se seleccionó debido a la intención de demostrar un conocimiento sólido del lenguaje y su capacidad para crear soluciones personalizadas. Se utilizó PHP para la construcción de la plataforma, desde la gestión de datos hasta la presentación de la información.

- Pruebas Unitarias con PHPUnit: La elección de utilizar PHPUnit como marco de pruebas se basó en el deseo de comprender en profundidad cómo se realizan pruebas en PHP y cómo se configura un entorno de pruebas efectivo. Aunque fue la primera vez que se utilizó PHPUnit, se buscó asegurarse de que las pruebas unitarias funcionaran de manera efectiva y contribuyeran a la robustez y calidad del proyecto.

- Se decidio Guardar datos en memoria con session_start():
    - Facilidad de uso: session_start() es relativamente sencillo de implementar y no requiere configuraciones adicionales o la instalación de bibliotecas externas como Memcached o Redis.
    - Persistencia a corto plazo: Las sesiones son adecuadas para mantener datos en memoria durante la duración de una visita del usuario al sitio web, pero estos datos se perderán cuando el usuario cierre su navegador o la sesión expire. 
    - Bajo costo de recursos: Las sesiones generalmente tienen un bajo costo en términos de recursos del servidor en comparación con sistemas de caché más avanzados como Memcached o Redis. Si estás trabajando en un entorno con recursos limitados, las sesiones pueden ser una opción más liviana.

Estas decisiones y motivaciones se alinearon con el objetivo de adquirir experiencia y conocimientos sólidos en PHP y desarrollo de software, preparando así un entorno personalizado y funcional para futuros proyectos.

## Que hubieses hecho diferente si contases con más tiempo
 Si tuviera más tiempo para el proyecto, habría considerado agregar varias funcionalidades adicionales para mejorar su robustez y utilidad:

- Sistema de Autenticación y Autorización: Implementar un sistema de autenticación y autorización habría sido una adición importante. Esto permitiría a los usuarios crear cuentas, iniciar sesión y acceder a funcionalidades específicas según sus roles. La autenticación y autorización son componentes esenciales para muchas aplicaciones web.

- Almacenamiento en una Base de Datos: En lugar de mantener los datos de las películas en una matriz en memoria, habría optado por utilizar una base de datos. Esto habría permitido una mayor escalabilidad y una mejor gestión de los datos.

- Creación de Nuevos Modelos: Podría haber creado modelos adicionales para representar diferentes entidades en el sistema. Por ejemplo, un modelo de usuario si se implementara la autenticación, un modelo de género de película, etc.

- Métodos Adicionales: Se podrían haber agregado más métodos al repositorio, como findById, update y delete. Estos métodos habrían brindado una funcionalidad completa de operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en los datos de las películas.

- Interfaz de Usuario Frontend: Habría desarrollado una interfaz de usuario (UI) en el frontend para que los usuarios puedan interactuar fácilmente con la aplicación. Esto incluiría la visualización de datos, la búsqueda de películas y la capacidad de realizar operaciones CRUD si es relevante.

    Estas adiciones habrían mejorado significativamente la funcionalidad y la usabilidad del proyecto, pero requerirían más tiempo y esfuerzo de desarrollo.