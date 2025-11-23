# MikeFit - Sistema de Reserva de Clases de Gimnasio

MikeFit es un proyecto que he desarrollado para gestionar las reservas de clases de un gimnasio. La idea surgió porque quería practicar y hacer algo útil a la vez. 

La aplicación permite crear clases (como Spinning, Yoga, CrossFit...), asignarles horarios según el día de la semana y gestionar las sesiones. Así el gimnasio puede tener organizado qué clases hay cada día y a qué hora.

## Características

- CRUD completo de clases
- CRUD completo de horarios
- CRUD completo de sesiones de clase
- Interfaz sencilla con Tailwind CSS

## Tecnologías

- PHP 8.2
- Laravel 12
- Blade
- Tailwind CSS
- MySQL
- XAMPP

## Instalación

### Requisitos

- PHP >= 8.2
- Composer
- XAMPP (o MySQL)
- Git

### Pasos

1. Clonar el repositorio
```
git clone https://github.com/mikelji97/MikeFit.git
cd MikeFit
```

2. Instalar dependencias
```
composer install
```

3. Configurar el archivo .env
```
cp .env.example .env
```

Editar el .env con los datos de tu base de datos:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mikefit
DB_USERNAME=root
DB_PASSWORD=
```

4. Generar clave de aplicación
```
php artisan key:generate
```

5. Crear la base de datos en phpMyAdmin y ejecutar migraciones
```
php artisan migrate
```

6. Crear seeders para datos de prueba
```
php artisan db:seed
```

7. Iniciar el servidor

Si usas XAMPP solo tienes que encender Apache y MySQL y acceder a:
```
http://localhost/MikeFit/public
```

## Autor

Mikel
emai: mikeljimenezalvarez@gmail.com
GitHub: @mikelji97
