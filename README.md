# Bienvenidos a la aplicación mopa!

¡Atento saludo! **mopa** es una aplicación que le ayudará a las personas a administrar sus salas y sus reservas durante el día.
Realizado por **Francisco Javier Zambrano Santacruz**


# Manual para despliegue de la aplicación.

A continuación se describen los elementos necesarios para tener en cuenta al querer levantar la aplicación.
> Se recomienda estar seguro de que se cuenta con todo lo necesario en mi caso uso arch linux y se desarrollo bajo este sistema operativo.
- Tener instalado servidor apache en mi caso httpd, puede ver un tutorial en este video (https://www.youtube.com/watch?v=rqNhQ-M5sT4&list=LLFsjgdYe3h5-43J3ub1RkPQ&index=2&t=702s).
- Tener instalado servidor mysql en mi caso mysqld, igual puede ver un tutorial en el anterior video.
> Se recomienda ver el video ya que en él se especifican unas extensiones que se deben desbloquear si se usa arch linux.
- tener instalado composer, lo puede descargar en:(https://getcomposer.org/download/).
- Tener instalado symfony, lo puede descargar en: (https://symfony.com/download).
- Si se usa arch linux: En /etc/php/php.ini descomentar las líneas de extension iconv y pdo_mysql 
- En el archivo **.env** de la aplicación se especifica que la base de datos se llama **mopadb**, pero se debe cambiar su usuario y su contraseña para conectarse al servidor.
- La base de datos para usar está en la carpeta **public/db** de la aplicación.
- Tener conexión a Internet para cargar el script de vuejs

# Funcionamiento de la aplicación

Esta aplicación se realizó con los frameworks: **symfony** y **vuejs**, aclaro que actualmente estoy estudiando un curso de vuejs, angular y react en la plataforma udemy, al hacer esta aclaración me refiero a que hubo investigación para implementar vuejs, por lo tanto puede verse algo básico en cuando a lo que se implementó de vuejs.

> Los cursos que estoy realizando tienen muy buenas calificaciones y comentarios, en resumen: se obtienen buenos resultados.

Al iniciar la aplicación, redirige a la raíz de esta, en donde se puede observar las salas que han sido creadas, al lado de ellas, se encuentra un botón para visualizar en detalle de las horas que está disponible la sala durante el día.

>En esta parte no se puede ver nada respecto a las reservas.
>**Nota importante**: al crear una sala, no tendrá registros de reserva, por lo tanto en la vista principal si se quiere ver en detalle su disponibilidad se mostrará una excepción que puede ser "fuerte" a la vista, pero dice que la sala está disponible durante todo el día.

Durante todo el tiempo, en el navbar de la parte de arriba color verde, se encuentra un botón de inicio, el cual redirige a la raíz del servidor.
Igualmente, en el nabvar se muestra un botón de inicio de sesión si el usuario administrador **(usuario: admin@mopa.com contraseña: admin123)**  no está logeado.
Si el usuario está logeado, se muestra un botón que despliega un botón de panel de control y un botón de cerrar sesión.

En el panel de control del usuario **admin**, se muestra una tabla con tres opciones de administración, uno para administrar clientes, otro para administrar salas y el último para administrar reservas.

>Todas estas url están protegidas por la sesión del usuario logeado.

## Módulo administrar clientes

En este módulo el usuario puede ver todos los clientes en una tabla, además, puede crear, ver, editar y eliminar un cliente, cuya cédula es única. Este proceso es muy intuitivo.

## Módulo administrar salas

En este módulo el usuario puede observar todas las salas en una tabla, además, puede crear, ver, editar y eliminar una sala. Este proceso es muy intuitivo.
>**Nota importante**: al crear una sala, no tendrá registros de reserva, por lo tanto en la vista principal si se quiere ver en detalle su disponibilidad se mostrará una excepción que puede ser "fuerte" a la vista, pero dice que la sala está disponible durante todo el día.

## Módulo administrar reservas
En este módulo el usuario puede observar todas las reservas en una tabla, además, puede crear, ver, editar y eliminar una reserva.
### Crear una reserva
El usuario administrador puede crear una reserva, desde un formulario, el cual  en **Hora inicio** y en **Hora fin** despliega las horas permitidas, en **sala** despliega las salas que están registradas y por último, en **Cliente reserva** despliega la cédula de los clientes registrados, un cliente puede hacer varias reservas.
>**Nota importante**: El usuario administrador debe tener en cuenta las horas en la que se encuentra disponible la sala que se puede observar en la disponibilidad de cada sala.

##  Contacto programador
**Nombre**: Francisco Javier Zambrano Santacruz
**correo**: franciscozambrano@outlook.es
**celular**: +57 3105927383



