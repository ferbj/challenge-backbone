<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Resolucion del Challenge
El problema se tuvo que abordar de la siguiente manera: 
<ol>
<li>Se realiza una normalizacion de la tablas y hojas de excel a una base de datos de 6 tablas, de las cuales solo se utilizaron 3 tablas para obtener el json response según la estructura pedida en este challenge, además de esto se aplicó las buenas practicas en el diseño de base de datos en cuanto a la nomenclatura de los campos.</li>
<li>Se realiza una limpieza de datos de manera que no genere campos repetidos en cuanto a los codigos zip, debido a que primero se realiza la importacion de todos los datos segun esta hoja de excel a una tabla raw_data y a partir de ahi se realizan las diferentes consultas para llenar las otras tablas con las que se ha realizado este challenge.</li>
<li>Se implementan las consultas de tal manera que se genere el menor tiempo de respuesta posible en la atención de la API, agregando además la caracteristica de cache en el servidor e indices en las claves de las tablas en las que se habia trasladado los datos para optimizar el tiempo de respuesta, se realizo pruebas de rendimiento con Telescope.</li> 
<li>Validacion del codigo de la API, asi como validación del response.</li>
<li>Se ha creado test unitarios para el endpoint, comprobando que la estructura del Json sea la misma que la esperada, validacion del response codigo 200 además del tipo de error 404 y 500 aparte un test de peticiones continuas.</li>
<li>Se realiza una optimización a nivel de configuración del framework para obtener el menor tiempo de respuesta posible en cada request de api ademas se mejora el rate limit de la aplicacion. </li></ol>

