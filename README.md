<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Proyecto de Lenguaje de Programación IV - Sistema de información web móvil para la gestión de talleres de mecánica.

## Descripción del Proyecto
Este proyecto tiene como objetivo desarrollar un sistema de gestión para la administración de un Sistema de información web móvil para la gestión de talleres de mecánica utilizando tecnologías de bases de datos y APIs. Se han implementado procedimientos almacenados para optimizar las operaciones de actualización y gestión de datos.

## Estructura del Proyecto

- **Base de Datos**:  
  El sistema utiliza una base de datos relacional bien estructurada que almacena información sobre clientes, reparaciones, cotizaciones, reservaciones, y reportes del taller de mecánica. Se emplean claves foráneas y relaciones para garantizar la integridad referencial.

- **Procedimientos Almacenados**:  
  Desarrollamos procedimientos almacenados en SQL para manejar operaciones complejas, como la actualización de múltiples registros, generación de reportes, y la creación automatizada de relaciones entre tablas.

- **Backend**:  
  El backend está construido con **Laravel**, un framework de PHP conocido por su potencia y facilidad de uso. Laravel gestiona las APIs, validación de datos, autenticación, y proporciona herramientas para la migración de base de datos y manejo de dependencias. Usa lo muy conocido de: Modelo - Vista - Controlador. Usando: Controladores y Blade's.

- **Frontend**:  
  Se utiliza **AdminLTE**, una plantilla basada en Bootstrap para la creación de paneles administrativos responsivos.
  
- **APIs RESTful**:  
  Se han desarrollado APIs para interactuar con los datos del sistema. Las APIs permiten realizar operaciones como (Crear, Leer, Actualizar), asegurando el acceso rápido y seguro a la información.

- **Dependencias y Paquetes Adicionales**:  
  - `mysql`: Para la conexión y operaciones con la base de datos.  
  - `express` y `body-parser`: Para APIs secundarias en caso de requerir extensiones adicionales en Node.js.  
  - `AdminLTE`: Para gestionar vistas administrativas con estilos predefinidos.  
  - `dotenv`: Para manejar variables de entorno de manera segura, como credenciales de base de datos y configuraciones sensibles.


## Miembros del Equipo
- **Jasson Alexander Suazo Molina** - 20211020997
- **Carlos Francisco Reyes López** - 20191004421
- **Yenifer Michell Fuentes Servellón** - 20221001412
- **André Alessandro Lagos Cano** - 20201003997
- **Edwin Alexander Mejía Molina** - 20191002726
- **Kevin David Miguel Ávila** - 20211001469

## Tecnologías Utilizadas
- **MySQL**: Para la gestión de la base de datos.
- **Node.js**: Para la implementación del servidor y las APIs.
- **Express**: Framework para crear aplicaciones web en Node.js.
- **Dotenv**: Para manejar variables de entorno de forma segura, permitiendo configurar credenciales y datos sensibles fuera del código fuente.
