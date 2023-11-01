# Instalar
- Tener instalado php8 


## pasos para poner en marcha la app

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
        - console.php (para la aplicación de consola)
    - tests/ 
        - MovieRepositoryTest.php
    - README.md


## Test unitarios
## La rapidez en la entrega (aunque siempre por debajo de la calidad de la misma)






















## Posibre errores en windows config Rutas (php no se encuentra en el PATH) al utilizar Xampp
- Agrega PHP al PATH: Si PHP está instalado pero no se encuentra en el PATH, debes agregar la ruta de acceso al ejecutable de PHP al PATH del sistema. 
- Propiedades del sistema (hacer clic con el botón derecho en "Este equipo" y seleccionar "Propiedades").
- Clic en "Configuración avanzada del sistema" en el lado izquierdo.
- En la pestaña "Opciones avanzadas", haz clic en "Variables de entorno".
- En la sección "Variables del sistema", busca la variable "Path" (o "PATH") y haz clic en "Editar".
- Agrega la ruta de acceso al directorio donde está instalado PHP (por ejemplo, C:\xampp\php o C:\wamp64\bin\php\php8.0.0)
- Guarda los cambios y cierra las ventanas de configuración.




