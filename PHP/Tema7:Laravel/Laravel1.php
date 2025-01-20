<?php

//Hay que separar la información de la base de datos de la información de la aplicación
//La información de la base de datos se almacena en un archivo llamado config.php
//La información de la aplicación se almacena en un archivo llamado app.php
//Esto se hace para que sea más fácil cambiar la información de la base de datos sin afect
//ar la información de la aplicación


/*Laravel es el framework de PHP que se utiliza para el desarrollo de la aplicación
y con documentacion clara y curva de aprendizaje. Utiliza el patron
Modelo-Vista-Controlador (MVC), donde se separa la parte de logica, del frontend
y BD. El usuario interactua por medio de la vista, vista llama al controlador y este 
comunica con la base de datos */

/*Los requisitos para laravel es el Composer (crea estructura de ficheros) y el propio 
Laravel installer*/


/*Al ejecutar este comando, se nos lanzarán una serie de preguntas de configuración inicial
del proyecto. Todas ellas son revertibles. Por ahora elegiremos “No starter kit”, “Pest” como
herramienta de test, “MySQL” como base de datos, y “No” a la migración (lo haremos
después manualmente)./

/*en .env dentro de vendor, en la linea DB_CONNECTION = mysql
ahi podemos modificar, el tipo e base de datos, host, puerto, nombre de la base
de datos (hay que crearla) y la contraseña de esta (hay que introducirla) */


/*Una vez realizada la configuración, tenemos que hacer una migración, es decir, crear el
esquema de tablas de nuestra base de datos. En realidad, lo que estamos haciendo es
realizar todas las operaciones que se encuentran en el directorio database > migrations,
pero ya lo veremos más adelante. Utilizamos: php artisan migrate (asegurarse de estar en la
carpeta del proyecto Laravel)*/